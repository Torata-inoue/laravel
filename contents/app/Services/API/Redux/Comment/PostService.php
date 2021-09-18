<?php

namespace App\Services\API\Redux\Comment;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\Comment\CommentRepository;
use App\Http\Domains\Nominee\NomineeRepository;
use App\Http\Domains\Reaction\ReactionRepository;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class PostService extends BaseService
{
    use CommentTrait;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var NomineeRepository
     */
    private $nomineeRepository;

    /**
     * @var ReactionRepository
     */
    private $reactionRepository;

    /**
     * PostService constructor.
     * @param CommentRepository $commentRepository
     * @param UserRepository $userRepository
     * @param NomineeRepository $nomineeRepository
     * @param ReactionRepository $reactionRepository
     */
    public function __construct(
        CommentRepository $commentRepository,
        UserRepository $userRepository,
        NomineeRepository $nomineeRepository,
        ReactionRepository $reactionRepository
    )
    {
        parent::__construct($userRepository);
        $this->commentRepository = $commentRepository;
        $this->userRepository = $userRepository;
        $this->nomineeRepository = $nomineeRepository;
        $this->reactionRepository = $reactionRepository;
    }

    /**
     * @param string $text
     * @param array $nominees
     * @return array
     */
    public function postComment(string $text, array $nominees)
    {
        if (!$this->userRepository->findUser($nominees[0])) {
            throw new \UnexpectedValueException('対象のユーザーは存在しません');
        }

        $comment = new Comment([
            'user_id' => $this->auth->id,
            'text' => $text
        ]);

        DB::transaction(function () use ($comment, $nominees) {
            $this->commentRepository->save($comment);
            $this->insertNominees($comment->id, $nominees);
            $this->insertReaction($comment->id, $nominees);
        });

        return $this->setCommentDetail($comment);
    }

    /**
     * @param int $comment_id
     * @param array $nominees
     */
    private function insertNominees(int $comment_id, array $nominees)
    {
        $data = array_map(function ($nominee) use ($comment_id) {
            return [
                'user_id' => $nominee,
                'comment_id' => $comment_id
            ];
        }, $nominees);
        $this->nomineeRepository->bulkInsert($data);
    }

    /**
     * @param int $comment_id
     * @param array $nominees
     */
    private function insertReaction(int $comment_id, array $nominees)
    {
        $data = array_map(function ($nominee) use ($comment_id) {
            return [
                'user_id' => $this->auth->id,
                'comment_id' => $comment_id,
                'target_id' => $nominee,
                'created_at' => now()
            ];
        }, $nominees);
        $this->reactionRepository->bulkInsert($data);
    }

    /**
     * @return ReactionRepository
     */
    public function getReactionRepository(): ReactionRepository
    {
        return $this->reactionRepository;
    }
}
