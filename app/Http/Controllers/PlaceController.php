<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Dist;
use App\Models\Place;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PlaceEditRequest;
use App\Repositories\Contracts\DistrictRepositoryInterface;
use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\PlaceRepositoryInterface;

class PlaceController extends Controller
{
    protected $districtRepository;
    protected $cityRepository;
    protected $placeRepository;
    
    public function __construct(
        CityRepositoryInterface $cityRepository,
        DistrictRepositoryInterface $districtRepository,
        PlaceRepositoryInterface $placeRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->placeRepository = $placeRepository;
    }
    public function index()
    {
        $cities = $this->cityRepository->all();
        $cityId = $this->cityRepository->showCity();
        $dists = $this->districtRepository->all();
        $distId = $this->districtRepository->showDist();
        $places = $this->placeRepository->paginate();

        return view('backend.place.place', compact('cities', 'dists', 'cityId', 'distId', 'places'));
    }

    public function create()
    {
        //
    }

    public function store(PlaceRequest $request)
    {
        try {
            $input = $request->only('city', 'name', 'dist_id', 'open', 'close', 'image', 'add');
            $input['range'] = $request->price_from . ' - ' . $request->price_to;
            if ($request->hasFile('image')) {
                $input['image'] = $this->saveImage($request);
            }
            $this->placeRepository->create($input);

            return redirect()->action('PlaceController@index')
            ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $place = $this->placeRepository->findOrFail($id);
        $range = explode(' - ', $place->range);
        $cities = $this->cityRepository->all();
        $cityId = $this->cityRepository->showCity();
        $dists = $this->districtRepository->all();
        $distId = $this->districtRepository->showDist();
        $getdistId = $this->districtRepository->findOrFail($place->dist_id);
        $city = $this->cityRepository->findOrFail($getdistId->city_id);
        $places = $this->placeRepository->paginate();

        return view('backend.place.place-edit', compact(
            'place',
            'range',
            'cities',
            'dists',
            'cityId',
            'distId',
            'places',
            'city'
        ));
    }

    public function update(PlaceEditRequest $request, $id)
    {
        try {
            $place = $this->placeRepository->findOrFail($id);
            $input = $request->only('city', 'name', 'dist_id', 'open', 'close', 'image', 'add');
            $input['range'] = $request->price_from . ' - ' . $request->price_to;
            if ($request->hasFile('image')) {
                $input['image'] = $this->saveImage($request);
            }
            $this->placeRepository->update($input, $id);

            return redirect()->action('PlaceController@index')
            ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    public function saveImage($request)
    {
        $file = $request->image;
        $file->move(config('asset.image_path.imagereviews'), $file->getClientOriginalName());
        $linkimage = $file->getClientOriginalName();
        return $linkimage;
    }

    public function destroy($id)
    {
        try {
            $place = $this->placeRepository->findOrFail($id);
            $this->placeRepository->delete($id);

            return redirect()->action('PlaceController@index')
                ->with('status', trans('messages.deletesuccessfully'));
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->action('PlaceController@index')
            ->withErrors(trans('messages.deletefailed'));
        }
    }

    public function addPlace(Request $request)
    {
        $namePlace = $request->namePlace;
        $address = $request->add;
        $image = config('const.adddefault');
        $resultAddress = $this->placeRepository->addPlace(
            $namePlace,
            $address,
            $image
        );

        return response()->json([
            'namePlace' => $namePlace,
        ]);
    }
}
