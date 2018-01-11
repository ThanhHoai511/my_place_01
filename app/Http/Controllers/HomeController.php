<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\RateReviewRepositoryInterface;
use App\Repositories\Contracts\RateReviewValRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $reviewRepository;
    protected $rateRepository;
    protected $rateValRepository;
    protected $commentRepository;
    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        RateReviewRepositoryInterface $rateRepository,
        RateReviewValRepositoryInterface $rateValRepository,
        CommentRepositoryInterface $commentRepository
    )
    {
        $this->reviewRepository = $reviewRepository;
        $this->rateRepository = $rateRepository;
        $this->rateValRepository = $rateValRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = $this->reviewRepository->paginateHome();
        $rateReviewVals = $this->reviewRepository->listReviewVal();
        $rateReview = $this->rateRepository->findRateLike();
        if (Auth::check()) {
            $userId = Auth::user()->id;
            foreach ($reviews as $review) {
                $countLike[$review->id] = $this->rateValRepository->getLikes($review->id);
                $countComment[$review->id] = $this->commentRepository->getCommentNumber($review->id);
                $hasLike[$review->id] = $this->rateValRepository->findReviewID($review->id, $userId);
            }
        }
        foreach ($reviews as $review) {
            $countLike[$review->id] = $this->rateValRepository->getLikes($review->id);
            $countComment[$review->id] = $this->commentRepository->getCommentNumber($review->id);
        }

        return view('frontend.index', compact(
            'reviews',
            'rateReviewVals',
            'countLike',
            'rateReview',
            'countComment',
            'hasLike'
        ));
    }
}
