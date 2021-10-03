<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::all();
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
        $this->validate($request, [
    		'firstname' => 'required',
    		'lastname' => 'required',
    		'gender' => 'required',
    		'phone' => 'required'
    	]);

    	$emplo = new Employee;
    	$emplo->firstname = $request->firstname;
    	$emplo->lastname = $request->lastname;
    	$emplo->gender = $request->gender;
    	$emplo->phone = $request->phone;
    	$emplo->save();
        if ($emplo) {
            return [
                "result" => "employee recorded done "
            ];
        }else {
            return ["result" => "operation failed "];
        }
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
        return Employee::find($id);
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
        $this->validate($request, [
    		'firstname' => 'required',
    		'lastname' => 'required',
    		'gender' => 'required',
    		'phone' => 'required'
    	]);
    	$emplo = Employee::find($id);
    	$emplo->firstname = $request->firstname;
    	$emplo->lastname = $request->lastname;
    	$emplo->gender = $request->gender;
    	$emplo->phone = $request->phone;
    	$emplo->save();
        if ($emplo) {
            return [
                "result" => "employee updted done "
            ];
        }else {
            return ["result" => "operation failed "];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = Employee::find($id)->delete();

	return ['success' =>$success] ;
    }
}
