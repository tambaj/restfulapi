<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\MoveEmplo;
// use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MoveEmplo;

class MoveEmploController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT employees.firstname,employees.lastname,movements.movement_type,
        movemplos.description,movemplos.created_at FROM movemplos INNER JOIN employees ON movemplos.employee_id=employees.id
         INNER JOIN movements ON movemplos.movement_id=movements.id');
        
        return $data;
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
        //return response($request->all());
        $this->validate($request, [
    		'movement_id' => 'required',
    		'employee_id' => 'required',
    		'description' => 'required'
    	]);

    	$emplo = new MoveEmplo();
    	$emplo->movement_id = $request->movement_id;
    	$emplo->employee_id = $request->employee_id;
    	$emplo->description = $request->description;
    	$emplo->save();
        if ($emplo) {
            return  response(["result" => "Movement recorded done "]);
        }else {
            return response(["result" => "operation failed"]);
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
    		'movement_id' => 'required',
    		'employee_id' => 'required',
    		'description' => 'required'
    	]);
    	$emplo = MoveEmplo::find($id);
    	$emplo->movement_id = $request->movement_id;
    	$emplo->employee_id = $request->employee_id;
    	$emplo->description = $request->description;
    	$emplo->save();
        if ($emplo) {
            return [
                "result" => "Movement updted done "
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
    public function destroy(MovEmplo $id)
    {
        $success = $id->delete();

	return ([
		'success' =>$success
	]);
    }
}
