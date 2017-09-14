<?php

namespace App\Http\Controllers\Auth;

use App\models\User;
use App\models\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users,email',
           'phone' => 'required|string',
           'password' => 'required|string|min:6|confirmed',
           'gender' => 'required',
           //'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
        ]);
        $user->attachRole(Roles::where('name', 'user-normal')->first());

        return $user;
    }

    public function activate(Request $request, $token)
    {
        $userToken = \App\models\UserToken::where('token', $token)->first();

        if ($userToken)
        {
            $userToken->status = 1;
            $userToken->save();

            Auth::loginUsingId($userToken->user_id);

            return redirect('/home')->with('message', 'Your account have been actived!')->with('success', true);
        } else {
            return redirect('/register')->with('message', 'Invalid token provided!')->with('error', true);
        }
    }
}
