<?php

namespace App\Http\Controllers;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Gate;
use App\Events\SendEmail;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "ee";die;
        // for authentication of  resource
        if(Gate::allows('edit-user','App\User')){
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
        return response()->json(array("id"=>1),200);
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
       $this->authorize('view',[$student,4]);
       echo "accessible";
       //echo $id;die;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$id)
    {
       // echo $id;die;
       $this->authorize('update','App\Student');
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
    public function matrix()
    {
        $in = 1;
        for ($i=0; $i <=3 ; $i++) { 
               for ($j=1; $j<=4;$j++) { 
                   echo $in."&emsp;";
                   $in++;
               }
               echo "<br>";
            }    
    }
    public function imgupload()
    {
        //echo "Eee";
       dd($_FILES);
    }


    public function given_access_to_user(Student $student)
    {
        $this->authorize('access_level',$student);
    }

    public function map_city()
    {
     /* $data = DB::table("City")->select('id','CountryCode')->get();
      $data1 = DB::table("country_code")->select('id','code')->get();
      foreach ($data as $key => $value) {
          foreach ($data1 as $k => $v) {
              if($value->CountryCode == $v->code){
                //echo $value->CountryCode;
                DB::table('City')->where('CountryCode', $value->CountryCode)->update(['country_code_id' => $v->id]);
              }
          }
      }*/
      //dd($data);
    }
}
