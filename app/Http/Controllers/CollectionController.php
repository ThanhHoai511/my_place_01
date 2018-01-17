<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CollectionRepositoryInterface;
use Auth;

class CollectionController extends Controller
{
    protected $collectionRepository;
    
    public function __construct(CollectionRepositoryInterface $collectionRepository)
    {
        $this->collectionRepository = $collectionRepository;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unique_name = $this->collectionRepository->checkUniqueName($request->name);
        if ($unique_name['error'] == 1) {
            $alert = ['error' => trans('messages.col-name-unique')];

            return back()->with($alert);
        } else {
            try {
                $collection = $this->collectionRepository->userCollection();
                $input = $request->only('name', 'review_id');
                $input['user_id'] = Auth::user()->id;
                $collection_id = $this->collectionRepository->create($input);
                $input['collection_id'] = $collection_id;
                $this->collectionRepository->saveToCollection($input);

                return redirect('/member/home')
                ->with('status', trans('messages.successfull'));
            } catch (Exception $e) {
                Log::error($e);

                return back()->withErrors(trans('messages.updatefail'));
            }
        }
    }

    public function save($id, $collection_id) {
        try {
            $get_collection_id = $this->collectionRepository->findOrFail($collection_id);
            $checkExist = $this->collectionRepository->checkExist($id, $collection_id);
            if ($checkExist == 0) {
                $input['collection_id'] = $get_collection_id->id;
                $input['name'] = $get_collection_id->name;
                $input['review_id'] = $id;
                $query = $this->collectionRepository->saveToCollection($input);
                if ($query != 0) {
                    $alert = ['pass' => trans('messages.successfull')];
                } else {
                    $alert = ['error' => trans('messages.error')];
                }
            } else {
                $get_del = $this->collectionRepository->findCollectionVals($id, $collection_id);
                $query = $this->collectionRepository->delete($get_del->id);
                if ($query != 0) {
                    $alert = ['pass' => trans('messages.successfull')];
                } else {
                    $alert = ['error' => trans('messages.error')];
                }
            }

            return back()->with($alert);
        } catch (Exception $e) {
            Log::error($e);
            $alert = ['error' => trans('messages.error-occur')];

            return back()->with($alert);
            
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
