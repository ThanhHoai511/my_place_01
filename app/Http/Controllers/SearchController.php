<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\District;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PlaceRepositoryInterface;
use App\Repositories\Contracts\DistrictRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ReviewRepositoryInterface;

class SearchController extends Controller
{
    protected $placeRepository;
    protected $userRepository;
    protected $reviewRepository;
    protected $distRepository;

    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        PlaceRepositoryInterface $placeRepository,
        DistrictRepositoryInterface $distRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->reviewRepository = $reviewRepository;
        $this->userRepository = $userRepository;
        $this->placeRepository = $placeRepository;
        $this->distRepository = $distRepository;
    }
    
    public function getPlaces(Request $request)
    {
        $key = $request->key;
        $places = $this->placeRepository->search($key);

        return response($places)
            ->header('Content-type', 'application/json');
    }

    public function getDists(Request $request)
    {
        $key = $request->key;
        $dists = $this->distRepository->searchInCity($key);

        return response($dists)
            ->header('Content-type', 'application/json');
    }

    public function searchKey(Request $request) {
        $key = $request->key;
        $key = trim($key);
        $places = $this->placeRepository->search($key);
        $reviews = $this->reviewRepository->search($key);
        $users = $this->userRepository->search($key);

        return view('frontend.search', compact('key', 'places', 'reviews', 'users'));
    }
}
