<?php

namespace App\Services\API\Redux\User;

use App\Http\Domains\PointHistory\PointHistory;
use App\Http\Domains\PointHistory\PointHistoryRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;

class PutService extends BaseService
{
    use UserTrait;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var PointHistoryRepository
     */
    private $pointHistoryRepository;

    /**
     * PutService constructor.
     * @param UserRepository $userRepository
     * @param PointHistoryRepository $pointHistoryRepository
     */
    public function __construct(
        UserRepository $userRepository,
        PointHistoryRepository $pointHistoryRepository
    )
    {
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
        $this->pointHistoryRepository = $pointHistoryRepository;
    }

    /**
     * @param array $data
     */
    public function editUser(array $data)
    {
        $this->auth->fill($data);
        $this->userRepository->save($this->auth);
    }

    /**
     *
     */
    public function recoverStamina()
    {
        $this->auth->stamina += 5;
        $this->userRepository->save($this->auth);
        $pointHistory = new PointHistory([
            'user_id' => $this->auth->id,
            'points' => -10,
            'type' => PointHistory::TYPE_STAMINA_EXCHANGE
        ]);
        $this->pointHistoryRepository->save($pointHistory);

        return $this->setUserDetail($this->auth);
    }

    /**
     * @return PointHistoryRepository
     */
    protected function getPointHistoryRepository(): PointHistoryRepository
    {
        return $this->pointHistoryRepository;
    }
}
