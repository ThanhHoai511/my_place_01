<?php

namespace App\Repositories\Contracts;

interface FollowRepositoryInterface
{
    public function followUser(array $dataFollow);

    public function findAndUnFollow(array $dataUnFollow);

    public function checkFollow($id);
}