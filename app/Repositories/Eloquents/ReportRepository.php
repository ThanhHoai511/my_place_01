<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ReportRepositoryInterface;
use App\Models\Report;

class ReportRepository implements ReportRepositoryInterface
{
    public function create($dataValue)
    {
        $report = new Report;
        $report->review_id = $dataValue['reviewId'];
        $report->user_id = $dataValue['userId'];
        $report->content = $dataValue['content'];
        $report->save();
    }

    public function findReport($id, $userId)
    {
        return Report::where('review_id', '=', $id)->where('user_id', '=', $userId)->get()->count();
    }

    public function countReport($reviewId)
    {
        return Report::where('review_id', '=', $reviewId)->count();
    }

    public function paginate()
    {
        return Report::paginate(config('paginate.paginateuser'));
    }

    public function delete($reviewId)
    {
        return Report::where('review_id', '=', $reviewId)->delete();
    }

    public function destroy($id)
    {
        return Report::destroy($id);
    }
}
