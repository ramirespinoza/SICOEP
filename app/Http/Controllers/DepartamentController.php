<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function read()
    {


        try {
            //Se obtiene los registros por orden de fecha de creación
            // en forma descentiente
            $departaments = Departament::with('municipalities')->orderBy('id', 'ASC')->get();//->orderBy('name','ASC')->get();

            return response()->json([
                'status' => 'successful',
                'code' => '1',
                'operation' => 'read',
                'departaments' => $departaments
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'code' => '0',
                'operation' => 'read'
            ]);
        }
    }

}
