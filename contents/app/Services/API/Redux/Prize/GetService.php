<?php

namespace App\Services\API\Redux\Prize;

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
        return $this->prizeRepository->getPrizes()->toArray();
    }
}
