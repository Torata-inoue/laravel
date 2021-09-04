<?php

namespace App\Services\API\Redux\PrizeExchangeHistory;

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
     * @var PrizeExchangeHistoryRepository
     */
    private $prizeExchangeHistoryRepository;

    /**
     * @var PointHistoryRepository
     */
    private $pointHistoryRepository;

    /**
     * PostService constructor.
     * @param UserRepository $userRepository
     * @param PrizeRepository $prizeRepository
     * @param PrizeExchangeHistoryRepository $prizeExchangeHistoryRepository
     * @param PointHistoryRepository $pointHistoryRepository
     */
    public function __construct(
        UserRepository $userRepository,
        PrizeRepository $prizeRepository,
        PrizeExchangeHistoryRepository $prizeExchangeHistoryRepository,
        PointHistoryRepository $pointHistoryRepository
    )
    {
        parent::__construct($userRepository);
        $this->prizeRepository = $prizeRepository;
        $this->prizeExchangeHistoryRepository = $prizeExchangeHistoryRepository;
        $this->pointHistoryRepository = $pointHistoryRepository;
    }

    /**
     * @param int $prize_id
     */
    public function post(int $prize_id)
    {
        $prize = $this->prizeRepository->findById($prize_id);

        $prizeExchangeHistory = new PrizeExchangeHistory([
            'prize_id' => $prize_id,
            'user_id' => $this->auth->id,
            'status' => PrizeExchangeHistory::STATUS_APPLYING,
            'comment' => '',
        ]);

        $pointHistory = new PointHistory([
            'user_id' => $this->auth->id,
            'type' => PointHistory::TYPE_PRIZE_EXCHANGE,
            'points' => -$prize->exchange_point
        ]);

        DB::transaction(function () use ($prizeExchangeHistory, $pointHistory) {
            $this->prizeExchangeHistoryRepository->save($prizeExchangeHistory);
            $this->pointHistoryRepository->save($pointHistory);
        });
    }
}
