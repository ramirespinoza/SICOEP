<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ExamSchedule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Illuminate\Routing\ResponseFactory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ExamScheduleController extends Controller
{
    public function read()
    {
        try {
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $exam_schedules = ExamSchedule::orderBy('created_at', 'DESC')->get();
            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'exam_schedules' => $exam_schedules
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'read'
            ]);
        }

    }
    public function index()
    {
        $exam_schedules = ExamSchedule::all();

        return Inertia::render('Exam_Schedule/Index', ['exam_schedules' => $exam_schedules]);
    }




    public function store(Request $request)
    {

        try {

            //Validación de todos los campos recibidos y el tipo
            $this->validate($request, [
                'course_id'                  => 'required',
                'bimestre'                   => 'required|string|max:50',
                'date_'                      => 'required|date',

            ]);


            $request['course_id']                    = Str::title($request['course_id']);
            $request['bimestre']                     = Str::title($request['bimestre']);
            $request['date_']                        = Str::title($request['date_']);


            //Almacenamiendo del Student en el request
            ExamSchedule::create($request->all());

            if($request->path() == 'api/exam_schedule') {
                return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'create',
                    'exam_schedule'   => $request->all()
                ]);
            } else {
                return Redirect::route('exam_schedule.index');
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'create',
                'error'     => $th->getMessage(),
                'exam_schedule'   => $request->all()
            ]);
        }
    }


    public function show($id)
    {
        try {
            $exam_schedule = ExamSchedule::find(Str::upper($id));

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'exam_schedule'   => $exam_schedule
            ]);

            //return Inertia::render('Student/Show', ['student'=> $student]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $exam_schedule = ExamSchedule::find(Str::upper($id));

            return Inertia::render('exam_schedule/Edit', ['exam_schedule'=> $exam_schedule]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage()
            ]);
        }
    }


    public function update(Request $request, $id)
    {

        try {
            //Validación de todos los campos recibidos y el tipo
            $validated = $request->validate( [
                'course_id'                              => 'required',
                'bimestre'                               => 'required|string|max:100',
                'date_'                                  => 'required|date',
            ]);

            //Corregir el Case de los campos string recibidos y del personal_code
            $id                                    = Str::upper($id);
            $validated['course_id']                = Str::title($validated['course_id']);
            $validated['bimestre']              = Str::title($validated['bimestre']);
            $validated['date_']              = Str::title($validated['date_']);


            //Almacenamiendo del Student del el request
            // en el registro del personal_code recibido
            ExamSchedule::find($id)->update($validated);

            if($request->path() == 'api/exam_schedule/'.$id) {
                return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'edit',
                    'exam_schedule'   => $request->all()
                ]);
            } else {
                return Redirect::route('exam_schedule.index');
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage()
            ]);
        }

    }

    public function destroy($id)
    {
        try {
            $exam_schedule = ExamSchedule::find(Str::upper($id));
            $exam_schedule->delete();

            return Redirect::route('exam_schedule.index');

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
