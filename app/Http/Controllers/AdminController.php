<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\RateReviewRepositoryInterface;
use App\Repositories\Contracts\CollectionRepositoryInterface;
use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Repositories\Contracts\RateReviewValRepositoryInterface;
use App\Repositories\Contracts\PlaceRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Repositories\Contracts\ReportRepositoryInterface;
use App\Http\Requests\UpdateUserRequest;
use Auth;

class AdminController extends Controller
{
    protected $userRepository;
    protected $reviewRepository;
    protected $rateRepository;
    protected $rateValRepository;
    protected $commentRepository;
    protected $collectionRepository;
    protected $imageRepository;
    protected $placeRepository;
    protected $reportRepository;
    protected $locationRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ReviewRepositoryInterface $reviewRepository,
        RateReviewRepositoryInterface $rateRepository,
        RateReviewValRepositoryInterface $rateValRepository,
        CollectionRepositoryInterface $collectionRepository,
        PlaceRepositoryInterface $placeRepository,
        ImageRepositoryInterface $imageRepository,
        ReportRepositoryInterface $reportRepository,
        LocationRepositoryInterface $locationRepository,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
        $this->reviewRepository = $reviewRepository;
        $this->rateRepository = $rateRepository;
        $this->rateValRepository = $rateValRepository;
        $this->collectionRepository = $collectionRepository;
        $this->placeRepository = $placeRepository;
        $this->imageRepository = $imageRepository;
        $this->commentRepository = $commentRepository;
        $this->reportRepository = $reportRepository;
        $this->locationRepository = $locationRepository;
    }

    public function index()
    {
        $listuser = $this->userRepository->paginate();
        $numberUser = count($this->userRepository->all());
        $numberReport = count($this->reportRepository->all());
        $numberPending = $this->locationRepository->count();

        return view('backend.index', compact('numberUser', 'numberReport', 'numberPending'));
    }
}
