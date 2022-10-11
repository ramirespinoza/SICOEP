<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $students = Student::orderBy('created_at', 'DESC')->get();
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

            //Validación de todos los campos recibidos y el tipo
            $this->validate($request, [
                'personal_code'                     => 'required|string|max:10',
                'name'                              => 'required|string|max:50',
                'last_name'                         => 'required|string|max:50',
                'grade_id'                          => 'required|integer',
                'section'                           => 'required|string|max:1',
                'birth_date'                        => 'required|date',
                'identification_document'           => 'required|string|max:5',
                'identification_document_number'    => 'required|numeric',
                'class_schedule_id'                 => 'required|numeric',
                'professor_dpi'                     => 'required|numeric',
                'tutelary_name'                     => 'required|string:max:50',
                'tutelary_dpi'                      => 'required|integer'
            ]);

            //Corregir el Case de los campos string recibidos
            $request['personal_code']          = Str::upper($request['personal_code']);
            $request['name']                    = Str::title($request['name']);
            $request['last_name']               = Str::title($request['last_name']);
            $request['section']                 = Str::upper($request['section']);
            $request['identification_document'] = Str::upper(
                $request['identification_document']);
            $request['tutelary_name']           = Str::title($request['tutelary_name']);

            //Almacenamiendo del Student en el request
            Student::create($request->all());

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'student'   => $request->all()
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'create',
                'error'     => $th->getMessage(),
                'student'   => $request->all()
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
        try {
            $student = Student::find($id);
            return response()->json($student);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $student = Student::find($id);
            return response()->json($student);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage()
            ]);
        }
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
            //Validación de todos los campos recibidos y el tipo
            $validated = $request->validate( [
                'name'                              => 'required|string|max:50',
                'last_name'                         => 'required|string|max:50',
                'grade_id'                          => 'required|integer',
                'section'                           => 'required|string|max:1',
                'birth_date'                        => 'required|date',
                'identification_document'           => 'required|string|max:5',
                'identification_document_number'    => 'required|numeric',
                'class_schedule_id'                 => 'required|numeric',
                'professor_dpi'                     => 'required|numeric',
                'tutelary_name'                     => 'required|string:max:50',
                'tutelary_dpi'                      => 'required|integer'
            ]);

            //Corregir el Case de los campos string recibidos y del personal_code
            $personal_code                      = Str::upper($personal_code);
            $validated['name']                    = Str::title($validated['name']);
            $validated['last_name']               = Str::title($validated['last_name']);
            $validated['section']                 = Str::upper($validated['section']);
            $validated['identification_document'] = Str::upper(
                $validated['identification_document']);
            $validated['tutelary_name']           = Str::title($validated['tutelary_name']);

            //Almacenamiendo del Student del el request 
            // en el registro del personal_code recibido
            Student::find($personal_code)->update($validated);

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'edit',
                'student'   => $validated
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage(),
                'student'   => $request->all()
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
            $student = Student::find(Str::upper($personal_code));
            $student->delete();

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'delete',
                'student'   => $student->all()
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'delete',
                'error'     => $th->getMessage()
            ]);
        }
        
    }
}
