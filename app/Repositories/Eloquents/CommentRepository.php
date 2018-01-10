<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function all()
    {
        return Comment::all();
    }

    public function findReviewId($id)
    {
        return Comment::where('review_id', '=', $id)->get();
    }

    public function getCommentNumber($reviewId)
    {
        return Comment::where('review_id', '=', $reviewId)->get()->count();
    }
}
