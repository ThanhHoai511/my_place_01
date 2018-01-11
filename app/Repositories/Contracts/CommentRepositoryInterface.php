<?php

namespace App\Repositories\Contracts;

interface CommentRepositoryInterface
{
    public function all();

    public function findReviewId($id);

    public function getCommentNumber($reviewId);

    public function create($content, $reviewId, $userId);

    public function delete($commentId);
}
