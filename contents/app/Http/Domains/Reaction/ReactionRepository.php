<?php

namespace App\Http\Domains\Reaction;

use App\Http\Domains\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class ReactionRepository extends BaseRepository
{
    public function __construct(Reaction $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int|null $user_id
     * @param int|null $target_id
     * @return Collection
     */
    public function getReactions(int $user_id = null, int $target_id = null): Collection
    {
        $query = $this->getQueryBuilder();

        if ($user_id) {
            $query->where('user_id', '=', $user_id);
        }

        if ($target_id) {
            $query->where('target_id', '=', $target_id);
        }

        return $query->orderBy('created_at', 'desc')
            ->get();
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

    /**
     * @param Reaction $reaction
     * @return bool
     */
    public function save(Reaction $reaction): bool
    {
        return $reaction->save();
    }
}
