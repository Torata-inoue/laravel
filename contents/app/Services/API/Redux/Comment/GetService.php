<?php

namespace App\Services\API\Redux\Comment;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\Comment\CommentRepository;
use App\Http\Domains\Reaction\ReactionRepository;

class GetService
{
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
        return $comments->map([$this, 'setCommentDetail'])->all();
    }

    /**
     * @param Comment $comment
     * @return array
     */
    private function setCommentDetail(Comment $comment): array
    {
        return [
            'comment' => [
                'text' => $comment->text
            ],
            'user' => $comment->User,
            'nominees' => $comment->Nominee->User,
            'reaction_count' => $this->reactionRepository->countReactionByCommentId($comment->id),
//            'replies' => []
        ];
    }
}
