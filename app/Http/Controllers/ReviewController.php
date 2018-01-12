<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Repositories\Contracts\RateReviewValRepositoryInterface;
use App\Repositories\Contracts\ReportRepositoryInterface;
use App\Repositories\Contracts\RateReviewRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Storage;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $reviewRepository;
    protected $imageRepository;
    protected $rateReviewValRepository;
    protected $rateReviewRepository;
    protected $commentRepository;
    protected $reportRepository;

    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        ImageRepositoryInterface $imageRepository,
        RateReviewValRepositoryInterface $rateReviewValRepository,
        RateReviewRepositoryInterface $rateReviewRepository,
        CommentRepositoryInterface $commentRepository,
        ReportRepositoryInterface $reportRepository
    ) {
        $this->reviewRepository = $reviewRepository;
        $this->imageRepository = $imageRepository;
        $this->rateReviewValRepository = $rateReviewValRepository;
        $this->rateReviewRepository = $rateReviewRepository;
        $this->commentRepository = $commentRepository;
        $this->reportRepository = $reportRepository;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.review.new-review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $data = [];
                foreach ($request->file('file') as $file) {
                    $nameImage = str_random(4).date('h:i').$file->getClientOriginalName();
                    array_push($data, $nameImage);
                    $file->move(config('asset.image_path.imagereviews'), $nameImage);
                }
            }
                $dataValue = $request->only(
                    'submary',
                    'content',
                    'timewrite',
                    'service_rate',
                    'quality_rate',
                    'place_id'
                );
                $dataValue['user_id'] = Auth::user()->id;
                $dataValue['status'] = config('checkbox.checktrue');
                $resultReview = $this->reviewRepository->create($dataValue);
                $reviewId = $resultReview->id;
                $requestImage = $this->imageRepository->create($data, $reviewId);
            return redirect()->route('home');
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
        $review = $this->reviewRepository->find($id);
        $countLike = 0;
        $countComment = 0;
        $userId = Auth::user()->id;
        $showComment = $this->commentRepository->findReviewId($id);
        $rateReviewVal = $this->rateReviewValRepository->all();
        $hasLike = $this->rateReviewValRepository->findReviewID($id, $userId);
        $hasReport = $this->reportRepository->findReport($id, $userId);
        $rateReview = $this->rateReviewRepository->findRateLike();
        $comments = $this->commentRepository->all();
        $rateValId = $this->rateReviewValRepository->findRate($id);
        $countComment = $this->commentRepository->getCommentNumber($id);
        $countLike = $this->rateReviewValRepository->getLikes($id);
        return view('frontend.review.show-review', compact(
            'review',
            'rateValId',
            'countLike',
            'countComment',
            'showComment',
            'rateReview',
            'hasLike',
            'rateReviewVal',
            'hasReport'
        ));
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
        //
    }

    public function favorite(Request $request)
    {
        $reviewId = $request->reviewId;
        $rateId = $request->rateId;
        $userId = Auth::user()->id;
        $hasLike = $this->rateReviewValRepository->findReviewID($reviewId, $userId);
        $rateReviewVal = $this->rateReviewValRepository->all();
        $rateReview = $this->rateReviewRepository->findRateLike();
        if ($hasLike == config('const.hasLike')) {
            $icon = true;
            $resultReviewVal = $this->rateReviewValRepository->create($userId, $rateId, $reviewId);
        } else {
            $icon = false;
            $resultReviewVal = $this->rateReviewValRepository->disLike($reviewId, $userId);
        }
        $countLike = $this->rateReviewValRepository->getLikes($reviewId);
        
        return response()->json([
           'icon' => $icon,
           'countLike' => $countLike,
        ]);
    }

    public function comment(Request $request)
    {
        $content = $request->comment;
        $reviewId = $request->reviewId;
        $userId = Auth::user()->id;
        $avatarUser = Auth::user()->avatar;
        $nameUser = Auth::user()->name;
        $resultComment = $this->commentRepository->create($content, $reviewId, $userId);

        return response(view('frontend.showcoment.show-comment', compact('content'))->render());
    }

    public function updateComment(Request $request)
    {
        $commentId = $request->commentId;
        $reviewId = $request->reviewId;
        $contentUpdate = $request->contentUpdate;
        $userId = Auth::user()->id;
        $resultComment = $this->commentRepository->update($commentId, $reviewId, $contentUpdate, $userId);

        return redirect()->route('reviews.show', $reviewId);
    }
    
    public function deleteComment(Request $request)
    {
        $commentId = $request->commentId;
        $resultComment = $this->commentRepository->delete($commentId);

        return response()->json([
            'commentId' => $commentId,
        ]);
    }
}
