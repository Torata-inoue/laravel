<?php

namespace App\Services\API\Redux\Reaction;

use App\Http\Domains\Reaction\ReactionRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;

class GetService extends BaseService
{
    /**
     * @var ReactionRepository
     */
    private $reactionRepository;

    /**
     * GetService constructor.
     * @param UserRepository $userRepository
     * @param ReactionRepository $reactionRepository
     */
    public function __construct(
        UserRepository $userRepository,
        ReactionRepository $reactionRepository
    )
    {
        parent::__construct($userRepository);
        $this->reactionRepository = $reactionRepository;
    }

    /**
     * @param int|null $user_id
     * @return array
     */
    public function getReceiveReactions(int $user_id = null): array
    {
        $reactions = $this->reactionRepository->getReactions($user_id, $this->auth->id);
        return $this->setDetail($reactions)->all();
    }

    /**
     * @param int|null $target_id
     * @return array
     */
    public function getSendReactions(int $target_id = null): array
    {
        $reactions = $this->reactionRepository->getReactions($this->auth->id, $target_id);
        return $this->setDetail($reactions)->all();
    }

    private function setDetail(Collection $reactions)
    {
        return $reactions->map(function ($reaction) {
            return [
                'target' => [
                    'name' => $reaction->Target->name,
                    'icon_path' => $reaction->Target->icon_path
                ],
                'comment' => $reaction->Comment->text,
                'created_at' => $reaction->created_at->format('Y年m月d日')
            ];
        });
    }
}
