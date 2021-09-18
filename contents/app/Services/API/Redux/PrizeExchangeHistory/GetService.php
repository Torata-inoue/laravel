<?php

namespace App\Services\API\Redux\PrizeExchangeHistory;

use App\Http\Domains\PrizeExchangeHistory\PrizeExchangeHistory;
use App\Http\Domains\PrizeExchangeHistory\PrizeExchangeHistoryRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;

class GetService extends BaseService
{
    private $prizeExchangeHistoryRepository;

    public function __construct(
        UserRepository $userRepository,
        PrizeExchangeHistoryRepository $prizeExchangeHistoryRepository
    )
    {
        parent::__construct($userRepository);
        $this->prizeExchangeHistoryRepository = $prizeExchangeHistoryRepository;
    }

    /**
     * @return array
     */
    public function getHistories(): array
    {
        return $this->prizeExchangeHistoryRepository->getHistories($this->auth->id)
            ->map(function (PrizeExchangeHistory $history) {
                return [
                    'prize' => $history->Prize->name,
                    'status' => $history->getStatus(),
                    'created_at' => $history->created_at->format('Y年m月d日')
                ];
            })->all();
    }
}
