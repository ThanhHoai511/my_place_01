<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Dist;
use App\Models\Place;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PlaceEditRequest;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\DistrictRepositoryInterface;
use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\RateReviewRepositoryInterface;
use App\Repositories\Contracts\RateReviewValRepositoryInterface;
use App\Repositories\Contracts\PlaceRepositoryInterface;
use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use Auth;

class PlaceController extends Controller
{
    protected $districtRepository;
    protected $cityRepository;
    protected $placeRepository;
    protected $reviewRepository;
    protected $rateRepository;
    protected $rateValRepository;
    protected $commentRepository;
    protected $locationRepository;
    
    public function __construct(
        CityRepositoryInterface $cityRepository,
        DistrictRepositoryInterface $districtRepository,
        PlaceRepositoryInterface $placeRepository,
        ReviewRepositoryInterface $reviewRepository,
        RateReviewRepositoryInterface $rateRepository,
        RateReviewValRepositoryInterface $rateValRepository,
        CommentRepositoryInterface $commentRepository,
        LocationRepositoryInterface $locationRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->districtRepository = $districtRepository;
        $this->placeRepository = $placeRepository;
        $this->reviewRepository = $reviewRepository;
        $this->rateRepository = $rateRepository;
        $this->rateValRepository = $rateValRepository;
        $this->commentRepository = $commentRepository;
        $this->locationRepository = $locationRepository;
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
        $city = $getdistId ? $this->cityRepository->findOrFail($getdistId->city_id) : null;
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

    public function editPlace($id)
    {
        $place = $this->placeRepository->findOrFail($id);
        $range = explode(' - ', $place->range);
        $cities = $this->cityRepository->all();
        $cityId = $this->cityRepository->showCity();
        $dists = $this->districtRepository->all();
        $distId = $this->districtRepository->showDist();
        $places = $this->placeRepository->paginate();
        
        return view('frontend.place.edit-place', compact(
            'place',
            'range',
            'cities',
            'cityId',
            'dists',
            'distId',
            'places'
        ));
    }

    public function showPlace($id)
    {
        try {
            $reviews = $this->reviewRepository->findPlace($id);
            $infoPlace = $this->placeRepository->findOrFail($id);
            $rateReviewVals = $this->reviewRepository->listReviewVal();
            $rateReview = $this->rateRepository->findRateLike();
            if (Auth::check()) {
                $userId = Auth::user()->id;
                foreach ($reviews as $review) {
                    $countLike[$review->id] = $this->rateValRepository->getLikes($review->id);
                    $countComment[$review->id] = $this->commentRepository->getCommentNumber($review->id);
                    $hasLike[$review->id] = $this->rateValRepository->findReviewID($review->id, $userId);
                }
            }
            foreach ($reviews as $review) {
                $countLike[$review->id] = $this->rateValRepository->getLikes($review->id);
                $countComment[$review->id] = $this->commentRepository->getCommentNumber($review->id);
            }

            return view('frontend.place.show-place', compact(
                'reviews',
                'infoPlace',
                'rateReviewVals',
                'rateReview',
                'countComment',
                'hasLike',
                'countLike'
            ));
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    public function uploadPlace(Request $request, $id)
    {
        try {
            $input = $request->only('name', 'dist_id', 'open', 'add', 'close');
            $input['range'] = $request->price_from . ' - ' . $request->price_to;
            if ($request->hasFile('image')) {
                $file = $request->image;
                $input['image'] = $file->getClientOriginalName();
                $file->move(config('asset.image_path.imagereviews'), $input['image']);
            }
            $resultPlace = $this->locationRepository->create($input, $id);
            $alert = ['pass' => trans('messages.request-pending')];

            return redirect()->action('PlaceController@showPlace', $id)->with($alert);
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    public function listPlace()
    {
        $placePendings = $this->locationRepository->all();

        return view('backend.place.list-place', compact('placePendings'));
    }

    public function previewPlade($id)
    {
        $place = $this->locationRepository->findOrFail($id);

        return view('backend.place.preview-place', compact('place'));
    }

    public function deletePlace(Request $request)
    {
        $placeId = $request->placeId;
        $deletePlace = $this->locationRepository->delete($placeId);

        return redirect()->action('PlaceController@listplace')
        ->with('status', trans('messages.deletesuccessfully'));
    }

    public function appovePlace(Request $request)
    {
        $id = $request->place_id;
        $input = $request->only(
            'id',
            'name',
            'add',
            'dist_id',
            'open',
            'close',
            'image',
            'range'
        );
        $resultPlace = $this->placeRepository->update($input, $id);
        $deletePlace = $this->locationRepository->delete($input['id']);

        return redirect()->route('listplace')
        ->with('status', trans('messages.deletesuccessfully'));
    }

    public function topWeek()
    {
        $infoPlaces = $this->placeRepository->softReview();

        return view('frontend.place.top-place', compact('infoPlaces'));
    }
}
