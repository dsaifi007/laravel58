<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "hello";
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = User::find($id);
       return $user->toJson(JSON_PRETTY_PRINT);

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
    public function loginById($id)
    {
       $data = Auth::loginUsingId($id);
       dd($data);
    }
    public function login(Request $request)
    {
       $response = Auth::once($request->input());
       $user = Auth::user();
       $user['id'] = (string)$user['id'];
       if($user->email_verified_at == ''){
        return response()->json(['message'=>"Your email is not verified ",'error_code'=>403]);
       }
       return response(["data"=>$user,"success"=>true]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function usercreate(Request $request)
    {
        $this->middleware('guest');
        $data = $request->all();
        $validator =Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $errors = $validator->errors();
        if ($validator->fails()) {
            return response()->json(['message'=>$errors->first(),'error_code'=>403]);
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'api_token'=>md5(time()),
            'password' => Hash::make($data['password']),
        ]);
        $user->sendEmailVerificationNotification();
        return $user;
    }
}
