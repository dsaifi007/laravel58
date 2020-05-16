<?php

namespace App\Http\Controllers\Xhttp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class CommonAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    /**
     * check email in the database
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function checkEmail(Request $request)
    {
        $data = $request->input('email');

        $array = ['test@gmail.com'];
        if(in_array($data , $array)){
            echo "false";
            exit();
        }
        echo "true";
    }
   /**
     * get city list in the database
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function getcitylist(Request $request)
    {
        $country_id = $request->get('country_id');
        if(!$country_id){
            json_dump(["status"=>false,"msg"=>"something went to wrong. Please try again.."]);
        }
        $data['city_list'] = city_list($country_id);
        $data["status"] = true;
        return json_encode($data);
    }

}
