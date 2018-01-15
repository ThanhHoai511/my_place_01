<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\District;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PlaceRepositoryInterface;
use App\Repositories\Contracts\DistrictRepositoryInterface;

class SearchController extends Controller
{
    protected $placeRepository;
    
    public function __construct(PlaceRepositoryInterface $placeRepository, DistrictRepositoryInterface $distRepository)
    {
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
}
