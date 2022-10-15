<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Illuminate\Routing\ResponseFactory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;


class CourseController extends Controller
{
    public function read()
    {
        try {
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $courses = Course::orderBy('created_at', 'DESC')->get();
            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'courses' => $courses
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
        $courses = Course::all();

        return Inertia::render('Course/Index', ['courses' => $courses]);
    }

    public function create()
    {
        return Inertia::render('Course/Create');
    }


    public function store(Request $request)
    {

        try {

            //Validación de todos los campos recibidos y el tipo
            $this->validate($request, [
                'id'                     => 'required|string|max:10',
                'name'                   => 'required|string|max:50',
                'description'            => 'required|string|max:50',

            ]);

            //Corregir el Case de los campos string recibidos
            $request['id']                      = Str::upper($request['id']);
            $request['name']                    = Str::title($request['name']);
            $request['description']               = Str::title($request['description']);


            //Almacenamiendo del Student en el request
            Course::create($request->all());

            if($request->path() == 'api/course') {
                return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'create',
                    'student'   => $request->all()
                ]);
            } else {
                return Redirect::route('course.index');
            }

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


    public function show($id)
    {
        try {
            $course = Course::find(Str::upper($id));

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'course'   => $course
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
            $course = Course::find(Str::upper($id));

            return Inertia::render('Course/Edit', ['course'=> $course]);

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
                'name'                              => 'required|string|max:50',
                'description'                       => 'required|string|max:100',
            ]);

            //Corregir el Case de los campos string recibidos y del personal_code
            $id                                   = Str::upper($id);
            $validated['name']                    = Str::title($validated['name']);
            $validated['description']              = Str::title($validated['description']);


            //Almacenamiendo del Student del el request
            // en el registro del personal_code recibido
            Course::find($id)->update($validated);

            if($request->path() == 'api/course/'.$id) {
                return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'edit',
                    'student'   => $request->all()
                ]);
            } else {
                return Redirect::route('course.index');
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
            $course = Course::find(Str::upper($id));
            $course->delete();

            return Redirect::route('course.index');

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
