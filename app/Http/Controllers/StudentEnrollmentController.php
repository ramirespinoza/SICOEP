<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentEnrollment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class StudentEnrollmentController extends Controller
{

    public function read(Request $request)
    {
        try {
            $query = Str::upper($request->q);
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $student_enrollments = StudentEnrollment::with('professor.school', 'student')->orderBy('created_at', 'DESC')
                ->whereRaw(DB::raw("upper(student.name) like '%$query%'"))
                ->orWhereRaw(DB::raw("upper(student.last_name) like '%$query%'"))
                ->orWhereRaw(DB::raw("upper(student.personal_code) like '%$query%'"))
                ->take(10)
                ->get();
            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'student_enrollments' => $student_enrollments
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'read'
            ]);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Str::upper($request->q);

        $student_enrollments = StudentEnrollment::with('student')
            ->join('student', 'student.personal_code','=','student_enrollment.student_personal_code')
            ->whereRaw(DB::raw("upper(student.name) like '%$query%'"))
            ->orWhereRaw(DB::raw("upper(student.last_name) like '%$query%'"))
            ->orWhereRaw(DB::raw("upper(student.personal_code) like '%$query%'"))
            ->orderBy('student_enrollment.created_at','DESC' )
            ->take(10)
            ->get();

        return Inertia::render('StudentEnrollment/Index', ['student_enrollments' => $student_enrollments]);
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
            $validated_student_enrollment = $request->validate( [
                'student_personal_code'             => 'required|string|8',
                'grade_id'                          => 'required|integer',
                'section'                           => 'required|string|max:1',
                'class_schedule_id'                 => 'required|integer',
                'professor_dpi'                     => 'required|integer',
            ]);

            if(Student::find($validated_student_enrollment['personal_code']) === null) {

                $validated_student = $request->validate([
                    'name' => 'required|string|max:50',
                    'last_name' => 'required|string|max:50',
                    'birth_date' => 'required|date',
                    'identification_document' => 'required|string|max:5',
                    'identification_document_number' => 'required|integer',
                    'tutelary_name' => 'required|string:max:50',
                    'tutelary_dpi' => 'required|integer'
                ]);


                $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $numbers = '0123456789';

                do {
                    $personal_code = substr(str_shuffle($letters), 0, 2)
                        . substr(str_shuffle($numbers), 0, 3)
                        . substr(str_shuffle($letters), 0, 3);


                } while (Student::find($personal_code) !== null);

                //Corregir el Case de los campos string recibidos del Student

                $validated_student['personal_code'] = $personal_code;
                $validated_student['last_name'] = Str::title($validated_student['last_name']);
                $validated_student['name'] = Str::title($validated_student['name']);
                $validated_student['identification_document'] = Str::upper(
                    $validated_student['identification_document']);
                $validated_student['tutelary_name']           = Str::title($validated_student['tutelary_name']);

                //Almacenamiendo del Student en el request
                Student::create($validated_student);

                $new_student = true;

            }


            //Corregir el Case de los campos string recibidos del StudentEnrollment

            $new_student = true;
            $validated_student_enrollment['section']                 = Str::upper($validated_student_enrollment['section']);
            $validated_student_enrollment['enrollment_date'] = Carbon::now()->format('Y-m-d H:i:s');


            //Almacenamiendo del StudentEnrollment en el request
            StudentEnrollment::create($validated_student_enrollment);

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'new_student' => $new_student,
                'student_enrollment'   => $request
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
    public function show($id)
    {
        try {
            $student_enrollment = StudentEnrollment::with('professor.school.municipality.departament', 'grade', 'student')->find($id);

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'student_enrollment'   => $student_enrollment
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
    public function update(Request $request, $student_personal_code)
    {
        try {
            //Validación de todos los campos recibidos y el tipo

            $validated_student_enrollment = $request->validate( [
                'grade_id'                          => 'required|integer',
                'section'                           => 'required|string|max:1',
                'class_schedule_id'                 => 'required|integer',
                'professor_dpi'                     => 'required|integer',
            ]);

            $validated_student = $request->validate( [
                'tutelary_name'                     => 'required|string:max:50',
                'tutelary_dpi'                      => 'required|integer'
            ]);

            //Corregir el Case de los campos string recibidos y del personal_code

            $validated_student_enrollment['student_personal_code']                 = Str::upper($student_personal_code);
            $validated_student_enrollment['section']                 = Str::upper($validated_student_enrollment['section']);
            $validated_student['tutelary_name']           = Str::title($validated_student['tutelary_name']);

            //Almacenamiendo del Student del el request
            // en el registro del personal_code recibido
            $student_enrollment = StudentEnrollment::find($student_personal_code);
            $student_enrollment->update($validated_student_enrollment);
            $student = StudentEnrollment::find($validated_student_enrollment['student_personal_code']);
            $student->update($validated_student);


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
    public function destroy($id)
    {
        try {
            $student_enrollment = StudentEnrollment::find(Str::upper($id));
            $student_enrollment->delete();

            return Redirect::route('student_enrollment.index');

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
