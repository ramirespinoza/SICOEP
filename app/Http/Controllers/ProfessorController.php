<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all()->toArray();
        return array_reverse($professors);      
    }
    public function store(Request $request)
    {
        $professor = new Professor([
            'dpi' => $request->input('dpi'),
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name')
        ]);
        $professor->save();
        return response()->json('Catedratico Creado!');
    }
  
}
