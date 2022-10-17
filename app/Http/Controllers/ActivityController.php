<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ActivityController extends Controller
{

    public function read()
    {
        try {
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $activities = Activity::orderBy('created_at', 'DESC')->get();
            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'activities' => $activities
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
        $activities = Activity::orderBy('created_at', 'DESC')->get();

        return Inertia::render('Activity/Index', ['activities' => $activities]);
    }


    public function store(Request $request)
    {
        try {

            //Validación de todos los campos recibidos y el tipo
            $validated = $request->validate([
                'name'          => 'required|string|max:50',
                'description'   => 'required|string|max:100'
            ]);

            //Corregir el Case de los campos string recibidos
            $validated['name']          = Str::title($validated['name']);
            $validated['description']   = Str::ucfirst($validated['description']);

            //Almacenamiendo del Student en el request
            Activity::create($validated);

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'activity'  => $validated
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'create',
                'error'     => $th->getMessage(),
                'activity'   => $request->all()
            ]);
        }
    }


    public function show($id)
    {
        try {
            $activity = Activity::find(Str::upper($id));

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'activity'   => $activity
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


    public function update(Request $request, $id)
    {
        try {
            //Validación de todos los campos recibidos y el tipo
            $validated = $request->validate( [
                'name'                              => 'required|string|max:50',
                'description'                       => 'required|string|max:100',
            ]);

            //Corregir el Case de los campos string recibidos y del personal_code
            $validated['name']                      = Str::title($validated['name']);
            $validated['description']               = Str::ucfirst($validated['description']);

            //Almacenamiendo del Student del el request
            // en el registro del personal_code recibido
            Activity::find($id)->update($validated);

            if($request->path() == 'api/activity/'.$id) {
                return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'edit',
                    'activity'   => $validated
                ]);
            } else {
                return Redirect::route('activity.index');
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
            $activity = Activity::find($id);
            $activity->delete();

            return Redirect::route('activity.index');

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
