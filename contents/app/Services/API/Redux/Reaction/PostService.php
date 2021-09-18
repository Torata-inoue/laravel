<?php

namespace App\Services\API\Redux\Reaction;

use App\Http\Domains\Comment\CommentRepository;
use App\Http\Domains\Reaction\Reaction;
use App\Http\Domains\Reaction\ReactionRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\API\Redux\Comment\CommentTrait;
use App\Services\BaseService;

class PostService extends BaseService
{
    use CommentTrait;

    /**
     * @var ReactionRepository
     */
    private $reactionRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    private $commentRepository;

    /**
     * PostService constructor.
     * @param ReactionRepository $reactionRepository
     * @param UserRepository $userRepository
     * @param CommentRepository $commentRepository
     */
    public function __construct(
        ReactionRepository $reactionRepository,
        UserRepository $userRepository,
        CommentRepository $commentRepository
    )
    {
        parent::__construct($userRepository);
        $this->reactionRepository = $reactionRepository;
        $this->userRepository = $userRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param int $comment_id
     * @param int $target_id
     * @return array
     */
    public function postReaction(int $comment_id, int $target_id): array
    {
        $reaction = new Reaction([
            'comment_id' => $comment_id,
            'target_id' => $target_id,
            'user_id' => $this->auth->id
        ]);
        $this->reactionRepository->save($reaction);

        $this->auth->stamina--;
        $this->userRepository->save($this->auth);

        $comment = $this->commentRepository->findById($comment_id);
        return $this->setCommentDetail($comment);
    }

    /**
     * @return ReactionRepository
     */
    public function getReactionRepository(): ReactionRepository
    {
        return $this->reactionRepository;
    }
}
