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
        return Comment::where('review_id', '=', $id)->orderBy('created_at', 'DESC')->get();
    }

    public function getCommentNumber($reviewId)
    {
        return Comment::where('review_id', '=', $reviewId)->get()->count();
    }

    public function create($content, $reviewId, $userId)
    {
        $comment = new Comment;
        $comment->review_id = $reviewId;
        $comment->user_id = $userId;
        $comment->content = $content;
        $comment->save();
        $data['id'] = $comment->id;
        $data['created_at'] = $comment->created_at;

        return $data;
    }

    public function update($commentId, $reviewId, $contentUpdate, $userId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->review_id = $reviewId;
        $comment->user_id = $userId;
        $comment->content = $contentUpdate;
        $comment->save();
    }

    public function delete($commentId)
    {
        return Comment::destroy($commentId);
    }
}
