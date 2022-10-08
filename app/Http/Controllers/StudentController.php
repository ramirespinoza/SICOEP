<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $students = Student::all();
            return $students;
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'read',
                'student' => $request->all()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ////
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $personal_code = $request->get('personal_code');
        
            $customer = new Student();

            $customer->personal_code = $request->get('personal_code');
            $customer->name = $request->get('name');
            $customer->last_name = $request->get('last_name');
            $customer->grade_id = $request->get('grade_id');
            $customer->section = $request->get('section');
            //$customer->birth_date = $request->get('birth_date');
            $customer->identification_document = $request->
                get('identification_document');
            $customer->identification_document_number = $request->
                get('identification_document_number');
            $customer->class_schedule_id = $request->get('class_schedule_id');
            $customer->professor_dpi = $request->get('professor_dpi');
            $customer->tutelary_name = $request->get('tutelary_name');
            $customer->tutelary_dpi = $request->get('tutelary_dpi');

            $customer->save();

            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'create',
                'student' => $request->all()
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'create',
                'student' => $request->all(),
                'error' => $th
            ]);
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
    public function update(Request $request, $personal_code)
    {

        try {
            $student = Student::find($personal_code);
            $customer->name = $request->get('name');
            $customer->last_name = $request->get('last_name');
            $customer->grade_id = $request->get('grade_id');
            $customer->section = $request->get('section');
            $customer->birth_date = $request->get('birth_date');
            $customer->identification_document = $request->
                get('identification_document');
            $customer->identification_document_number = $request->
                get('identification_document_number');
            $customer->class_schedule_id = $request->get('class_schedule_id');
            $customer->professor_dpi = $request->get('professor_dpi');
            $customer->tutelary_name = $request->get('tutelary_name');
            $customer->tutelary_dpi = $request->get('tutelary_dpi');

            $student->save();

            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'edit',
                'student' => $request->all()
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'edit',
                'student' => $request->all()
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($personal_code)
    {
        try {
            $student = Student::find(strtoupper($personal_code));
            $student->delete();

            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'delete',
                'student' => $request->all()
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'delete',
                'student' => $request->all()
            ]);
        }
        
    }
}
