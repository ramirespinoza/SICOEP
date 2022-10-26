<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\Grade;
use App\Models\Municipality;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentEnrollment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Object_;

class DashboardController extends Controller
{
    /************* Students by school **************/
    public function students_by_school1(){


        return School::withCount('students')->get();
    }


    /*****************   Students by school with grade with  *********************************
     *                    filter grade and/or school and date
     * Parameters accepted: school, grade, dateEnd, dateStart
     */
    public function students_by_school(Request $request)
    {


        if ($request) {


            //----- Comprobación de parametros

            if (!$request->school) {
                $request->school = "";
            }
            if (!$request->grade) {
                $request->grade = "";
            }
            if (!$request->dateEnd) {
                $request->dateEnd = Carbon::now()->format('Y-m-d h:i:s');
            }
            if (!$request->dateStart) {
                $request->dateStart = '1900-01-01 00:00:00';
            }


            //----- Obtención de listado filtrado
            $request->school = Str::upper($request->school);
            $request->grade = Str::upper($request->grade);

            $schools = School::where('school.id', 'LIKE', "%$request->school%")->orWhereRaw("upper(school.name) LIKE '%$request->school%'")->get();
            $grades = Grade::where('grade.id', 'LIKE', "%$request->grade%")->orWhereRaw("upper(grade.name) LIKE '%$request->grade%'")->get();

            foreach ($schools as $school) {
                $count = 0;
                $school->grades = array();

                //Se quitan valores que no se desean mostrar
                unset($school->created_at, $school->updated_at);

                foreach ($grades as $grade) {
                    $school_id = $school->id;
                    $grade_id = $grade->id;
                    $school->grades = [$count => [
                        $grade->name => StudentEnrollment::join('grade', 'grade.id', '=', 'student_enrollment.grade_id')
                            ->join('professor', 'professor.dpi', '=', 'student_enrollment.professor_dpi')
                            ->join('school', 'school.id', '=', 'professor.school_id')
                            ->selectRaw('count(*) as count_student_enrollments')
                            ->where([
                                ['school.id', '=', "$school_id"],
                                ['grade.id', '=', "$grade_id"]])
                            ->whereBetween('enrollment_date', [$request->dateStart, $request->dateEnd])
                            ->first()

                    ]];

                    /*/Se comprueba que el grado contenga estudiantes
                    if($actual_grade[$count][$grade->name]['count_student_enrollments'] != 0) {

                        $school->grades += $actual_grade;
                        $count++;
                    }*/

                }


            }
            return $schools;
        }
    }


    /*****************   Students by school with grade with  *********************************
     *                    filter grade and/or school and date
     * Parameters accepted:
     *                      municipality: true, false or search.  Default:true,
     *                      department: true, false or search. Deafult: false,
     *                      dateEnd Default: Today, dateStart: 1900-01-01 00:00:00
     */

    public function students_by_department_municipality(Request $request){

        if (!$request->dateEnd) {
            $request->dateEnd = Carbon::now()->format('Y-m-d h:i:s');
        }
        if (!$request->dateStart) {
            $request->dateStart = '1900-01-01 00:00:00';
        }
        if (!$request->department) {
            $request->department = "false";
        }
        if (!$request->municipality) {
            $request->municipality = "true";
        }

        if ($request->department != "true" && $request->department != "false" && $request->department) {

            $request->department = Str::upper($request->department);
            $departaments = Departament::whereRaw("id LIKE '%$request->department%'")
                                    ->orWhereRaw("upper(name) LIKE '%$request->department%'")->get();

            $request->department = "true";
        } else {
            $departaments = Departament::all();//with('municipalities.schools')->get();
        }


        if($request->school) {
            $schools = School::withCount('student_enrollments')->where('id','LIKE',"%$request->school%")->get();

            return $schools;
        }

        $municipalities = array();
        $departaments_only = array();

        //Se recorren departamento
        foreach($departaments as $departament) {
            $count= 0; //contador para total estudiantes
            $index = 0;

            //Se quitan valores que no se desean mostrar
            unset($departament->created_at, $departament->updated_at);

            //Se recorren municipios del departamento actual
            foreach($departament->municipalities as $municipality) {


                $municipality->count_student_enrollments = 0; //se reinicia el contador

                //Se quitan valores que no se desean mostrar
                unset($municipality->created_at, $municipality->updated_at, $municipality->departament_id);

                 if(str_contains(Str::upper($municipality->name), Str::upper($request->municipality)) || $request->municipality == "true" || $request->municipality == "false") {
                     $municipality->count_student_enrollments = StudentEnrollment::join('grade', 'grade.id', '=', 'student_enrollment.grade_id')
                         ->join('professor', 'professor.dpi', '=', 'student_enrollment.professor_dpi')
                         ->join('school', 'school.id', '=', 'professor.school_id')
                         ->join('municipality', 'municipality.id', '=', 'school.municipality_id')
                         ->selectRaw('count(*) as count_student_enrollments')
                         ->where('municipality.id', '=', $municipality->id)
                         ->whereBetween('student_enrollment.enrollment_date', [$request->dateStart, $request->dateEnd])
                         ->get();

                     //Se quitan dimensiones al array
                     $municipality->count_student_enrollments = $municipality->count_student_enrollments[0]->count_student_enrollments;

                     $municipalities += [($municipality->id - 1) => ['id' => $municipality->id, 'name' => $municipality->name, "count_student_enrollments" => $municipality->count_student_enrollments]];

                     $index++;
                     $count += $municipality->count_student_enrollments;

                 } else {
                     unset($departament->municipalities[$index]);
                 }
                $index++;
            }


            $departaments_only += [($departament->id - 1) => ['id' => $departament->id, 'name' => $departament->name, "count_student_enrollments" => $count]];

        }

        if($request->municipality == "false") {return $departaments_only;}
        if($request->department == "true") {return $departaments;}
        else{return $municipalities;}

    }

