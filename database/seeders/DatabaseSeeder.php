<?php

namespace Database\Seeders;

use App\Models\CnbLevel;
use App\Models\Departament;
use App\Models\Grade;
use App\Models\Municipality;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Professor;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentEnrollment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([

            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        //Con seeder
        $this->call(DepartamentSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(CnbSeeder::class);
        $this->call(ClassScheduleSeeder::class);


        //Con factory
        Activity::factory(10)->create();


        $departaments = Departament::all();


        /********************** foreach testing *******************/

        foreach ($departaments as $departament) {

            $year = 1999;
            $schools = School::factory(4)
                ->for(Municipality::query()->where('departament_id', '=', $departament->id)->first())->create();

            foreach ($schools as $school) {

                for ($y = 0; $y < 3; $y++) {

                    $professor = Professor::factory()->for($school)->create();
                    for ($x = 0; $x < 3; $x++) {

                        $students = Student::factory(5)->create();

                        foreach ($students as $student) {

                            foreach (range(1, 8, 1) as $count) {

                                StudentEnrollment::factory()
                                    ->state(['grade_id' => $count, 'enrollment_date' => $this->getDate($year),])
                                    ->for($student)
                                    ->for($professor)
                                    ->create();

                                $year++;
                            }
                            $year -= 8;
                        }
                        $year += 8;
                    }

                    $year = 1999;
                }
            }
        }

        /*******************    foreach without student ******************************/
        /*
        foreach (range(2000,2022, 1) as $year) {
            foreach ($departaments as $departament) {
                School::factory(4)
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 1, 'enrollment_date' => $this->getDate($year), ])->for(Student::factory()), 'student_enrollments'), 'professors')
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 2, 'enrollment_date' => $this->getDate($year),]), 'student_enrollments'), 'professors')
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 3, 'enrollment_date' => $this->getDate($year),]), 'student_enrollments'), 'professors')
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 4, 'enrollment_date' => $this->getDate($year),]), 'student_enrollments'), 'professors')
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 5, 'enrollment_date' => $this->getDate($year),]), 'student_enrollments'), 'professors')
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 6, 'enrollment_date' => $this->getDate($year),]), 'student_enrollments'), 'professors')
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 7, 'enrollment_date' => $this->getDate($year),]), 'student_enrollments'), 'professors')
                    ->has(Professor::factory()
                        ->has(StudentEnrollment::factory(10)
                            ->state(['grade_id' => 8, 'enrollment_date' => $this->getDate($year),]), 'student_enrollments'), 'professors')

                    ->for(
                        Municipality::query()->where('departament_id', '=', $departament->id)->first())
                    ->create();
            }
        }
        */



        /*foreach ($departaments as $departament) {

            foreach ($departaments as $departament) {
                School::factory(4)
                    ->has(
                        Professor::factory()->has(Student::factory(15), 'students'
                        ), 'professors')
                    ->has(
                        Professor::factory()->has(Student::factory(15), 'students'
                        ), 'professors')
                    ->for(
                        Municipality::query()->where('departament_id', '=', $departament->id)->first())
                    ->create();
            }
        }*/





    }

    public function getDate ($year) {
        $day = rand(0,2).rand(1,8);
        $month = rand(0,0).rand(1,3);
        return "$year-$month-$day 12:00:00";
    }
}
