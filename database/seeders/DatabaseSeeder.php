<?php

namespace Database\Seeders;

use App\Models\Municipality;
use App\Models\Activity;
use App\Models\Course;
use App\Models\Professor;
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


        //Con factory
        Activity::factory(10)->create();
        Course::factory(10)->create();
        Student::factory(50)->create();
        Professor::factory(10)->create();



        //Con seeder
        $this->call(DepartamentSeeder::class);
        $this->call(MunicipalitySeeder::class);
    }
}
