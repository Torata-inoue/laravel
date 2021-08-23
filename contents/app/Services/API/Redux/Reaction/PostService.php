<?php

namespace App\Services\API\Redux\Reaction;

use App\Http\Domains\Reaction\Reaction;
use App\Http\Domains\Reaction\ReactionRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;

class PostService extends BaseService
{
    /**
     * @var ReactionRepository
     */
    private $reactionRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * PostService constructor.
     * @param ReactionRepository $reactionRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        ReactionRepository $reactionRepository,
        UserRepository $userRepository
    )
    {
        parent::__construct($userRepository);
        $this->reactionRepository = $reactionRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param int $comment_id
     * @param int $target_id
     */
    public function postReaction(int $comment_id, int $target_id)
    {
        $reaction = new Reaction([
            'comment_id' => $comment_id,
            'target_id' => $target_id,
            'user_id' => $this->auth->id
        ]);
        $this->reactionRepository->save($reaction);

        $this->auth->stamina--;
        $this->userRepository->save($this->auth);
    }
}
