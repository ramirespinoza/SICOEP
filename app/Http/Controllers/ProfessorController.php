<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        try {
            $professors = Professor::all()->toArray();
            return array_reverse($professors);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'read',
                'error'     => $th->getMessage()
            ]);
        }
            
            
    }
    public function store(Request $request)
    {
        try {
            $professor = new Professor([
                'dpi' => $request->input('dpi'),
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name')
            ]);
            $professor->save();
            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'professor'   => $request->all()
            ]);

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

    public function show($id)
    {
        try {
            $professor = Professor::find($id);
            return response()->json($professor);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => 'failed',
                'code'      => '0',
                'operation' => 'edit',
                'error'     => $th->getMessage()
            ]);
        }
        
    }
   
    public function update($id, Request $request)
    {
        try {
            $professor = Professor::find($id);
            $professor->update($request->all());
            return response()->json([
                'status'    => 'successful',
                'code'      => '0',
                'operation' => 'edit',
                'student'   => $request->all()
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
    
    public function destroy($id)
    {
        try {
            $professor = Professor::find($id);
            $professor->delete();
            return response()->json([
                'status'    => 'successful',
                'code'      => '0',
                'operation' => 'delete',
                'student'   => $request->all()
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
