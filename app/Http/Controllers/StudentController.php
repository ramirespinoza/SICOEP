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
        $students = Student::all();
        return $students;
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
        $customer = new Student();

        $customer->personal_code = $request->get('personal_code');
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

        $customer->save();
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
}
