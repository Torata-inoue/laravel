<?php

namespace App\Services\API\Redux\Comment;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\Comment\CommentRepository;
use App\Http\Domains\Nominee\NomineeRepository;
use App\Http\Domains\Reaction\ReactionRepository;
use App\Http\Domains\User\UserRepository;
use Illuminate\Support\Facades\DB;

class PostService
{
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
        $this->commentRepository = $commentRepository;
        $this->userRepository = $userRepository;
        $this->nomineeRepository = $nomineeRepository;
        $this->reactionRepository = $reactionRepository;
    }

    /**
     * @param int $user_id
     * @param string $text
     * @param array $nominees
     */
    public function postComment(int $user_id, string $text, array $nominees)
    {
        if ($this->userRepository->findUser($user_id)) {
            throw new \UnexpectedValueException('対象のユーザーは存在しません');
        }

        $comment = new Comment([
            'user_id' => $user_id,
            'text' => $text
        ]);

        DB::transaction(function () use ($comment, $nominees, $user_id) {
            $this->commentRepository->save($comment);
            $this->insertNominees($comment->id, $nominees);
            $this->insertReaction($comment->id, $user_id, $nominees);
        });
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
     * @param int $user_id
     * @param array $nominees
     */
    private function insertReaction(int $comment_id, int $user_id, array $nominees)
    {
        $data = array_map(function ($nominee) use ($comment_id, $user_id) {
            return [
                'user_id' => $user_id,
                'comment_id' => $comment_id,
                'target_id' => $nominee
            ];
        }, $nominees);
        $this->reactionRepository->bulkInsert($data);
    }
}
