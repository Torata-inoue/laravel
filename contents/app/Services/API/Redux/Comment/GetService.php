<?php

namespace App\Services\API\Redux\Comment;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\Comment\CommentRepository;
use App\Http\Domains\Nominee\Nominee;
use App\Http\Domains\PointHistory\PointHistoryRepository;
use App\Http\Domains\Reaction\ReactionRepository;
use App\Http\Domains\User\User;

class GetService
{
    use CommentTrait;

    const LIMIT = 5;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var ReactionRepository
     */
    private $reactionRepository;

    private $pointHistoryRepository;

    /**
     * GetService constructor.
     * @param CommentRepository $commentRepository
     * @param ReactionRepository $reactionRepository
     * @param PointHistoryRepository $pointHistoryRepository
     */
    public function __construct(
        CommentRepository $commentRepository,
        ReactionRepository $reactionRepository,
        PointHistoryRepository $pointHistoryRepository
    )
    {
        $this->commentRepository = $commentRepository;
        $this->reactionRepository = $reactionRepository;
        $this->pointHistoryRepository = $pointHistoryRepository;
    }

    /**
     * @param int $page
     * @return array
     */
    public function getComments(int $page): array
    {
        $offset = $page === 1 ? 0 : ($page - 1) * self::LIMIT - 1;
        $comments = $this->commentRepository->getComments($offset, self::LIMIT);
        return $comments->map(function ($comment) {
            return $this->setCommentDetail($comment);
        })->all();
    }

    /**
     * @return ReactionRepository
     */
    public function getReactionRepository(): ReactionRepository
    {
        return $this->reactionRepository;
    }

    public function getPointHistoryRepository(): PointHistoryRepository
    {
        return $this->pointHistoryRepository;
    }
}
