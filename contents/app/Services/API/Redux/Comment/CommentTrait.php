<?php

namespace App\Services\API\Redux\Comment;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\Nominee\Nominee;
use App\Http\Domains\Reaction\ReactionRepository;

trait CommentTrait
{
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
                $user = $nominee->User;
                $rank = $user->Rank->name;
                $user = $user->getAttributes();
                $user['rank'] = $rank;
                return $user;
            }),
            'reaction_count' => $this->reactionRepository->countReactionByCommentId($comment->id),
//            'replies' => []
        ];
    }

    abstract function getReactionRepository(): ReactionRepository;
}
