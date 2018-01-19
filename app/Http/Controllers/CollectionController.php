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

    public function store(Request $request)
    {
        $unique_name = $this->collectionRepository->checkUniqueName($request->name);
        if ($unique_name['error'] == 1) {
            $alert = ['error' => trans('messages.col-name-unique')];

            return back()->with($alert);
        } else {
            try {
                $collection = $this->collectionRepository->userCollection(Auth::user()->id);
                $input = $request->only('name', 'review_id');
                $input['user_id'] = Auth::user()->id;
                $collection_id = $this->collectionRepository->create($input);
                $input['collection_id'] = $collection_id;
                $this->collectionRepository->saveToCollection($input);

                return redirect()->route('home')
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

    public function removeConlection(Request $request)
    {
        $collectionId = $request->collectionId;
        $collectionName = $request->collectionName;
        $deleteCollection = $this->collectionRepository->destroy($collectionId);

        return response()->json([
            'collectionId' => $collectionId,
            'collectionName' => $collectionName,
        ]);
    }
}
