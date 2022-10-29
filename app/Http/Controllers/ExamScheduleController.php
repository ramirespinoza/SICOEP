<?php

namespace App\Http\Controllers;

use App\Models\ExamSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Illuminate\Routing\ResponseFactory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ExamScheduleController extends Controller
{
    public function read(Request $request)
    {
        try {

            $query = Str::upper($request->q);
            $exam_schedules = ExamSchedule::with('course')->orderBy('created_at', 'DESC')
                ->whereRaw(DB::raw("upper(id) like '%$query%'"))
                ->take(10)
                ->get();

            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'exam_schedules' => $exam_schedules,

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
        $exam_schedules = ExamSchedule::with('course')->orderBy('created_at', 'DESC')
            ->whereRaw(DB::raw("upper(id) like '%$query%'"))
            ->take(10)
            ->get();

        return Inertia::render('Exam_Schedule/Index', ['exam_schedules' => $exam_schedules]);
    }



    public function store(Request $request)
    {

        try {
            $request['date_']                        = Carbon::parse($request['date_'])->format('Y-m-d H:i:s');
            //Validación de todos los campos recibidos y el tipo
            $this->validate($request, [
                'course_id'                  => 'required',
                'bimestre'                   => 'required|string|max:50',
                'date_'                   => 'required|date',


            ]);


            $request['course_id']                    = Str::title($request['course_id']);
            $request['bimestre']                     = Str::title($request['bimestre']);




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
            $exam_schedule = ExamSchedule::with('course')->find(Str::upper($id));

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
            $request['date_']                        = Carbon::parse($request['date_'])->format('Y-m-d H:i:s');
            $validated = $request->validate( [
                'course_id'                              => 'required',
                'bimestre'                               => 'required|string|max:100',
                'date_'                                  => 'required|date',

            ]);

            $id                                    = Str::upper($id);
            $validated['course_id']                = Str::title($validated['course_id']);
            $validated['bimestre']              = Str::title($validated['bimestre']);




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

            return Redirect::route('exam_schedule.index')->with('successful', '¡Horario de examenes eliminado!');

        } catch (\Throwable $th) {
            return Redirect::route('exam_schedule.index')->with('danger', 'No se pudo eliminar el horario de examenes.');


        }

    }
}
