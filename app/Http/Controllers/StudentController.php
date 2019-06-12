<?php

namespace App\Http\Controllers;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Gate;
use App\Events\SendEmail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "ee";die;
        // for authentication of  resource
        if(Gate::allows('custom-resource','App\User')){
            echo "Verify";
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // for authentication of CURD
        $this->authorize('create','App\Student');
        echo "successfully";
    }
    function test(){
        $path = public_path();
         echo $path;die;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(array("id"=>$request->input('id')),200);
        //dd($request->input('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    public function getEmail()
    {
        //die("Dd");
        $user = User::all();
        //dump($user);
        foreach ($user as $a)
        {
            echo $a->email;
             /*Mail::raw("This is automatically generated Hourly Update", function($message) use ($a)
             {
                $message->from('phptalk11@gmail.com');
                $message->to($a->email)->subject('Hourly Update');
             });*/
        }
        //$this->info('Hourly Update has been send successfully');
    }
    function eventGenrate($id = 1){
       $data = User::findOrFail($id);
       //dd($data);
        // Order shipment logic...

        event(new SendEmail($data)); 
    }
    public function string()
    {
        $a = "a b c d";
        $inc = 'a';
        for ($i=0; $i <strlen($a) ; $i++) { 
            //$inc.=$a[$i];
            echo trim($a[$i]);
        }
         
    }
}
