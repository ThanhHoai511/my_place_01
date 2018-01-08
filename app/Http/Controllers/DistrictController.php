<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Dist;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;
use App\Repositories\Contracts\DistrictRepositoryInterface;
use App\Repositories\Contracts\CityRepositoryInterface;

class DistrictController extends Controller
{
    protected $districtRepository;
    protected $cityRepository;
    
    public function __construct(CityRepositoryInterface $cityRepository, DistrictRepositoryInterface $districtRepository)
    {
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->all();
        $cityId = $this->cityRepository->showCity();
        $dists = $this->districtRepository->paginate();

        return view('backend.place.dist', compact('cities', 'dists', 'cityId'));
    }

    public function create()
    {
        //
    }

    public function store(DistrictRequest $request)
    {
        try {
            $input = $request->only('city', 'name');
            $this->districtRepository->create($input);

            return redirect()->action('DistrictController@index')
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
        $cities = $this->cityRepository->all();
        $cityId = $this->cityRepository->showCity();
        $dist = $this->districtRepository->findOrFail($id);
        $getCity = $this->cityRepository->findOrFail($dist->city_id);
        $dists = $this->districtRepository->paginate();
        
        return view('backend.place.dist-edit', compact('dist', 'dists', 'cityId', 'cities', 'getCity'));
    }

    public function update(DistrictRequest $request, $id)
    {
        $dist = $this->districtRepository->findOrFail($id);
        try {
            $input = $request->only('city', 'name');
            $result = $this->districtRepository->update($input, $id);

            return redirect()->action('DistrictController@index')
            ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    public function destroy($id)
    {
        $dist = $this->districtRepository->findOrFail($id);
        try {
            $this->districtRepository->delete($id);

            return redirect()->action('DistrictController@index')
                ->with('status', trans('messages.deletesuccessfully'));
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->action('DistrictController@index')
            ->withErrors(trans('messages.deletefailed'));
        }
    }
}
