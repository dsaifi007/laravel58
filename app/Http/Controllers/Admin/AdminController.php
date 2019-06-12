<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Events\SendEmail;
use App\Jobs\EmailSendingToUser;
use Gate;
use App\Models\AdminModel;
use Illuminate\Support\Facades\URL;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$this->authorize('view',$usermodel); controller level
        //die("ddd");
        // use of gate 
        if (Gate::allows('user-controller-access',"ss")) {
             echo "index function";
        }
       else{
        abort(403,"not");
       }
    }
    public function test()
    {
        $route = url()->full();
        echo config('app.timezone');
        die();
        $adminmodelobj = new AdminModel();
        $adminmodelobj->xyz();
        //$usermodel = new \App\User;
    }
    public function eventDispatch($id)
    {
       $user = User::findOrFail($id);
       //$r = dispatch(new EmailSendingToUser($user));
       dispatch(new \App\Jobs\EmailSendingToUser($user));
       echo $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
       dd('done');
       dd($r);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create','App\User');
        echo "create";
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
        echo $id;
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
    public function sendemail($id)
    {
        $user = User::findOrFail($id);
        $a = dispatch(new \App\Jobs\EmailSendingToUser($user));

    }
    public function test1()
    {
        //$this->authorize('test','App\User');
        echo "ee";
    }
    public function tempUrl()
    {
        return URL::temporarySignedRoute(
            'test1', now()->addMinutes(1), ['user' => 1]
        );
    }
}
