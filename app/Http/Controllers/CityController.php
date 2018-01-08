<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Repositories\Contracts\CityRepositoryInterface;

class CityController extends Controller
{
    protected $cityRepository;
    
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->paginate();

        return view('backend.place.city', compact('cities'));
    }

    public function create()
    {
        //
    }

    public function store(CityRequest $request)
    {
        try {
            $input = $request->only('name');
            $this->cityRepository->create($input);

            return redirect()->action('CityController@index')
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
        $city = $this->cityRepository->findOrFail($id);
        $cities = $this->cityRepository->paginate();
        
        return view('backend.place.city-edit', compact('city', 'cities'));
    }

    public function update(CityRequest $request, $id)
    {
        $city = $this->cityRepository->findOrFail($id);
        try {
            $input = $request->only('name');
            $result = $this->cityRepository->update($input, $id);

            return redirect()->action('CityController@index')
            ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    public function destroy($id)
    {
        $city = $this->cityRepository->findOrFail($id);
        try {
            $this->cityRepository->delete($id);

            return redirect()->action('CityController@index')
                ->with('status', trans('messages.deletesuccessfully'));
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->action('CityController@index')
            ->withErrors(trans('messages.deletefailed'));
        }
    }
}
