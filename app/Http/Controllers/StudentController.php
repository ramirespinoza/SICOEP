<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Illuminate\Routing\ResponseFactory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function read(Request $request)
    {
        try {
            $query = Str::upper($request->q);
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $students = Student::with('professor.school')->orderBy('created_at', 'DESC')
                ->whereRaw(DB::raw("upper(name) like '%$query%'"))
                ->orWhereRaw(DB::raw("upper(last_name) like '%$query%'"))
                ->orWhereRaw(DB::raw("upper(personal_code) like '%$query%'"))
                ->take(10)
                ->get();
            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'students' => $students
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'read'
            ]);
        }

    }

    public function index(Request $request)
    {
        $query = Str::upper($request->q);

        $students = Student::orderBy('created_at', 'DESC')
                        ->whereRaw(DB::raw("upper(name) like '%$query%'"))
                        ->orWhereRaw(DB::raw("upper(last_name) like '%$query%'"))
                        ->orWhereRaw(DB::raw("upper(personal_code) like '%$query%'"))
                        ->take(10)
                        ->get();

        return Inertia::render('Student/Index', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
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
                'identification_document_number'    => 'required|integer',
                'class_schedule_id'                 => 'required|integer',
                'professor_dpi'                     => 'required|integer',
                'tutelary_name'                     => 'required|string:max:50',
                'tutelary_dpi'                      => 'required|integer'
            ]);


            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numbers = '0123456789';

            do {
                $personal_code =  substr(str_shuffle($letters), 0, 2)
                    .substr(str_shuffle($numbers), 0, 3)
                    .substr(str_shuffle($letters), 0, 3);


            } while (Student::find($personal_code) !== null);

            //Corregir el Case de los campos string recibidos

            $validated['personal_code']           = $personal_code;
            $validated['last_name']               = Str::title($validated['last_name']);
            $validated['name']                    = Str::title($validated['name']);
            $validated['section']                 = Str::upper($validated['section']);
            $validated['identification_document'] = Str::upper(
                $validated['identification_document']);
            $validated['tutelary_name']           = Str::title($validated['tutelary_name']);

            //Almacenamiendo del Student en el request
            Student::create($validated);

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'student'   => $request
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($personal_code)
    {
        try {
            $student = Student::with('professor.school.municipality.departament', 'grade')->find(Str::upper($personal_code));

            return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'create',
                    'student'   => $student
                ]);


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
     * @return \Illuminate\Http\JsonResponse
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
                'identification_document_number'    => 'required|integer',
                'class_schedule_id'                 => 'required|integer',
                'professor_dpi'                     => 'required|integer',
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
                'student'   => $request->all()
            ]);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($personal_code)
    {
        try {
            $student = Student::find(Str::upper($personal_code));
            $student->delete();

            return Redirect::route('student.index');

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
