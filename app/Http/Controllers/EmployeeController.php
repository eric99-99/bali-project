<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Validator;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $result = Employee::All();
        return  response()->json([
            'status' => 'success',
            'data' => $result
        ]);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rule = [
            'fullname' => 'required',
            'email' => "required",
            'mobilephone' => "required",
            "date_of_birth"=> "required",
            "address"=> "required"
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        }

        \DB::beginTransaction();
        try {
            $result = Employee::create($request->all());

        } catch (\Exception $e) {
            return  response()->json([
                'status' => 'failed',
                'message'=> 'Employee added  failed',
                'error' => $e->getMessage()
            ]);
        }

        \DB::commit();

        return response()->json([
            'status' => 'success',
            'message'=> 'Employee added successfully',
            'data' => $result
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Employee::find($id);
        return  response()->json([
            'status' => 'success',
            'data' => $result
        ]);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            $employee = Employee::find($id);
            $employee->delete();

        } catch (\Exception $e) {
            return  response()->json([
                'status' => 'failed',
                'message'=> 'Employee failed deleted',
                'error' => $e->getMessage()
            ]);
        }
        \DB::commit();

        return  response()->json([
            'status' => 'success',
            'message'=> 'Employee deleted succesfully'
        ]);
    }
}
