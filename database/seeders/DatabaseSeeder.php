<?php

namespace Database\Seeders;

use App\Models\Departament;
use App\Models\Municipality;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Professor;
use App\Models\School;
use App\Models\Student;
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


        //Con factory
        Activity::factory(10)->create();
        Course::factory(10)->create();

        $departaments = Departament::all();

        foreach ($departaments as $departament) {
        School::factory(4)
            ->has(Professor::factory()->has(Student::factory(10)->state(['grade_id' => 1,]), 'students'), 'professors')
            ->has(Professor::factory()->has(Student::factory(10)->state(['grade_id' => 2,]), 'students'), 'professors')
            ->has(Professor::factory()->has(Student::factory(10)->state(['grade_id' => 3,]), 'students'), 'professors')
            ->has(Professor::factory()->has(Student::factory(10)->state(['grade_id' => 4,]), 'students'), 'professors')
            ->has(Professor::factory()->has(Student::factory(10)->state(['grade_id' => 5,]), 'students'), 'professors')
            ->has(Professor::factory()->has(Student::factory(10)->state(['grade_id' => 6,]), 'students'), 'professors')
            ->has(Professor::factory()->has(Student::factory(10)->state(['grade_id' => 7,]), 'students'), 'professors')
            ->for(
                Municipality::query()->where('departament_id', '=', $departament->id)->first())
            ->create();
        }

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
}
