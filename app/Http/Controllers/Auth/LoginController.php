<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    /*protected function credentials(Request $request)
    {
        //dd($request->all());
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
        ? $this->username()
        : 'username';
        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
            'role_id' => $request->role_id
        ];
    }*/

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'  => 'required|max:255|email',
            'password' => 'required',
            'role_id' =>'required|in:1,2,3'
        ]);
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role_id'=>$request->role_id])) {
            // Success
            return redirect('/home');
        } else {
            return $this->sendFailedLoginResponse($request);
            //return redirect()->back();
        }

    }
}