    /*****************   Students by professor with school with  *********************************
     *                    filter school and/or professor and date
     * Parameters accepted:
     *                      school: true, false, search . Default:false.
     *                      professor: serach;
     */
    public function students_by_professor(Request $request)
    {


        //----- Comprobación de parametros

        if (!$request->school) {
            $request->school = "";
        }
        if ($request->school == "true") {
            $request->school = "";
        }
        if (!$request->professor) {
            $request->professor = "";
        }

        if (!$request->dateEnd) {
            $request->dateEnd = Carbon::now()->format('Y-m-d h:i:s');
        }
        if (!$request->dateStart) {
            $request->dateStart = '1900-01-01 00:00:00';
        }


        //----- Obtención de listado filtrado
        if($request->school != "false" ) {

            $request->school = Str::upper($request->school);

            $schools = School::where('school.id', 'LIKE', "%$request->school%")->orWhereRaw("upper(school.name) LIKE '%$request->school%'")->get();
        } else {

            $schools = School::all();
        }
        //Array para profesores sin referencia a la escuela
        $professors_without_school = array();
        $index = 0; //index for professors

        foreach ($schools as $school) {
            $count = 0;
            $school->grades = array();
            $local_index = 0;

            //Se quitan valores que no se desean mostrar
            unset($school->created_at, $school->updated_at);

            foreach ($school->professors as $professor) {
                $school_id = $school->id;
                $professor_dpi = $professor->dpi;

                //Se quitan valores que no se desean mostrar
                unset($professor->created_at, $professor->updated_at, $professor->school_id);

                if(str_contains(Str::upper($professor->name), Str::upper($request->professor)) ||
                    str_contains(Str::upper($professor->last_name), Str::upper($request->professor)) ||
                    $request->professor == "true" || $request->professor == "false") {

                    $professor->count_student_enrollments = StudentEnrollment::join('grade', 'grade.id', '=', 'student_enrollment.grade_id')
                        ->join('professor', 'professor.dpi', '=', 'student_enrollment.professor_dpi')
                        ->join('school', 'school.id', '=', 'professor.school_id')
                        ->selectRaw('count(*) as count_student_enrollments')
                        ->where([
                            ['school.id', '=', "$school_id"],
                            ['professor.dpi', '=', "$professor_dpi"]])
                        ->whereBetween('enrollment_date', [$request->dateStart, $request->dateEnd])
                        ->first();

                    //Se quitan dimensiones al array
                    $professor->count_student_enrollments = $professor->count_student_enrollments['count_student_enrollments'];

                    $professors_without_school += [($index) => ['id' => $professor->dpi, 'name' => $professor->name, "school" => $school->name, "count_student_enrollments" => $professor->count_student_enrollments]];
                    $index++;
                    $local_index++;
                } else {
                    unset($school->professors[$local_index]);
                    $local_index++;
                }

                /*/Se comprueba que el grado contenga estudiantes
                if($actual_grade[$count][$grade->name]['count_student_enrollments'] != 0) {

                    $school->grades += $actual_grade;
                    $count++;
                }*/

            }


        }
        if($request->school == "false") {
            return $professors_without_school;
        }
        return $schools;

    }

    /*****************   Students by school with grade with  *********************************
     *                    filter grade and/or school and date
     */
    public function test2(Request $request) {

        $departaments = Departament::all();//with('municipalities.schools')->get();
        $grades = Grade::all();

        foreach($departaments as $departament) {

            foreach($departament->municipalities as $municipality) {

                foreach ($municipality->schools as $school) {

                    $count = 0;
                    $school->grades = array();

                    foreach ($grades as $grade) {
                        $school_id = $school->id;
                        $grade_id = $grade->id;
                        $school->grades += [$count => [
                            $grade->name => Student::join('grade', 'grade.id','=','student.grade_id')
                                ->join('professor', 'professor.dpi','=','student.professor_dpi')
                                ->join('school', 'school.id', '=', 'professor.school_id')
                                ->selectRaw('count(*) as total_students')
                                ->where([
                                    ['school.id', '=', "$school_id"],
                                    ['grade.id', '=', "$grade_id"],
                                ])->first()

                        ]];
                        $count++;

                    }


                }

            }
        }

        return $departaments;
    }

}
