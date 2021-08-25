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
     * @return Collection
     */
    public function getReceiveReactions(int $user_id = null): Collection
    {
        $reactions = $this->reactionRepository->getReactions($user_id, $this->auth->id);
        return $this->setDetail($reactions);
    }

    /**
     * @param int|null $target_id
     * @return Collection
     */
    public function getSendReactions(int $target_id = null): Collection
    {
        $reactions = $this->reactionRepository->getReactions($this->auth->id, $target_id);
        return $this->setDetail($reactions);
    }

    private function setDetail(Collection $reactions)
    {
        return $reactions->map(function ($reaction) {
            return [
                'user' => [
                    'name' => $reaction->User->name,
                    'icon_path' => $reaction->User->icon_path
                ],
                'target' => [
                    'name' => $reaction->Target->name,
                    'icon_path' => $reaction->Target->icon_path
                ],
                'comment' => [
                    'text' => $reaction->Comment->text
                ]
            ];
        });
    }
}
