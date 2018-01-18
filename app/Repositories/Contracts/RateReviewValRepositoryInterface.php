<?php

namespace App\Repositories\Contracts;

interface RateReviewValRepositoryInterface
{
    public function all();

    public function findReviewID($id, $userId);

    public function create($userId, $rateId, $reviewId);

    public function disLike($reviewId, $userId);

    public function findRate($id);

    public function getLikes($reviewId);

    public function getUserLike($reviewId);
}
