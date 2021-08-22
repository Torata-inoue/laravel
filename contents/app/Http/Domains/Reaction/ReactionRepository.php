<?php

namespace App\Http\Domains\Reaction;

use App\Http\Domains\BaseRepository;

class ReactionRepository extends BaseRepository
{
    public function __construct(Reaction $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function bulkInsert(array $data): bool
    {
        return $this->getQueryBuilder()
            ->insert($data);
    }

    /**
     * @param int $comment_id
     * @return int
     */
    public function countReactionByCommentId(int $comment_id): int
    {
        return $this->getQueryBuilder()
            ->where('comment_id', '=', $comment_id)
            ->count();
    }
}
