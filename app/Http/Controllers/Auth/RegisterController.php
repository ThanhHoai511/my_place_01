<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\Contracts\UserRepositoryInterface;
use Auth;
use Mail;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users,email',
            'name' => 'required',
            'add' => 'required',
            'phone' => 'required',
            'birthday' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function messages()
    {
        return [
            'name.required' => trans('validation.username-required'),
            'add.required' => trans('validation.add-required'),
            'phone.required' => trans('validation.phone-required'),
            'birthday.required' => trans('validation.birthday-required'),
            'birthday.date' => trans('validation.birthday-date'),
            'password.required' => trans('validation.pass-required'),
            'email.required' => trans('validation.email-required'),
            'email.unique' => trans('validation.email-unique'),
            'email.email' => trans('validation.email'),
            'password.min' => trans('validation.pass-min'),
        ];
    }

    protected function register(Request $request)
    {
        try {
            $data = $request->only('name', 'email', 'add', 'phone', 'birthday');
            $data['avatar'] = config('const.default');
            $data['level'] = config('const.roleUser');
            $data['password'] = $request->password;

            $result = $this->userRepository->register($data);
            if ($request->check == config('checkbox.checktrue')) {
                Mail::send('frontend.email.mailregister', [
                    'name' => $data['name'],
                    'email' => $data['email'],
                ], function ($message) use ($data) {
                    $message->to($data['email'], 'Visitor')->subject('Visitor Feedback!');
                });
                Session::flash('flash_message', trans('messages.sendsuccess'));

                return redirect()->action('Auth\LoginController@showLoginForm')
                ->with('status', trans('messages.successfull'));
            }

                return redirect()->action('Auth\LoginController@showLoginForm')
                ->with('status', trans('messages.successfull'));
        } catch (Exception $e) {
                Log::error($e);

                return back()->withErrors(trans('messages.updatefail'));
        }
    }
}
