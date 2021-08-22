<?php

namespace App\Http\Domains\Comment;

use App\Http\Domains\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository extends BaseRepository
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->getQueryBuilder()
            ->where('reply_to', '=', Comment::NOT_REPLY_COMMENT)
            ->where('status', '=', Comment::STATUS_EXIST)
            ->get();
    }

    /**
     * @param Comment $comment
     * @return bool
     */
    public function save(Comment $comment): bool
    {
        return $comment->save();
    }
}
