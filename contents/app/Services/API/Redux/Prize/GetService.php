<?php

namespace App\Services\API\Redux\Prize;

use App\Http\Domains\Prize\Prize;
use App\Http\Domains\Prize\PrizeRepository;

class GetService
{
    /**
     * @var PrizeRepository
     */
    private $prizeRepository;

    /**
     * GetService constructor.
     * @param PrizeRepository $prizeRepository
     */
    public function __construct(PrizeRepository $prizeRepository)
    {
        $this->prizeRepository = $prizeRepository;
    }

    /**
     * @return array
     */
    public function getPrizes(): array
    {
        return $this->prizeRepository->getPrizes()
            ->map(function (Prize $prize) {
                return [
                    'id' => $prize->id,
                    'name' => $prize->name,
                    'rank' => $prize->Rank->name,
                    'exchange_point' => $prize->exchange_point
                ];
            })->all();
    }
}
