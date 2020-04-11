<?php

namespace App\Http\Controllers;

use App\Salary;
use Illuminate\Http\Request;
use DB;
class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$data = Salary::select(DB::raw('DISTINCT(salary) AS salary'))
                    ->orderBy('salary', 'desc')
                    ->limit(1,1)
                    ->get();
        d($data->toArray()); // ->toArray()*/
        // We can also use elequent model for getting this record if you want i can do it
        $max = DB::select(DB::raw('SELECT DISTINCT(salary) AS salary FROM salaries ORDER BY salary DESC LIMIT 0,1'));
        

        $second_max = DB::select(DB::raw('SELECT * FROM salaries WHERE  salary = (SELECT DISTINCT(salary) AS salary FROM salaries ORDER BY salary DESC LIMIT 1,1)'));
        return view("salary",['data'=>$second_max,'max'=>$max]);
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
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit(Salary $salary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
