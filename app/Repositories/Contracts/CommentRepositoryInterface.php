<?php

namespace App\Repositories\Contracts;

interface CommentRepositoryInterface
{
    public function all();

    public function findReviewId($id);
}
