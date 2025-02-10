<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Validator;

class ExperienceController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'employee_id' => 'required',
            'company_name' => "required",
            'job_title' => "required",
            "start_date"=> "required",
            "job_description"=> "required"
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        }

        \DB::beginTransaction();
        try {
            $result = Experience::create($request->all());
            $data = \App\Models\Employee::with('experiences')
                    ->select(['id','fullname'])
                    ->where('id', '=', $request['employee_id'])
                    ->get();

        } catch (\Exception $e) {
            return  response()->json([
                'status' => 'failed',
                'message'=> 'Experience added  failed',
                'error' => $e->getMessage()
            ]);
        }

        \DB::commit();

        return response()->json([
            'status' => 'success',
            'message'=> 'Experience added successfully',
            'data' => $data
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
        $data = \App\Models\Employee::with('experiences')
                    ->select(['id','fullname'])
                    ->where('id', '=', $id)
                    ->get();

        return  response()->json([
                        'status' => 'success',
                        'data' => $data
                    ]);

    }

}
