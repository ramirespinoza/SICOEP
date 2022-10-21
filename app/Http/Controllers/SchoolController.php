<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;


class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $schools = School::all();


        return Inertia::render('School/Index', ['schools' => $schools]);

    }

    public function read()
    {
        try {
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $schools = School::orderBy('created_at', 'DESC')->get();
            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'schools' => $schools
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'read'
            ]);
        }
    }


    public function show($id)
    {
        try {
            $school = School::find($id);

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'school'   => $school
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $this->validate($request, [

            'name' => 'required',
            'departament_id' => 'required',
            'municipality_id' => 'required',
        ]);

        School ::create($request->all());


        return response()->json([
            'status'    => 'successful',
            'code'      => '1',
            'operation' => 'create',
            'school'   => $request->all()
        ]);

    } catch (\Throwable $th) {
              return response()->json([
             'status'    => 'failed',
              'code'      => '0',
              'operation' => 'create',
              'error'     => $th->getMessage(),
               'school'   => $request->all()
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
    public function update(Request $request, $id)
    {
        try {
        $this->validate($request, [
            'name' => 'required',
            'departament_id' => 'required',
            'municipality_id' => 'required',
        ]);

        School ::find($id)->update($request->all());

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'school'   => $request->all()
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'create',
                'error'     => $th->getMessage(),
                'school'   => $request->all()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $School = School::findOrFail($id);
        $School->delete();


        return Redirect::route('school.index');
    }
}
