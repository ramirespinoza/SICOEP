<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Illuminate\Routing\ResponseFactory;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ProfessorController extends Controller
{
    public function index()
    {
        
        $professors = Professor::all();

        return Inertia::render('Professor/Index', ['professors' => $professors]);
            
    }

    public function read()
    {
        try {
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $professors = Professor::orderBy('created_at', 'DESC')->get();
            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'professors' => $professors
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'read'
            ]);
        }

    }


    public function store(Request $request)
    {
        try {

            //Validación de todos los campos recibidos y el tipo
            $this->validate($request, [
                'dpi'                       => 'required|integer',
                'name'                      => 'required|string|max:50',
                'last_name'                 => 'required|string|max:50',
                'school_id'                 => 'required|integer'
            ]);

            //Corregir el Case de los campos string recibidos
            $request['name']                    = Str::title($request['name']);
            $request['last_name']               = Str::title($request['last_name']);

            //Almacenamiendo de professor en el request
            Professor::create($request->all());

            if($request->path() == 'api/professors') {
                return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'create',
                    'professors'   => $request->all()
                ]);
            } else {
                return Redirect::route('professor.index');
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'create',
                'error'     => $th->getMessage(),
                'professor'   => $request->all()
            ]);
        }
        
    }



    public function show($dpi)
    {
         try {
            $professor = Professor::find(Str::upper($dpi));

            return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'create',
                    'professor'   => $professor
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
   
    public function edit($dpi)
    {
        try {
            $professor = Professor::find(Str::upper($dpi));

            return Inertia::render('Professor/Edit', ['professor'=> $professor]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage()
            ]);
        }
    }


    public function update($dpi, Request $request)
    {
    
        try {

            //Validación de todos los campos recibidos y el tipo
            $validated = $request->validate( [
                'dpi'                       => 'required|integer',
                'name'                      => 'required|string|max:50',
                'last_name'                 => 'required|string|max:50',
                'school_id'                 => 'required|integer',
            ]);

            //Corregir el Case de los campos string recibidos
            $request['name']                    = Str::title($request['name']);
            $request['last_name']               = Str::title($request['last_name']);

            //Almacenamiendo del Professor en el request
            // en el registro del dpi recibido
            Professor::find($dpi)->update($validated);

            if($request->path() == 'api/professors/'.$dpi) {
                return response()->json([
                    'status'    => 'successful',
                    'code'      => '1',
                    'operation' => 'edit',
                    'professor'   => $request->all()
                ]);
            } else {
                return Redirect::route('professor.index');
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage(),
        ]);
        }
        
    }
    
    public function destroy($dpi)
    {
        try {
            $professor = Professor::find(Str::upper($dpi));
            $professor->delete();

            return Redirect::route('professor.index');

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
