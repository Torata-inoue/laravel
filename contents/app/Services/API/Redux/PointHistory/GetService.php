<?php

namespace App\Services\API\Redux\PointHistory;

use App\Http\Domains\PointHistory\PointHistory;
use App\Http\Domains\PointHistory\PointHistoryRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;

class GetService extends BaseService
{
    /**
     * @var PointHistoryRepository
     */
    private $pointHistoryRepository;

    /**
     * PointHistoryService constructor.
     * @param UserRepository $userRepository
     * @param PointHistoryRepository $pointHistoryRepository
     */
    public function __construct(
        UserRepository $userRepository,
        PointHistoryRepository $pointHistoryRepository
    )
    {
        parent::__construct($userRepository);
        $this->pointHistoryRepository = $pointHistoryRepository;
    }

    /**
     * @return array
     */
    public function getHistories(): array
    {
        return $this->pointHistoryRepository->getHistories($this->auth->id)
            ->map(function (PointHistory $history) {
                return [
                    'points' => $history->points,
                    'type' => $history->getType(),
                    'created_at' => $history->created_at->format('Y年m月d日')
                ];
            })->all();
    }
}
