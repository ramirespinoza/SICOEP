<?php

namespace App\Http\Controllers;

use App\Models\CnbLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CnbLevelController extends Controller
{

    public function index()
    {

        $CnbLevel = CnbLevel::all();
        return Inertia::render('CnbLevel/Index', ['CnbLevels' => $CnbLevel]);

        return Redirect::route('CnbLevel.index');
    }


}

