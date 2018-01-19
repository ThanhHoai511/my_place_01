<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\ReviewRepositoryInterface;
use App\Repositories\Contracts\RateReviewRepositoryInterface;
use App\Repositories\Contracts\CollectionRepositoryInterface;
use App\Repositories\Contracts\ImageRepositoryInterface;
use App\Repositories\Contracts\RateReviewValRepositoryInterface;
use App\Repositories\Contracts\PlaceRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Http\Requests\UpdateUserRequest;
use Auth;

class UserController extends Controller
{
    protected $userRepository;
    protected $reviewRepository;
    protected $rateRepository;
    protected $rateValRepository;
    protected $commentRepository;
    protected $collectionRepository;
    protected $imageRepository;
    protected $placeRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ReviewRepositoryInterface $reviewRepository,
        RateReviewRepositoryInterface $rateRepository,
        RateReviewValRepositoryInterface $rateValRepository,
        CollectionRepositoryInterface $collectionRepository,
        PlaceRepositoryInterface $placeRepository,
        ImageRepositoryInterface $imageRepository,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->userRepository = $userRepository;
        $this->reviewRepository = $reviewRepository;
        $this->rateRepository = $rateRepository;
        $this->rateValRepository = $rateValRepository;
        $this->collectionRepository = $collectionRepository;
        $this->placeRepository = $placeRepository;
        $this->imageRepository = $imageRepository;
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $listuser = $this->userRepository->paginate();

        return view('backend.users.listprofile', ['listuser' => $listuser]);
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        if (Auth::user()->level == config('const.roleAdmin')) {
            return view('backend.users.profile', compact('user'));
        } elseif (Auth::user()->level == config('const.roleUser')) {
            return view('frontend.user.edit-profile', compact('user'));
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'name' => 'required',
        ]);
        $user = $this->userRepository->find($id);
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->move('images/Upload', $file->getClientOriginalName());
            $linkimage = $file->getClientOriginalName();
        } else {
            $linkimage = $this->userRepository->updateavatar($id);
        }
        try {
            $dataUpdate = $request->only('name', 'email', 'add', 'phone');
            $dataUpdate['avatar'] = $linkimage;
            $dataUpdate['password'] = $request->newpassword;
            $result = $this->userRepository->update($dataUpdate, $id);
            if (Auth::user()->level == config('const.roleAdmin')) {
                return redirect()->action('UserController@index')
                ->with('status', trans('messages.successfull'));
            } elseif (Auth::user()->level == config('const.roleUser')) {
                return redirect()->route('editprofile', Auth::user()->id)
                ->with('status', trans('messages.successfull'));
            }
        } catch (Exception $e) {
            Log::error($e);

            return back()->withErrors(trans('messages.updatefail'));
        }
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return view('errors.404');
        }
        try {
            $this->userRepository->delete($id);

            return redirect()->action('UserController@index')
                ->with('status', trans('messages.deletesuccessfully'));
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->action('UsersController@index')
            ->withErrors(trans('messages.deletefailed'));
        }
    }

    public function myWall($id)
    {
        $infoUser = $this->userRepository->find($id);
        $reviews = $this->reviewRepository->findReview($id);
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

        return view('frontend.user.wall-profile', compact(
            'reviews',
            'rateReviewVals',
            'countLike',
            'rateReview',
            'countComment',
            'hasLike',
            'infoUser'
        ));
    }

    public function showCollection($id) {
        $user = $this->userRepository->find($id);
        $collection = $this->collectionRepository->userCollection($id);
        $collectionItem = $this->collectionRepository->findUserCollectionReview($id);

        return view('frontend.user.collection', compact('collection',  'user', 'collectionItem'));
    }
}
