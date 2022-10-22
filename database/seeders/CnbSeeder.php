<?php

namespace Database\Seeders;

use App\Models\CnbLevel;
use App\Models\Course;
use App\Models\Grade;
use App\Models\GradeCourse;
use Illuminate\Database\Seeder;

class CnbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** -------- CNB LEVEL ------------ */
        CnbLevel::factory()->createMany([
            [
                'id' => 1,
                'name' => 'Preprimaria',
                'description' => 'CNB para el nivel de Preprimaria'
            ],

            [
                'id' => 2,
                'name' => 'Primaria',
                'description' => 'CNB para el nivel de Primaria'
            ]
        ]);


        /** -------- GRADE ------------ */
        Grade::factory()->createMany([
            [
                'id' => 1,
                'name' => 'Cuatro Años',
                'description' => 'Competencias de Etapa - Cuatro años',
                'cnb_level_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Cinco Años',
                'description' => 'Competencias de Etapa - Cinco años',
                'cnb_level_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Seis Años',
                'description' => 'Competencias de Etapa - Seis años',
                'cnb_level_id' => 1
            ],
            //-------------- Primaria
            [
                'id' => 4,
                'name' => 'Primer Grado',
                'description' => 'Competencias Primer Grado',
                'cnb_level_id' => 2
            ],
            [
                'id' => 5,
                'name' => 'Segundo Grado',
                'description' => 'Competencias Segundo Grado',
                'cnb_level_id' => 2
            ],
            [
                'id' => 6,
                'name' => 'Tercer Grado',
                'description' => 'Competencias Tercer Grado',
                'cnb_level_id' => 2
            ],
            [
                'id' => 7,
                'name' => 'Cuarto Grado',
                'description' => 'Competencias Cuarto Grado',
                'cnb_level_id' => 2
            ],
            [
                'id' => 8,
                'name' => 'Quinto Grado',
                'description' => 'Competencias Quinto Grado',
                'cnb_level_id' => 2
            ],
            [
                'id' => 9,
                'name' => 'Sexto Grado',
                'description' => 'Competencias Sexto Grado',
                'cnb_level_id' => 2
            ]
        ]);


        /** -------- COURSES ------------ */
        Course::factory()->createMany([
            [
                'id' => 1,
                'name' => 'Destrezas de Aprendizaje',
                'description' => 'Destrezas de Aprendizaje - Preprimaria',
                'cnb_level_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Comunicación y Lenguaje',
                'description' => 'Comunicación y Lenguaje - Preprimaria',
                'cnb_level_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Medio Social y Natural',
                'description' => 'Medio Social y Natural - Preprimaria',
                'cnb_level_id' => 1
            ],
            [
                'id' => 4,
                'name' => 'Expresión Artística',
                'description' => 'Expresión Artística - Preprimaria',
                'cnb_level_id' => 1
            ],
            [
                'id' => 5,
                'name' => 'Educación Física',
                'description' => 'Educación Física - Preprimaria',
                'cnb_level_id' => 1
            ],
            //primaria
            [
                'id' => 6,
                'name' => 'Comunicación y Lenguaje L1',
                'description' => 'Área de Comunicación y Lenguaje L1 - Nivel Primario',
                'cnb_level_id' => 2
            ],
            [
                'id' => 7,
                'name' => 'Comunicación y Lenguaje L2',
                'description' => 'Área de Comunicación y Lenguaje L2 - Nivel Primario',
                'cnb_level_id' => 2
            ],
            [
                'id' => 8,
                'name' => 'Comunicación y Lenguaje L3',
                'description' => 'Área de Comunicación y Lenguaje L3 - Nivel Primario',
                'cnb_level_id' => 2
            ],
            [
                'id' => 9,
                'name' => 'Matemáticas',
                'description' => 'Área Matemáticas - Preprimaria',
                'cnb_level_id' => 2
            ],
            [
                'id' => 10,
                'name' => 'Medio Social y Natural ',
                'description' => 'Área Medio Social y Natural  - Preprimaria',
                'cnb_level_id' => 2
            ],
            [
                'id' => 11,
                'name' => 'Ciencias Naturales y Tecnología ',
                'description' => 'Área Ciencias Naturales y Tecnología  - Preprimaria',
                'cnb_level_id' => 2
            ],
            [
                'id' => 12,
                'name' => 'Ciencias Sociales ',
                'description' => 'Área Ciencias Sociales  - Preprimaria',
                'cnb_level_id' => 2
            ],
            [
                'id' => 13,
                'name' => 'Expresión Artística ',
                'description' => 'Área Expresión Artística  - Preprimaria',
                'cnb_level_id' => 2
            ],
            [
                'id' => 14,
                'name' => 'Educación Física ',
                'description' => 'Área Educación Física  - Preprimaria',
                'cnb_level_id' => 2
            ],
            [
                'id' => 15,
                'name' => 'Formación Ciudadana ',
                'description' => 'Área Formación Ciudadana  - Preprimaria',
                'cnb_level_id' => 2
            ],
            [
                'id' => 16,
                'name' => 'Productividad y Desarrollo ',
                'description' => 'Área Productividad y Desarrollo  - Preprimaria',
                'cnb_level_id' => 2
            ]
        ]);


        /*** ---------- GRADE_COURSE ----------- ***/
        GradeCourse::factory()->createMany([
            // ------- Cuatro años
            [
                'grade_id' => 1,
                'course_id' => 1
            ],
            [
                'grade_id' => 1,
                'course_id' => 2
            ],
            [
                'grade_id' => 1,
                'course_id' => 3
            ],
            [
                'grade_id' => 1,
                'course_id' => 4
            ],

            // -------- Cinco años
            [
                'grade_id' => 2,
                'course_id' => 5
            ],
            [
                'grade_id' => 2,
                'course_id' => 1
            ],
            [
                'grade_id' => 2,
                'course_id' => 2
            ],
            [
                'grade_id' => 2,
                'course_id' => 3
            ],
            [
                'grade_id' => 2,
                'course_id' => 4
            ],
            [
                'grade_id' => 2,
                'course_id' => 5
            ],

            // ------- Seis años-
            [
                'grade_id' => 3,
                'course_id' => 1
            ],
            [
                'grade_id' => 3,
                'course_id' => 2
            ],
            [
                'grade_id' => 3,
                'course_id' => 3
            ],
            [
                'grade_id' => 3,
                'course_id' => 4
            ],
            [
                'grade_id' => 3,
                'course_id' => 5
            ],


            // - Primaria

            //  ----- primer grado
            [
                'grade_id' => 4,
                'course_id' => 6
            ],
            [
                'grade_id' => 4,
                'course_id' => 7
            ],
            [
                'grade_id' => 4,
                'course_id' => 8
            ],
            [
                'grade_id' => 4,
                'course_id' => 9
            ],
            [
                'grade_id' => 4,
                'course_id' => 10
            ],
            [
                'grade_id' => 4,
                'course_id' => 13
            ],
            [
                'grade_id' => 4,
                'course_id' => 14
            ],
            [
                'grade_id' => 4,
                'course_id' => 15
            ],

            // ------- segundo grado
            [
                'grade_id' => 5,
                'course_id' => 6
            ],
            [
                'grade_id' => 5,
                'course_id' => 7
            ],
            [
                'grade_id' => 5,
                'course_id' => 8
            ],
            [
                'grade_id' => 5,
                'course_id' => 9
            ],
            [
                'grade_id' => 5,
                'course_id' => 10
            ],
            [
                'grade_id' => 5,
                'course_id' => 14
            ],
            [
                'grade_id' => 5,
                'course_id' => 14
            ],
            [
                'grade_id' => 5,
                'course_id' => 15
            ],

            // ------- tercer grado
            [
                'grade_id' => 6,
                'course_id' => 6
            ],
            [
                'grade_id' => 6,
                'course_id' => 7
            ],
            [
                'grade_id' => 6,
                'course_id' => 8
            ],
            [
                'grade_id' => 6,
                'course_id' => 9
            ],
            [
                'grade_id' => 6,
                'course_id' => 10
            ],
            [
                'grade_id' => 6,
                'course_id' => 13
            ],
            [
                'grade_id' => 6,
                'course_id' => 14
            ],
            [
                'grade_id' => 6,
                'course_id' => 15
            ],

            // ------- cuarto grado
            [
                'grade_id' => 7,
                'course_id' => 6
            ],
            [
                'grade_id' => 7,
                'course_id' => 7
            ],
            [
                'grade_id' => 7,
                'course_id' => 8
            ],
            [
                'grade_id' => 7,
                'course_id' => 9
            ],
            [
                'grade_id' => 7,
                'course_id' => 11
            ],
            [
                'grade_id' => 7,
                'course_id' => 12
            ],
            [
                'grade_id' => 7,
                'course_id' => 13
            ],
            [
                'grade_id' => 7,
                'course_id' => 14
            ],
            [
                'grade_id' => 7,
                'course_id' => 15
            ],
            [
                'grade_id' => 7,
                'course_id' => 16
            ],

            // --------- quinto grado
            [
                'grade_id' => 8,
                'course_id' => 6
            ],
            [
                'grade_id' => 8,
                'course_id' => 7
            ],
            [
                'grade_id' => 8,
                'course_id' => 8
            ],
            [
                'grade_id' => 8,
                'course_id' => 9
            ],
            [
                'grade_id' => 8,
                'course_id' => 11
            ],
            [
                'grade_id' => 8,
                'course_id' => 12
            ],
            [
                'grade_id' => 8,
                'course_id' => 13
            ],
            [
                'grade_id' => 8,
                'course_id' => 14
            ],
            [
                'grade_id' => 8,
                'course_id' => 15
            ],
            [
                'grade_id' => 8,
                'course_id' => 16
            ],

            // --------- Sexto grado
            [
                'grade_id' => 9,
                'course_id' => 6
            ],
            [
                'grade_id' => 9,
                'course_id' => 7
            ],
            [
                'grade_id' => 9,
                'course_id' => 8
            ],
            [
                'grade_id' => 9,
                'course_id' => 9
            ],
            [
                'grade_id' => 9,
                'course_id' => 11
            ],
            [
                'grade_id' => 9,
                'course_id' => 12
            ],
            [
                'grade_id' => 9,
                'course_id' => 13
            ],
            [
                'grade_id' => 9,
                'course_id' => 14
            ],
            [
                'grade_id' => 9,
                'course_id' => 15
            ],
            [
                'grade_id' => 9,
                'course_id' => 16
            ]
        ]);


    }

}
