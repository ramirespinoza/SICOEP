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

        $municipalities = Municipality::all();

        foreach ($municipalities as $municipality) {
        School::factory(4)
            ->has(Professor::factory(4)->has(Student::factory(15), 'students'), 'professors')
            ->for($municipality)
            ->create();
        }





    }
}
