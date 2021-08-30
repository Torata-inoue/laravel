<?php

namespace App\Services\API\Redux\Comment;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\Comment\CommentRepository;
use App\Http\Domains\Nominee\Nominee;
use App\Http\Domains\Reaction\ReactionRepository;
use App\Http\Domains\User\User;

class GetService
{
    use CommentTrait;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var ReactionRepository
     */
    private $reactionRepository;

    /**
     * GetService constructor.
     * @param CommentRepository $commentRepository
     * @param ReactionRepository $reactionRepository
     */
    public function __construct(
        CommentRepository $commentRepository,
        ReactionRepository $reactionRepository
    )
    {
        $this->commentRepository = $commentRepository;
        $this->reactionRepository = $reactionRepository;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        $comments = $this->commentRepository->getComments();
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
}
