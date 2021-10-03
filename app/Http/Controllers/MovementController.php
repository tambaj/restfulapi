<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movement;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movement::all();
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
    		'movement_type' => 'required'
    	]);
    	$momvement = new Movement;
    	$momvement->movement_type = $request->movement_type;
    	$momvement->save();
        if ($momvement) {
            return [
                "result" => "momvement recorded done "
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
        $this->validate($request, [
    		'movement_type' => 'required'
    	]);
    	$momvement = Movement::find($id);
    	$momvement->save();
        if ($momvement) {
            return [
                "result" => "movement updted done "
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
        $success = Movement::find($id)->delete();

	return ([
		'success' =>$success
	]);
    }
}
