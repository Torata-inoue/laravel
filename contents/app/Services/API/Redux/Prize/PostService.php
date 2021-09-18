<?php

namespace App\Services\API\Redux\Prize;

use App\Http\Domains\PointHistory\PointHistory;
use App\Http\Domains\PointHistory\PointHistoryRepository;
use App\Http\Domains\Prize\PrizeRepository;
use App\Http\Domains\PrizeExchangeHistory\PrizeExchangeHistory;
use App\Http\Domains\PrizeExchangeHistory\PrizeExchangeHistoryRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class PostService extends BaseService
{
    /**
     * @var PrizeRepository
     */
    private $prizeRepository;

    /**
     * @var PointHistoryRepository
     */
    private $pointHistoryRepository;

    /**
     * @var PrizeExchangeHistoryRepository
     */
    private $prizeExchangeHistoryRepository;


    public function __construct(
        UserRepository $userRepository,
        PrizeRepository $prizeRepository,
        PointHistoryRepository $pointHistoryRepository,
        PrizeExchangeHistoryRepository $prizeExchangeHistoryRepository
    )
    {
        parent::__construct($userRepository);
        $this->prizeRepository = $prizeRepository;
        $this->pointHistoryRepository = $pointHistoryRepository;
        $this->prizeExchangeHistoryRepository = $prizeExchangeHistoryRepository;
    }

    /**
     * @param int $prize_id
     */
    public function postPrize(int $prize_id)
    {
        $prize = $this->prizeRepository->findById($prize_id);
        $prize->stock--;

        $pointHistory = new PointHistory([
            'user_id' => $this->auth->id,
            'points' => -$prize->exchange_point,
            'type' => PointHistory::TYPE_PRIZE_EXCHANGE
        ]);
        $prizeExchangeHistory = new PrizeExchangeHistory([
            'prize_id' => $prize->id,
            'user_id' => $this->auth->id,
            'status' => PrizeExchangeHistory::STATUS_APPLYING,
            'comment' => null
        ]);

        DB::transaction(function () use ($pointHistory, $prizeExchangeHistory, $prize) {
            if ($prize->id !== 4) {
                $this->prizeRepository->save($prize);
            }
            $this->pointHistoryRepository->save($pointHistory);
            $this->prizeExchangeHistoryRepository->save($prizeExchangeHistory);
        });
    }
}
