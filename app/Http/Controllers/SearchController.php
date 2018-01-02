<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Repositories\Contracts\PlaceRepositoryInterface;

class SearchController extends Controller
{
    protected $placeRepository;
    
    public function __construct(PlaceRepositoryInterface $placeRepository)
    {
        $this->placeRepository = $placeRepository;
    }
    
    public function getPlaces(Request $request)
    {
        $key = $request->key;
        $places = $this->placeRepository->search($key);

        return response($places)
            ->header('Content-type', 'application/json');
    }
}
