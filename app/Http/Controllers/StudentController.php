<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\UserFee;
use Illuminate\Support\Facades\Validator;
use DB;
use DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id='')
    {


        if ($request->ajax()) {

            $data = Student::where(['is_enquiry'=>$id])->get();
           
           
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $id = $row->id;
                           $btn = '<a href="/user/edit/'.$id.'" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('students',['id'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id=0)
    {
        try
        {
         $data = $request->all();
         
          $validator = Validator::make($request->all(), [
            'email' => 'required|unique:students|max:255'
        ]);
        if ($validator->fails()) {
            return redirect('user/add')
                        ->withErrors($validator)
                        ->withInput();
        }

         unset($data['_token']);
         //DB::transaction(function () {
         $insert_data = array_slice($data,0,6);

         $student = Student::firstOrCreate(["id"=>$id], $insert_data);
         
         $msg  = "New user has been successfully added in our record";
         if(!$student->id){
           $msg = "Something went to wrong Please try again!";
         }else{

            if(!(int)$data['is_enquiry']){
                $sid = $student->id;
                UserFee::create([
                 "student_id"=>$sid,
                 "fees"=>$data['payment'],
                 "next_payment_date"=>trim($data['next_payment_date'])
                ]);
             }
         }
         //});
         return redirect('user/add')->with('status', $msg);
       }
       catch(Exception $e)
        {
            redirect('user/add')->with('status',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=1)
    {
        //$data = Student::find(1);
        $data = Student::with("userFees")->paginate(1);
        d($data->toJson());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = Student::findOrFail($id);
       $fees = UserFee::where('student_id', '=', $id)->get(['fees']);
       // d($fees->toArray());
       return view("edit",["data"=>$data]);
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
    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showData()
    {

    }
}
