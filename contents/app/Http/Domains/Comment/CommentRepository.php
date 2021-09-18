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
     * @param int $comment_id
     * @return Comment
     */
    public function findById(int $comment_id): Comment
    {
        return $this->getQueryBuilder()
            ->find($comment_id);
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder[]|Collection
     */
    public function getComments(int $offset, int $limit)
    {
        return $this->getQueryBuilder()
            ->where('reply_to', '=', Comment::NOT_REPLY_COMMENT)
            ->where('status', '=', Comment::STATUS_EXIST)
            ->offset($offset)
            ->limit($limit)
            ->orderBy('id', 'desc')
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
