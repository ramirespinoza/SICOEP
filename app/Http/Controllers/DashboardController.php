<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function students_by_school(){
        return School::withCount('students')->get();
    }
}
