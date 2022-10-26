<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use Illuminate\Database\Seeder;

class ClassScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassSchedule::factory()->createMany([
            ['journey'=> 'Matutina', "description" => 'De 7:00 a 12:00 horas'],
            ['journey'=> 'Vespertina', "description" => 'De 13:00 a 18:00 horas'],
            ['journey'=> 'Nocturna', "description" => 'De 20:00 a 22:00 horas']
        ]);
    }
}
