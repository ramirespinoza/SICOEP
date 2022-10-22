<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $municipality = Municipality::with('schools')->find($id);

            return response()->json([
                'status'    => 'successful',
                'code'      => '1',
                'operation' => 'create',
                'municipality'   => $municipality
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
}
