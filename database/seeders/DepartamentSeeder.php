<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::factory()->createMany(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Alta Verapaz',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Baja Verapaz',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Chimaltenango',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Chiquimula',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'El Progreso',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Escuintla',
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Guatemala',
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Huehuetenango',
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => 'Izabal',
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Jalapa',
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => 'Jutiapa',
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'Petén',
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Quetzaltenango',
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Quiché',
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Retalhuleu',
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Sacatepéquez',
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'San Marcos',
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Santa Rosa',
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Solola',
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'Suchitepéquez',
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'Totonicapán',
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'Zacapa',
                ),
        ));
    }
}
