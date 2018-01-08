<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\ImageRepositoryInterface;
use Storage;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $reviewRepository;
    protected $imageRepository;

    public function __construct(
        ReviewRepositoryInterface $reviewRepository,
        ImageRepositoryInterface $imageRepository
    )
    {
        $this->reviewRepository = $reviewRepository;
        $this->imageRepository = $imageRepository;
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
        return view('frontend.review.new-review');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $data = [];
                foreach ($request->file('file') as $file) {
                    $nameImage =  str_random(4).date("h:i").$file->getClientOriginalName();
                    array_push($data, $nameImage);
                    $file->move(config('asset.image_path.imagereviews'), $nameImage);
                }
            }
                $dataValue = $request->only('submary', 'content', 'timewrite', 'service_rate', 'quality_rate', 'place_id');
                $dataValue['user_id'] = Auth::user()->id;
                $dataValue['status'] = config('checkbox.checktrue');
                $resultReview = $this->reviewRepository->create($dataValue);
                $review_id = $resultReview->id;
                $requestImage = $this->imageRepository->create($data, $review_id);

                return redirect()->route('home');
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
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
