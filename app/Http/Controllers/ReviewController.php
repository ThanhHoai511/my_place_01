<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Repositories\Contracts\RateReviewValRepositoryInterface;
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

    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        ImageRepositoryInterface $imageRepository,
        RateReviewValRepositoryInterface $rateReviewValRepository,
        RateReviewRepositoryInterface $rateReviewRepository,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->reviewRepository = $reviewRepository;
        $this->imageRepository = $imageRepository;
        $this->rateReviewValRepository = $rateReviewValRepository;
        $this->rateReviewRepository = $rateReviewRepository;
        $this->commentRepository = $commentRepository;
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
        $showComment = $this->commentRepository->findReviewId($id);
        $rateReviewVal = $this->rateReviewValRepository->all();
        $rateReview = $this->rateReviewRepository->findRateLike();
        $comments = $this->commentRepository->all();
        foreach ($comments as $comment) {
            if ($comment->review_id == $review->id) {
                $countComment++;
            }
        }
        foreach ($rateReviewVal as $rateVal) {
            foreach ($rateReview as $rate) {
                if ($rateVal->review_id == $review->id && $rateVal->rate_id == $rate->id) {
                    $countLike++ ;
                }
            }
        }

        return view('frontend.review.show-review', compact('review', 'countLike', 'countComment', 'showComment'));
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
}
