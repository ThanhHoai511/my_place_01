<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\ReportRepositoryInterface;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\RateReviewRepositoryInterface;
use App\Repositories\Contracts\RateReviewValRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $reportRepository;
    protected $reviewRepository;
    protected $rateRepository;
    protected $rateValRepository;
    protected $commentRepository;

    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        RateReviewRepositoryInterface $rateRepository,
        RateReviewValRepositoryInterface $rateValRepository,
        CommentRepositoryInterface $commentRepository,
        ReportRepositoryInterface $reportRepository
    ) {
        $this->reviewRepository = $reviewRepository;
        $this->rateRepository = $rateRepository;
        $this->rateValRepository = $rateValRepository;
        $this->commentRepository = $commentRepository;
        $this->reportRepository = $reportRepository;
    }

    public function index()
    {
        $reports = $this->reportRepository->paginate();
        $rateReviewVals = $this->reviewRepository->listReviewVal();
        $rateReview = $this->rateRepository->findRateLike();
        foreach ($reports as $report) {
            $reviewId = $report->review_id;
            $countReport = $this->reportRepository->countReport($reviewId);
            if ($countReport >= config('checkbox.checksecond')) {
                $resultUpdate = $this->reviewRepository->update($reviewId);
                $resultDelete = $this->reportRepository->delete($reviewId);
            }
        }
        
        return view('backend.report.list-report', compact('reports', 'rateReviewVals', 'rateReview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendReport(Request $request)
    {
        try {
            $this->validate($request, [
                'content' => 'required|max:255',
                'reviewId' => 'required',
            ]);
            $dataValue = $request->only('content', 'reviewId');
            $dataValue['userId'] = Auth::user()->id;
            $resultReport = $this->reportRepository->create($dataValue);

            return redirect()->route('reviews.show', $dataValue['reviewId']);
        } catch (Exception $e) {
            Log::error($e);
            
            return back()->withErrors(trans('messages.updatefail'));
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resultDelete = $this->reportRepository->destroy($id);

        return redirect()->route('reports.index');
    }

    public function approve(Request $request)
    {
        $reviewId = $request->reviewId;
        $id = $request->id;
        $resultUpdate = $this->reviewRepository->update($reviewId);
        $resultDelete = $this->reportRepository->delete($reviewId);

        return redirect()->route('reports.index');
    }
}
