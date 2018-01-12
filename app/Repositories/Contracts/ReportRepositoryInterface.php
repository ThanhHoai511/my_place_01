<?php

namespace App\Repositories\Contracts;

interface ReportRepositoryInterface
{
    public function create($dataValue);

    public function findReport($id, $userId);

    public function countReport($reviewId);

    public function paginate();

    public function delete($reviewId);

    public function destroy($id);
}
