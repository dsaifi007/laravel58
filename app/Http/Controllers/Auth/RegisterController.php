<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
            'username' => ['required', 'string', 'max:20', 'unique:App\User,username'],
            'first_name' => ['required', 'string', 'max:20'],
            'last_name' => ['required', 'string', 'max:20'],
            'mobile_number'=>['required','max:10','min:8','number_validation','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\User,email'],
             'password' => [
                    'required',
                    'min:8',             
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
                ],
        ], [
            'number_validation' => 'First digit mobile number must be between 6 and 9!', 
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

        return User::create([
            'name'=>"dummy",
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile_number'=>$data['mobile_number'],
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name']
        ]);
    }

    public function show()
    {
        return view("auth/register");
    }
    public function add(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data);
         if ($validator->fails()) {
            return redirect('user/register')
                        ->withErrors($validator)
                        ->withInput();
        }
       User::create([
            'name'=>"dummy",
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile_number'=>$data['mobile_number'],
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name']
        ]);
       return redirect('user/register')->with('success', 'Registration Successfully!');
    }
}
