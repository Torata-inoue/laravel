<?php

namespace App\Services\API\Redux\Comment;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\Nominee\Nominee;
use App\Http\Domains\Reaction\ReactionRepository;
use App\Services\API\Redux\User\UserTrait;

trait CommentTrait
{
    use UserTrait;

    /**
     * @param Comment $comment
     * @return array
     */
    protected function setCommentDetail(Comment $comment): array
    {
        return [
            'comment' => [
                'text' => $comment->text,
                'id' => $comment->id
            ],
            'user' => $comment->User,
            'nominees' => $comment->Nominees->map(function (Nominee $nominee) {
                return $this->setUserDetail($nominee->User);
            }),
            'reaction_count' => $this->reactionRepository->countReactionByCommentId($comment->id),
//            'replies' => []
        ];
    }

    abstract function getReactionRepository(): ReactionRepository;
}
