<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Repositories\Contracts\CityRepositoryInterface;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        try {
            $input = $request->only('name');
            $this->cityRepository->create($input);

            return redirect()->action('CityController@index')
            ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
            Log::debug($e);

            return back()->withErrors(trans('messages.updatefail'));
        }

        return redirect()->action('CityController@index')
            ->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = $this->cityRepository->find($id);
        $cities = $this->cityRepository->paginate();
        if (!$city) {
           return view('errors.404');
        }
        
        return view('backend.place.city-edit', compact('city', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $city = $this->cityRepository->find($id);
        if (!$city) {
            return view('errors.404');
        }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->cityRepository->find($id);
        if (!$city) {
            return view('errors.404');
        }
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
