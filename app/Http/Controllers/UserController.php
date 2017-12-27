<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $userRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $listuser = $this->userRepository->paginate();

        return view('backend.users.listprofile', ['listuser' => $listuser]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        return view('backend.users.profile', compact('user'));
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
        $user = $this->userRepository->find($id);
        if ($request->hasFile('avatar')) {
            $file = $request->avatar;
            $file->move('images/Upload',$file->getClientOriginalName());
            $linkimage = $file->getClientOriginalName();
        } else {
            $linkimage = $this->userRepository->updateavatar($id);
        }
            try {
                $dataUpdate = $request->only('name', 'email', 'add', 'phone');
                $dataUpdate['avatar'] = $linkimage;
                $dataUpdate['password'] = $request->newpassword;
                $result = $this->userRepository->update($dataUpdate, $id);

                return redirect()->action('UserController@index')
                ->with('status', trans('messages.successfull') );
            } catch (Exception $e) {
                Log::error($e);
    
                return back()->withErrors( trans('messages.updatefail') );
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
}
