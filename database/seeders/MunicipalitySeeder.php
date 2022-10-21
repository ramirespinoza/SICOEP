<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipality::factory()->createMany(array (
            0 =>
                array (
                    'departament_id' => 1,
                    'id' => 1,
                    'name' => 'Chahal',
                ),
            1 =>
                array (
                    'departament_id' => 1,
                    'id' => 2,
                    'name' => 'Chisec',
                ),
            2 =>
                array (
                    'departament_id' => 1,
                    'id' => 3,
                    'name' => 'Cobán',
                ),
            3 =>
                array (
                    'departament_id' => 1,
                    'id' => 4,
                    'name' => 'Fray Bartolomé de las Casas',
                ),
            4 =>
                array (
                    'departament_id' => 1,
                    'id' => 5,
                    'name' => 'La Tinta',
                ),
            5 =>
                array (
                    'departament_id' => 1,
                    'id' => 6,
                    'name' => 'Lanquín',
                ),
            6 =>
                array (
                    'departament_id' => 1,
                    'id' => 7,
                    'name' => 'Panzós',
                ),
            7 =>
                array (
                    'departament_id' => 1,
                    'id' => 8,
                    'name' => 'Raxruhá',
                ),
            8 =>
                array (
                    'departament_id' => 1,
                    'id' => 9,
                    'name' => 'San Cristóbal Verapaz',
                ),
            9 =>
                array (
                    'departament_id' => 1,
                    'id' => 10,
                    'name' => 'San Juan Chamelco',
                ),
            10 =>
                array (
                    'departament_id' => 1,
                    'id' => 11,
                    'name' => 'San Pedro Carchá',
                ),
            11 =>
                array (
                    'departament_id' => 1,
                    'id' => 12,
                    'name' => 'Santa Cruz Verapaz',
                ),
            12 =>
                array (
                    'departament_id' => 1,
                    'id' => 13,
                    'name' => 'Santa María Cahabón',
                ),
            13 =>
                array (
                    'departament_id' => 1,
                    'id' => 14,
                    'name' => 'Senahú',
                ),
            14 =>
                array (
                    'departament_id' => 1,
                    'id' => 15,
                    'name' => 'Tamahú',
                ),
            15 =>
                array (
                    'departament_id' => 1,
                    'id' => 16,
                    'name' => 'Tactic',
                ),
            16 =>
                array (
                    'departament_id' => 1,
                    'id' => 17,
                    'name' => 'Tucurú',
                ),
            17 =>
                array (
                    'departament_id' => 2,
                    'id' => 18,
                    'name' => 'Cubulco',
                ),
            18 =>
                array (
                    'departament_id' => 2,
                    'id' => 19,
                    'name' => 'Granados',
                ),
            19 =>
                array (
                    'departament_id' => 2,
                    'id' => 20,
                    'name' => 'Purulhá',
                ),
            20 =>
                array (
                    'departament_id' => 2,
                    'id' => 21,
                    'name' => 'Rabinal',
                ),
            21 =>
                array (
                    'departament_id' => 2,
                    'id' => 22,
                    'name' => 'Salamá',
                ),
            22 =>
                array (
                    'departament_id' => 2,
                    'id' => 23,
                    'name' => 'San Jerónimo',
                ),
            23 =>
                array (
                    'departament_id' => 2,
                    'id' => 24,
                    'name' => 'San Miguel Chicaj',
                ),
            24 =>
                array (
                    'departament_id' => 2,
                    'id' => 25,
                    'name' => 'Santa Cruz el Chol',
                ),
            25 =>
                array (
                    'departament_id' => 3,
                    'id' => 26,
                    'name' => 'Acatenango',
                ),
            26 =>
                array (
                    'departament_id' => 3,
                    'id' => 27,
                    'name' => 'Chimaltenango',
                ),
            27 =>
                array (
                    'departament_id' => 3,
                    'id' => 28,
                    'name' => 'El Tejar',
                ),
            28 =>
                array (
                    'departament_id' => 3,
                    'id' => 29,
                    'name' => 'Parramos',
                ),
            29 =>
                array (
                    'departament_id' => 3,
                    'id' => 30,
                    'name' => 'Patzicía',
                ),
            30 =>
                array (
                    'departament_id' => 3,
                    'id' => 31,
                    'name' => 'Patzún',
                ),
            31 =>
                array (
                    'departament_id' => 3,
                    'id' => 32,
                    'name' => 'Pochuta',
                ),
            32 =>
                array (
                    'departament_id' => 3,
                    'id' => 33,
                    'name' => 'San Andrés Itzapa',
                ),
            33 =>
                array (
                    'departament_id' => 3,
                    'id' => 34,
                    'name' => 'San José Poaquíl',
                ),
            34 =>
                array (
                    'departament_id' => 3,
                    'id' => 35,
                    'name' => 'San Juan Comalapa',
                ),
            35 =>
                array (
                    'departament_id' => 3,
                    'id' => 36,
                    'name' => 'San Martín Jilotepeque',
                ),
            36 =>
                array (
                    'departament_id' => 3,
                    'id' => 37,
                    'name' => 'Santa Apolonia',
                ),
            37 =>
                array (
                    'departament_id' => 3,
                    'id' => 38,
                    'name' => 'Santa Cruz Balanyá',
                ),
            38 =>
                array (
                    'departament_id' => 3,
                    'id' => 39,
                    'name' => 'Tecpán',
                ),
            39 =>
                array (
                    'departament_id' => 3,
                    'id' => 40,
                    'name' => 'Yepocapa',
                ),
            40 =>
                array (
                    'departament_id' => 3,
                    'id' => 41,
                    'name' => 'Zaragoza',
                ),
            41 =>
                array (
                    'departament_id' => 4,
                    'id' => 42,
                    'name' => 'Camotán',
                ),
            42 =>
                array (
                    'departament_id' => 4,
                    'id' => 43,
                    'name' => 'Chiquimula',
                ),
            43 =>
                array (
                    'departament_id' => 4,
                    'id' => 44,
                    'name' => 'Concepción Las Minas',
                ),
            44 =>
                array (
                    'departament_id' => 4,
                    'id' => 45,
                    'name' => 'Esquipulas',
                ),
            45 =>
                array (
                    'departament_id' => 4,
                    'id' => 46,
                    'name' => 'Ipala',
                ),
            46 =>
                array (
                    'departament_id' => 4,
                    'id' => 47,
                    'name' => 'Jocotán',
                ),
            47 =>
                array (
                    'departament_id' => 4,
                    'id' => 48,
                    'name' => 'Olopa',
                ),
            48 =>
                array (
                    'departament_id' => 4,
                    'id' => 49,
                    'name' => 'Quezaltepeque',
                ),
            49 =>
                array (
                    'departament_id' => 4,
                    'id' => 50,
                    'name' => 'San Jacinto',
                ),
            50 =>
                array (
                    'departament_id' => 4,
                    'id' => 51,
                    'name' => 'San José la Arada',
                ),
            51 =>
                array (
                    'departament_id' => 4,
                    'id' => 52,
                    'name' => 'San Juan Ermita',
                ),
            52 =>
                array (
                    'departament_id' => 5,
                    'id' => 53,
                    'name' => 'El Jícaro',
                ),
            53 =>
                array (
                    'departament_id' => 5,
                    'id' => 54,
                    'name' => 'Guastatoya',
                ),
            54 =>
                array (
                    'departament_id' => 5,
                    'id' => 55,
                    'name' => 'Morazán',
                ),
            55 =>
                array (
                    'departament_id' => 5,
                    'id' => 56,
                    'name' => 'San Agustín Acasaguastlán',
                ),
            56 =>
                array (
                    'departament_id' => 5,
                    'id' => 57,
                    'name' => 'San Antonio La Paz',
                ),
            57 =>
                array (
                    'departament_id' => 5,
                    'id' => 58,
                    'name' => 'San Cristóbal Acasaguastlán',
                ),
            58 =>
                array (
                    'departament_id' => 5,
                    'id' => 59,
                    'name' => 'Sanarate',
                ),
            59 =>
                array (
                    'departament_id' => 5,
                    'id' => 60,
                    'name' => 'Sansare',
                ),
            60 =>
                array (
                    'departament_id' => 6,
                    'id' => 61,
                    'name' => 'Escuintla',
                ),
            61 =>
                array (
                    'departament_id' => 6,
                    'id' => 62,
                    'name' => 'Guanagazapa',
                ),
            62 =>
                array (
                    'departament_id' => 6,
                    'id' => 63,
                    'name' => 'Iztapa',
                ),
            63 =>
                array (
                    'departament_id' => 6,
                    'id' => 64,
                    'name' => 'La Democracia',
                ),
            64 =>
                array (
                    'departament_id' => 6,
                    'id' => 65,
                    'name' => 'La Gomera',
                ),
            65 =>
                array (
                    'departament_id' => 6,
                    'id' => 66,
                    'name' => 'Masagua',
                ),
            66 =>
                array (
                    'departament_id' => 6,
                    'id' => 67,
                    'name' => 'Nueva Concepción',
                ),
            67 =>
                array (
                    'departament_id' => 6,
                    'id' => 68,
                    'name' => 'Palín',
                ),
            68 =>
                array (
                    'departament_id' => 6,
                    'id' => 69,
                    'name' => 'San José',
                ),
            69 =>
                array (
                    'departament_id' => 6,
                    'id' => 70,
                    'name' => 'San Vicente Pacaya',
                ),
            70 =>
                array (
                    'departament_id' => 6,
                    'id' => 71,
                    'name' => 'Santa Lucía Cotzumalguapa',
                ),
            71 =>
                array (
                    'departament_id' => 6,
                    'id' => 72,
                    'name' => 'Siquinalá',
                ),
            72 =>
                array (
                    'departament_id' => 6,
                    'id' => 73,
                    'name' => 'Tiquisate',
                ),
            73 =>
                array (
                    'departament_id' => 7,
                    'id' => 74,
                    'name' => 'Amatitlán',
                ),
            74 =>
                array (
                    'departament_id' => 7,
                    'id' => 75,
                    'name' => 'Chinautla',
                ),
            75 =>
                array (
                    'departament_id' => 7,
                    'id' => 76,
                    'name' => 'Chuarrancho',
                ),
            76 =>
                array (
                    'departament_id' => 7,
                    'id' => 77,
                    'name' => 'Guatemala',
                ),
            77 =>
                array (
                    'departament_id' => 7,
                    'id' => 78,
                    'name' => 'Fraijanes',
                ),
            78 =>
                array (
                    'departament_id' => 7,
                    'id' => 79,
                    'name' => 'Mixco',
                ),
            79 =>
                array (
                    'departament_id' => 7,
                    'id' => 80,
                    'name' => 'Palencia',
                ),
            80 =>
                array (
                    'departament_id' => 7,
                    'id' => 81,
                    'name' => 'San José del Golfo',
                ),
            81 =>
                array (
                    'departament_id' => 7,
                    'id' => 82,
                    'name' => 'San José Pinula',
                ),
            82 =>
                array (
                    'departament_id' => 7,
                    'id' => 83,
                    'name' => 'San Juan Sacatepéquez',
                ),
            83 =>
                array (
                    'departament_id' => 7,
                    'id' => 84,
                    'name' => 'San Miguel Petapa',
                ),
            84 =>
                array (
                    'departament_id' => 7,
                    'id' => 85,
                    'name' => 'San Pedro Ayampuc',
                ),
            85 =>
                array (
                    'departament_id' => 7,
                    'id' => 86,
                    'name' => 'San Pedro Sacatepéquez',
                ),
            86 =>
                array (
                    'departament_id' => 7,
                    'id' => 87,
                    'name' => 'San Raymundo',
                ),
            87 =>
                array (
                    'departament_id' => 7,
                    'id' => 88,
                    'name' => 'Santa Catarina Pinula',
                ),
            88 =>
                array (
                    'departament_id' => 7,
                    'id' => 89,
                    'name' => 'Villa Canales',
                ),
            89 =>
                array (
                    'departament_id' => 7,
                    'id' => 90,
                    'name' => 'Villa Nueva',
                ),
            90 =>
                array (
                    'departament_id' => 8,
                    'id' => 91,
                    'name' => 'Aguacatán',
                ),
            91 =>
                array (
                    'departament_id' => 8,
                    'id' => 92,
                    'name' => 'Chiantla',
                ),
            92 =>
                array (
                    'departament_id' => 8,
                    'id' => 93,
                    'name' => 'Colotenango',
                ),
            93 =>
                array (
                    'departament_id' => 8,
                    'id' => 94,
                    'name' => 'Concepción Huista',
                ),
            94 =>
                array (
                    'departament_id' => 8,
                    'id' => 95,
                    'name' => 'Cuilco',
                ),
            95 =>
                array (
                    'departament_id' => 8,
                    'id' => 96,
                    'name' => 'Huehuetenango',
                ),
            96 =>
                array (
                    'departament_id' => 8,
                    'id' => 97,
                    'name' => 'Jacaltenango',
                ),
            97 =>
                array (
                    'departament_id' => 8,
                    'id' => 98,
                    'name' => 'La Democracia',
                ),
            98 =>
                array (
                    'departament_id' => 8,
                    'id' => 99,
                    'name' => 'La Libertad',
                ),
            99 =>
                array (
                    'departament_id' => 8,
                    'id' => 100,
                    'name' => 'Malacatancito',
                ),
            100 =>
                array (
                    'departament_id' => 8,
                    'id' => 101,
                    'name' => 'Nentón',
                ),
            101 =>
                array (
                    'departament_id' => 8,
                    'id' => 102,
                    'name' => 'San Antonio Huista',
                ),
            102 =>
                array (
                    'departament_id' => 8,
                    'id' => 103,
                    'name' => 'San Gaspar Ixchil',
                ),
            103 =>
                array (
                    'departament_id' => 8,
                    'id' => 104,
                    'name' => 'San Ildefonso Ixtahuacán',
                ),
            104 =>
                array (
                    'departament_id' => 8,
                    'id' => 105,
                    'name' => 'San Juan Atitán',
                ),
            105 =>
                array (
                    'departament_id' => 8,
                    'id' => 106,
                    'name' => 'San Juan Ixcoy',
                ),
            106 =>
                array (
                    'departament_id' => 8,
                    'id' => 107,
                    'name' => 'San Mateo Ixtatán',
                ),
            107 =>
                array (
                    'departament_id' => 8,
                    'id' => 108,
                    'name' => 'San Miguel Acatán',
                ),
            108 =>
                array (
                    'departament_id' => 8,
                    'id' => 109,
                    'name' => 'San Pedro Nécta',
                ),
            109 =>
                array (
                    'departament_id' => 8,
                    'id' => 110,
                    'name' => 'San Pedro Soloma',
                ),
            110 =>
                array (
                    'departament_id' => 8,
                    'id' => 111,
                    'name' => 'San Rafael La Independencia',
                ),
            111 =>
                array (
                    'departament_id' => 8,
                    'id' => 112,
                    'name' => 'San Rafael Pétzal',
                ),
            112 =>
                array (
                    'departament_id' => 8,
                    'id' => 113,
                    'name' => 'San Sebastián Coatán',
                ),
            113 =>
                array (
                    'departament_id' => 8,
                    'id' => 114,
                    'name' => 'San Sebastián Huehuetenango',
                ),
            114 =>
                array (
                    'departament_id' => 8,
                    'id' => 115,
                    'name' => 'Santa Ana Huista',
                ),
            115 =>
                array (
                    'departament_id' => 8,
                    'id' => 116,
                    'name' => 'Santa Bárbara',
                ),
            116 =>
                array (
                    'departament_id' => 8,
                    'id' => 117,
                    'name' => 'Santa Cruz Barillas',
                ),
            117 =>
                array (
                    'departament_id' => 8,
                    'id' => 118,
                    'name' => 'Santa Eulalia',
                ),
            118 =>
                array (
                    'departament_id' => 8,
                    'id' => 119,
                    'name' => 'Santiago Chimaltenango',
                ),
            119 =>
                array (
                    'departament_id' => 8,
                    'id' => 120,
                    'name' => 'Tectitán',
                ),
            120 =>
                array (
                    'departament_id' => 8,
                    'id' => 121,
                    'name' => 'Todos Santos Cuchumatán',
                ),
            121 =>
                array (
                    'departament_id' => 8,
                    'id' => 122,
                    'name' => 'Unión Cantinil',
                ),
            122 =>
                array (
                    'departament_id' => 9,
                    'id' => 123,
                    'name' => 'El Estor',
                ),
            123 =>
                array (
                    'departament_id' => 9,
                    'id' => 124,
                    'name' => 'Livingston',
                ),
            124 =>
                array (
                    'departament_id' => 9,
                    'id' => 125,
                    'name' => 'Los Amates',
                ),
            125 =>
                array (
                    'departament_id' => 9,
                    'id' => 126,
                    'name' => 'Morales',
                ),
            126 =>
                array (
                    'departament_id' => 9,
                    'id' => 127,
                    'name' => 'Puerto Barrios',
                ),
            127 =>
                array (
                    'departament_id' => 10,
                    'id' => 128,
                    'name' => 'Jalapa',
                ),
            128 =>
                array (
                    'departament_id' => 10,
                    'id' => 129,
                    'name' => 'Mataquescuintla',
                ),
            129 =>
                array (
                    'departament_id' => 10,
                    'id' => 130,
                    'name' => 'Monjas',
                ),
            130 =>
                array (
                    'departament_id' => 10,
                    'id' => 131,
                    'name' => 'San Carlos Alzatate',
                ),
            131 =>
                array (
                    'departament_id' => 10,
                    'id' => 132,
                    'name' => 'San Luis Jilotepeque',
                ),
            132 =>
                array (
                    'departament_id' => 10,
                    'id' => 133,
                    'name' => 'San Manuel Chaparrón',
                ),
            133 =>
                array (
                    'departament_id' => 10,
                    'id' => 134,
                    'name' => 'San Pedro Pinula',
                ),
            134 =>
                array (
                    'departament_id' => 11,
                    'id' => 135,
                    'name' => 'Agua Blanca',
                ),
            135 =>
                array (
                    'departament_id' => 11,
                    'id' => 136,
                    'name' => 'Asunción Mita',
                ),
            136 =>
                array (
                    'departament_id' => 11,
                    'id' => 137,
                    'name' => 'Atescatempa',
                ),
            137 =>
                array (
                    'departament_id' => 11,
                    'id' => 138,
                    'name' => 'Comapa',
                ),
            138 =>
                array (
                    'departament_id' => 11,
                    'id' => 139,
                    'name' => 'Conguaco',
                ),
            139 =>
                array (
                    'departament_id' => 11,
                    'id' => 140,
                    'name' => 'El Adelanto',
                ),
            140 =>
                array (
                    'departament_id' => 11,
                    'id' => 141,
                    'name' => 'El Progreso',
                ),
            141 =>
                array (
                    'departament_id' => 11,
                    'id' => 142,
                    'name' => 'Jalpatagua',
                ),
            142 =>
                array (
                    'departament_id' => 11,
                    'id' => 143,
                    'name' => 'Jerez',
                ),
            143 =>
                array (
                    'departament_id' => 11,
                    'id' => 144,
                    'name' => 'Jutiapa',
                ),
            144 =>
                array (
                    'departament_id' => 11,
                    'id' => 145,
                    'name' => 'Moyuta',
                ),
            145 =>
                array (
                    'departament_id' => 11,
                    'id' => 146,
                    'name' => 'Pasaco',
                ),
            146 =>
                array (
                    'departament_id' => 11,
                    'id' => 147,
                    'name' => 'Quesada',
                ),
            147 =>
                array (
                    'departament_id' => 11,
                    'id' => 148,
                    'name' => 'San José Acatempa',
                ),
            148 =>
                array (
                    'departament_id' => 11,
                    'id' => 149,
                    'name' => 'Santa Catarina Mita',
                ),
            149 =>
                array (
                    'departament_id' => 11,
                    'id' => 150,
                    'name' => 'Yupiltepeque',
                ),
            150 =>
                array (
                    'departament_id' => 11,
                    'id' => 151,
                    'name' => 'Zapotitlán',
                ),
            151 =>
                array (
                    'departament_id' => 12,
                    'id' => 152,
                    'name' => 'Dolores',
                ),
            152 =>
                array (
                    'departament_id' => 12,
                    'id' => 153,
                    'name' => 'El Chal',
                ),
            153 =>
                array (
                    'departament_id' => 12,
                    'id' => 154,
                    'name' => 'Ciudad Flores',
                ),
            154 =>
                array (
                    'departament_id' => 12,
                    'id' => 155,
                    'name' => 'La Libertad',
                ),
            155 =>
                array (
                    'departament_id' => 12,
                    'id' => 156,
                    'name' => 'Las Cruces',
                ),
            156 =>
                array (
                    'departament_id' => 12,
                    'id' => 157,
                    'name' => 'Melchor de Mencos',
                ),
            157 =>
                array (
                    'departament_id' => 12,
                    'id' => 158,
                    'name' => 'Poptún',
                ),
            158 =>
                array (
                    'departament_id' => 12,
                    'id' => 159,
                    'name' => 'San Andrés',
                ),
            159 =>
                array (
                    'departament_id' => 12,
                    'id' => 160,
                    'name' => 'San Benito',
                ),
            160 =>
                array (
                    'departament_id' => 12,
                    'id' => 161,
                    'name' => 'San Francisco',
                ),
            161 =>
                array (
                    'departament_id' => 12,
                    'id' => 162,
                    'name' => 'San José',
                ),
            162 =>
                array (
                    'departament_id' => 12,
                    'id' => 163,
                    'name' => 'San Luis',
                ),
            163 =>
                array (
                    'departament_id' => 12,
                    'id' => 164,
                    'name' => 'Santa Ana',
                ),
            164 =>
                array (
                    'departament_id' => 12,
                    'id' => 165,
                    'name' => 'Sayaxché',
                ),
            165 =>
                array (
                    'departament_id' => 13,
                    'id' => 166,
                    'name' => 'Almolonga',
                ),
            166 =>
                array (
                    'departament_id' => 13,
                    'id' => 167,
                    'name' => 'Cabricán',
                ),
            167 =>
                array (
                    'departament_id' => 13,
                    'id' => 168,
                    'name' => 'Cajolá',
                ),
            168 =>
                array (
                    'departament_id' => 13,
                    'id' => 169,
                    'name' => 'Cantel',
                ),
            169 =>
                array (
                    'departament_id' => 13,
                    'id' => 170,
                    'name' => 'Coatepeque',
                ),
            170 =>
                array (
                    'departament_id' => 13,
                    'id' => 171,
                    'name' => 'Colomba Costa Cuca',
                ),
            171 =>
                array (
                    'departament_id' => 13,
                    'id' => 172,
                    'name' => 'Concepción Chiquirichapa',
                ),
            172 =>
                array (
                    'departament_id' => 13,
                    'id' => 173,
                    'name' => 'El Palmar',
                ),
            173 =>
                array (
                    'departament_id' => 13,
                    'id' => 174,
                    'name' => 'Flores Costa Cuca',
                ),
            174 =>
                array (
                    'departament_id' => 13,
                    'id' => 175,
                    'name' => 'Génova',
                ),
            175 =>
                array (
                    'departament_id' => 13,
                    'id' => 176,
                    'name' => 'Huitán',
                ),
            176 =>
                array (
                    'departament_id' => 13,
                    'id' => 177,
                    'name' => 'La Esperanza',
                ),
            177 =>
                array (
                    'departament_id' => 13,
                    'id' => 178,
                    'name' => 'Olintepeque',
                ),
            178 =>
                array (
                    'departament_id' => 13,
                    'id' => 179,
                    'name' => 'Palestina de Los Altos',
                ),
            179 =>
                array (
                    'departament_id' => 13,
                    'id' => 180,
                    'name' => 'Quetzaltenango',
                ),
            180 =>
                array (
                    'departament_id' => 13,
                    'id' => 181,
                    'name' => 'Salcajá',
                ),
            181 =>
                array (
                    'departament_id' => 13,
                    'id' => 182,
                    'name' => 'San Carlos Sija',
                ),
            182 =>
                array (
                    'departament_id' => 13,
                    'id' => 183,
                    'name' => 'San Francisco La Unión',
                ),
            183 =>
                array (
                    'departament_id' => 13,
                    'id' => 184,
                    'name' => 'San Juan Ostuncalco',
                ),
            184 =>
                array (
                    'departament_id' => 13,
                    'id' => 185,
                    'name' => 'San Martín Sacatepéquez',
                ),
            185 =>
                array (
                    'departament_id' => 13,
                    'id' => 186,
                    'name' => 'San Mateo',
                ),
            186 =>
                array (
                    'departament_id' => 13,
                    'id' => 187,
                    'name' => 'San Miguel Sigüilá',
                ),
            187 =>
                array (
                    'departament_id' => 13,
                    'id' => 188,
                    'name' => 'Sibilia',
                ),
            188 =>
                array (
                    'departament_id' => 13,
                    'id' => 189,
                    'name' => 'Zunil',
                ),
            189 =>
                array (
                    'departament_id' => 14,
                    'id' => 190,
                    'name' => 'Canillá',
                ),
            190 =>
                array (
                    'departament_id' => 14,
                    'id' => 191,
                    'name' => 'Chajul',
                ),
            191 =>
                array (
                    'departament_id' => 14,
                    'id' => 192,
                    'name' => 'Chicamán',
                ),
            192 =>
                array (
                    'departament_id' => 14,
                    'id' => 193,
                    'name' => 'Chiché',
                ),
            193 =>
                array (
                    'departament_id' => 14,
                    'id' => 194,
                    'name' => 'Chichicastenango',
                ),
            194 =>
                array (
                    'departament_id' => 14,
                    'id' => 195,
                    'name' => 'Chinique',
                ),
            195 =>
                array (
                    'departament_id' => 14,
                    'id' => 196,
                    'name' => 'Cunén',
                ),
            196 =>
                array (
                    'departament_id' => 14,
                    'id' => 197,
                    'name' => 'Ixcán Playa Grande',
                ),
            197 =>
                array (
                    'departament_id' => 14,
                    'id' => 198,
                    'name' => 'Joyabaj',
                ),
            198 =>
                array (
                    'departament_id' => 14,
                    'id' => 199,
                    'name' => 'Nebaj',
                ),
            199 =>
                array (
                    'departament_id' => 14,
                    'id' => 200,
                    'name' => 'Pachalum',
                ),
            200 =>
                array (
                    'departament_id' => 14,
                    'id' => 201,
                    'name' => 'Patzité',
                ),
            201 =>
                array (
                    'departament_id' => 14,
                    'id' => 202,
                    'name' => 'Sacapulas',
                ),
            202 =>
                array (
                    'departament_id' => 14,
                    'id' => 203,
                    'name' => 'San Andrés Sajcabajá',
                ),
            203 =>
                array (
                    'departament_id' => 14,
                    'id' => 204,
                    'name' => 'San Antonio Ilotenango',
                ),
            204 =>
                array (
                    'departament_id' => 14,
                    'id' => 205,
                    'name' => 'San Bartolomé Jocotenango',
                ),
            205 =>
                array (
                    'departament_id' => 14,
                    'id' => 206,
                    'name' => 'San Juan Cotzal',
                ),
            206 =>
                array (
                    'departament_id' => 14,
                    'id' => 207,
                    'name' => 'San Pedro Jocopilas',
                ),
            207 =>
                array (
                    'departament_id' => 14,
                    'id' => 208,
                    'name' => 'Santa Cruz del Quiché',
                ),
            208 =>
                array (
                    'departament_id' => 14,
                    'id' => 209,
                    'name' => 'Uspantán',
                ),
            209 =>
                array (
                    'departament_id' => 14,
                    'id' => 210,
                    'name' => 'Zacualpa',
                ),
            210 =>
                array (
                    'departament_id' => 15,
                    'id' => 211,
                    'name' => 'Champerico',
                ),
            211 =>
                array (
                    'departament_id' => 15,
                    'id' => 212,
                    'name' => 'El Asintal',
                ),
            212 =>
                array (
                    'departament_id' => 15,
                    'id' => 213,
                    'name' => 'Nuevo San Carlos',
                ),
            213 =>
                array (
                    'departament_id' => 15,
                    'id' => 214,
                    'name' => 'Retalhuleu',
                ),
            214 =>
                array (
                    'departament_id' => 15,
                    'id' => 215,
                    'name' => 'San Andrés Villa Seca',
                ),
            215 =>
                array (
                    'departament_id' => 15,
                    'id' => 216,
                    'name' => 'San Felipe Reu',
                ),
            216 =>
                array (
                    'departament_id' => 15,
                    'id' => 217,
                    'name' => 'San Martín Zapotitlán',
                ),
            217 =>
                array (
                    'departament_id' => 15,
                    'id' => 218,
                    'name' => 'San Sebastián',
                ),
            218 =>
                array (
                    'departament_id' => 15,
                    'id' => 219,
                    'name' => 'Santa Cruz Muluá',
                ),
            219 =>
                array (
                    'departament_id' => 16,
                    'id' => 220,
                    'name' => 'Alotenango',
                ),
            220 =>
                array (
                    'departament_id' => 16,
                    'id' => 221,
                    'name' => 'Ciudad Vieja',
                ),
            221 =>
                array (
                    'departament_id' => 16,
                    'id' => 222,
                    'name' => 'Jocotenango',
                ),
            222 =>
                array (
                    'departament_id' => 16,
                    'id' => 223,
                    'name' => 'Antigua Guatemala',
                ),
            223 =>
                array (
                    'departament_id' => 16,
                    'id' => 224,
                    'name' => 'Magdalena Milpas Altas',
                ),
            224 =>
                array (
                    'departament_id' => 16,
                    'id' => 225,
                    'name' => 'Pastores',
                ),
            225 =>
                array (
                    'departament_id' => 16,
                    'id' => 226,
                    'name' => 'San Antonio Aguas Calientes',
                ),
            226 =>
                array (
                    'departament_id' => 16,
                    'id' => 227,
                    'name' => 'San Bartolomé Milpas Altas',
                ),
            227 =>
                array (
                    'departament_id' => 16,
                    'id' => 228,
                    'name' => 'San Lucas Sacatepéquez',
                ),
            228 =>
                array (
                    'departament_id' => 16,
                    'id' => 229,
                    'name' => 'San Miguel Dueñas',
                ),
            229 =>
                array (
                    'departament_id' => 16,
                    'id' => 230,
                    'name' => 'Santa Catarina Barahona',
                ),
            230 =>
                array (
                    'departament_id' => 16,
                    'id' => 231,
                    'name' => 'Santa Lucía Milpas Altas',
                ),
            231 =>
                array (
                    'departament_id' => 16,
                    'id' => 232,
                    'name' => 'Santa María de Jesús',
                ),
            232 =>
                array (
                    'departament_id' => 16,
                    'id' => 233,
                    'name' => 'Santiago Sacatepéquez',
                ),
            233 =>
                array (
                    'departament_id' => 16,
                    'id' => 234,
                    'name' => 'Santo Domingo Xenacoj',
                ),
            234 =>
                array (
                    'departament_id' => 16,
                    'id' => 235,
                    'name' => 'Sumpango',
                ),
            235 =>
                array (
                    'departament_id' => 17,
                    'id' => 236,
                    'name' => 'Ayutla',
                ),
            236 =>
                array (
                    'departament_id' => 17,
                    'id' => 237,
                    'name' => 'Catarina',
                ),
            237 =>
                array (
                    'departament_id' => 17,
                    'id' => 238,
                    'name' => 'Comitancillo',
                ),
            238 =>
                array (
                    'departament_id' => 17,
                    'id' => 239,
                    'name' => 'Concepción Tutuapa',
                ),
            239 =>
                array (
                    'departament_id' => 17,
                    'id' => 240,
                    'name' => 'El Quetzal',
                ),
            240 =>
                array (
                    'departament_id' => 17,
                    'id' => 241,
                    'name' => 'El Tumbador',
                ),
            241 =>
                array (
                    'departament_id' => 17,
                    'id' => 242,
                    'name' => 'Esquipulas Palo Gordo',
                ),
            242 =>
                array (
                    'departament_id' => 17,
                    'id' => 243,
                    'name' => 'Ixchiguán',
                ),
            243 =>
                array (
                    'departament_id' => 17,
                    'id' => 244,
                    'name' => 'La Blanca',
                ),
            244 =>
                array (
                    'departament_id' => 17,
                    'id' => 245,
                    'name' => 'La Reforma',
                ),
            245 =>
                array (
                    'departament_id' => 17,
                    'id' => 246,
                    'name' => 'Malacatán',
                ),
            246 =>
                array (
                    'departament_id' => 17,
                    'id' => 247,
                    'name' => 'Nuevo Progreso',
                ),
            247 =>
                array (
                    'departament_id' => 17,
                    'id' => 248,
                    'name' => 'Ocós',
                ),
            248 =>
                array (
                    'departament_id' => 17,
                    'id' => 249,
                    'name' => 'Pajapita',
                ),
            249 =>
                array (
                    'departament_id' => 17,
                    'id' => 250,
                    'name' => 'Río Blanco',
                ),
            250 =>
                array (
                    'departament_id' => 17,
                    'id' => 251,
                    'name' => 'San Antonio Sacatepéquez',
                ),
            251 =>
                array (
                    'departament_id' => 17,
                    'id' => 252,
                    'name' => 'San Cristóbal Cucho',
                ),
            252 =>
                array (
                    'departament_id' => 17,
                    'id' => 253,
                    'name' => 'San José El Rodeo',
                ),
            253 =>
                array (
                    'departament_id' => 17,
                    'id' => 254,
                    'name' => 'San José Ojetenam',
                ),
            254 =>
                array (
                    'departament_id' => 17,
                    'id' => 255,
                    'name' => 'San Lorenzo',
                ),
            255 =>
                array (
                    'departament_id' => 17,
                    'id' => 256,
                    'name' => 'San Marcos',
                ),
            256 =>
                array (
                    'departament_id' => 17,
                    'id' => 257,
                    'name' => 'San Miguel Ixtahuacán',
                ),
            257 =>
                array (
                    'departament_id' => 17,
                    'id' => 258,
                    'name' => 'San Pablo',
                ),
            258 =>
                array (
                    'departament_id' => 17,
                    'id' => 259,
                    'name' => 'San Pedro Sacatepéquez',
                ),
            259 =>
                array (
                    'departament_id' => 17,
                    'id' => 260,
                    'name' => 'San Rafael Pie de la Cuesta',
                ),
            260 =>
                array (
                    'departament_id' => 17,
                    'id' => 261,
                    'name' => 'Sibinal',
                ),
            261 =>
                array (
                    'departament_id' => 17,
                    'id' => 262,
                    'name' => 'Sipacapa',
                ),
            262 =>
                array (
                    'departament_id' => 17,
                    'id' => 263,
                    'name' => 'Tacaná',
                ),
            263 =>
                array (
                    'departament_id' => 17,
                    'id' => 264,
                    'name' => 'Tajumulco',
                ),
            264 =>
                array (
                    'departament_id' => 17,
                    'id' => 265,
                    'name' => 'Tejutla',
                ),
            265 =>
                array (
                    'departament_id' => 18,
                    'id' => 266,
                    'name' => 'Barberena',
                ),
            266 =>
                array (
                    'departament_id' => 18,
                    'id' => 267,
                    'name' => 'Casillas',
                ),
            267 =>
                array (
                    'departament_id' => 18,
                    'id' => 268,
                    'name' => 'Chiquimulilla',
                ),
            268 =>
                array (
                    'departament_id' => 18,
                    'id' => 269,
                    'name' => 'Cuilapa',
                ),
            269 =>
                array (
                    'departament_id' => 18,
                    'id' => 270,
                    'name' => 'Guazacapán',
                ),
            270 =>
                array (
                    'departament_id' => 18,
                    'id' => 271,
                    'name' => 'Nueva Santa Rosa',
                ),
            271 =>
                array (
                    'departament_id' => 18,
                    'id' => 272,
                    'name' => 'Oratorio',
                ),
            272 =>
                array (
                    'departament_id' => 18,
                    'id' => 273,
                    'name' => 'Pueblo Nuevo Viñas',
                ),
            273 =>
                array (
                    'departament_id' => 18,
                    'id' => 274,
                    'name' => 'San Juan Tecuaco',
                ),
            274 =>
                array (
                    'departament_id' => 18,
                    'id' => 275,
                    'name' => 'San Rafael las Flores',
                ),
            275 =>
                array (
                    'departament_id' => 18,
                    'id' => 276,
                    'name' => 'Santa Cruz Naranjo',
                ),
            276 =>
                array (
                    'departament_id' => 18,
                    'id' => 277,
                    'name' => 'Santa María Ixhuatán',
                ),
            277 =>
                array (
                    'departament_id' => 18,
                    'id' => 278,
                    'name' => 'Santa Rosa de Lima',
                ),
            278 =>
                array (
                    'departament_id' => 18,
                    'id' => 279,
                    'name' => 'Taxisco',
                ),
            279 =>
                array (
                    'departament_id' => 19,
                    'id' => 280,
                    'name' => 'Concepción',
                ),
            280 =>
                array (
                    'departament_id' => 19,
                    'id' => 281,
                    'name' => 'Nahualá',
                ),
            281 =>
                array (
                    'departament_id' => 19,
                    'id' => 282,
                    'name' => 'Panajachel',
                ),
            282 =>
                array (
                    'departament_id' => 19,
                    'id' => 283,
                    'name' => 'San Andrés Semetabaj',
                ),
            283 =>
                array (
                    'departament_id' => 19,
                    'id' => 284,
                    'name' => 'San Antonio Palopó',
                ),
            284 =>
                array (
                    'departament_id' => 19,
                    'id' => 285,
                    'name' => 'San José Chacayá',
                ),
            285 =>
                array (
                    'departament_id' => 19,
                    'id' => 286,
                    'name' => 'San Juan La Laguna',
                ),
            286 =>
                array (
                    'departament_id' => 19,
                    'id' => 287,
                    'name' => 'San Lucas Tolimán',
                ),
            287 =>
                array (
                    'departament_id' => 19,
                    'id' => 288,
                    'name' => 'San Marcos La Laguna',
                ),
            288 =>
                array (
                    'departament_id' => 19,
                    'id' => 289,
                    'name' => 'San Pablo La Laguna',
                ),
            289 =>
                array (
                    'departament_id' => 19,
                    'id' => 290,
                    'name' => 'San Pedro La Laguna',
                ),
            290 =>
                array (
                    'departament_id' => 19,
                    'id' => 291,
                    'name' => 'Santa Catarina Ixtahuacán',
                ),
            291 =>
                array (
                    'departament_id' => 19,
                    'id' => 292,
                    'name' => 'Santa Catarina Palopó',
                ),
            292 =>
                array (
                    'departament_id' => 19,
                    'id' => 293,
                    'name' => 'Santa Clara La Laguna',
                ),
            293 =>
                array (
                    'departament_id' => 19,
                    'id' => 294,
                    'name' => 'Santa Cruz La Laguna',
                ),
            294 =>
                array (
                    'departament_id' => 19,
                    'id' => 295,
                    'name' => 'Santa Lucía Utatlán',
                ),
            295 =>
                array (
                    'departament_id' => 19,
                    'id' => 296,
                    'name' => 'Santa María Visitación',
                ),
            296 =>
                array (
                    'departament_id' => 19,
                    'id' => 297,
                    'name' => 'Santiago Atitlán',
                ),
            297 =>
                array (
                    'departament_id' => 19,
                    'id' => 298,
                    'name' => 'Sololá',
                ),
            298 =>
                array (
                    'departament_id' => 20,
                    'id' => 299,
                    'name' => 'Chicacao',
                ),
            299 =>
                array (
                    'departament_id' => 20,
                    'id' => 300,
                    'name' => 'Cuyotenango',
                ),
            300 =>
                array (
                    'departament_id' => 20,
                    'id' => 301,
                    'name' => 'Mazatenango',
                ),
            301 =>
                array (
                    'departament_id' => 20,
                    'id' => 302,
                    'name' => 'Patulul',
                ),
            302 =>
                array (
                    'departament_id' => 20,
                    'id' => 303,
                    'name' => 'Pueblo Nuevo',
                ),
            303 =>
                array (
                    'departament_id' => 20,
                    'id' => 304,
                    'name' => 'Río Bravo',
                ),
            304 =>
                array (
                    'departament_id' => 20,
                    'id' => 305,
                    'name' => 'Samayac',
                ),
            305 =>
                array (
                    'departament_id' => 20,
                    'id' => 306,
                    'name' => 'San Antonio Suchitepéquez',
                ),
            306 =>
                array (
                    'departament_id' => 20,
                    'id' => 307,
                    'name' => 'San Bernardino',
                ),
            307 =>
                array (
                    'departament_id' => 20,
                    'id' => 308,
                    'name' => 'San Francisco Zapotitlán',
                ),
            308 =>
                array (
                    'departament_id' => 20,
                    'id' => 309,
                    'name' => 'San Gabriel',
                ),
            309 =>
                array (
                    'departament_id' => 20,
                    'id' => 310,
                    'name' => 'San José El Idolo',
                ),
            310 =>
                array (
                    'departament_id' => 20,
                    'id' => 311,
                    'name' => 'San José La Maquina',
                ),
            311 =>
                array (
                    'departament_id' => 20,
                    'id' => 312,
                    'name' => 'San Juan Bautista',
                ),
            312 =>
                array (
                    'departament_id' => 20,
                    'id' => 313,
                    'name' => 'San Lorenzo',
                ),
            313 =>
                array (
                    'departament_id' => 20,
                    'id' => 314,
                    'name' => 'San Miguel Panán',
                ),
            314 =>
                array (
                    'departament_id' => 20,
                    'id' => 315,
                    'name' => 'San Pablo Jocopilas',
                ),
            315 =>
                array (
                    'departament_id' => 20,
                    'id' => 316,
                    'name' => 'Santa Bárbara',
                ),
            316 =>
                array (
                    'departament_id' => 20,
                    'id' => 317,
                    'name' => 'Santo Domingo Suchitepéquez',
                ),
            317 =>
                array (
                    'departament_id' => 20,
                    'id' => 318,
                    'name' => 'Santo Tomás La Unión',
                ),
            318 =>
                array (
                    'departament_id' => 20,
                    'id' => 319,
                    'name' => 'Zunilito',
                ),
            319 =>
                array (
                    'departament_id' => 21,
                    'id' => 320,
                    'name' => 'Momostenango',
                ),
            320 =>
                array (
                    'departament_id' => 21,
                    'id' => 321,
                    'name' => 'San Andrés Xecul',
                ),
            321 =>
                array (
                    'departament_id' => 21,
                    'id' => 322,
                    'name' => 'San Bartolo',
                ),
            322 =>
                array (
                    'departament_id' => 21,
                    'id' => 323,
                    'name' => 'San Cristóbal Totonicapán',
                ),
            323 =>
                array (
                    'departament_id' => 21,
                    'id' => 324,
                    'name' => 'San Francisco El Alto',
                ),
            324 =>
                array (
                    'departament_id' => 21,
                    'id' => 325,
                    'name' => 'Santa Lucía La Reforma',
                ),
            325 =>
                array (
                    'departament_id' => 21,
                    'id' => 326,
                    'name' => 'Santa María Chiquimula',
                ),
            326 =>
                array (
                    'departament_id' => 21,
                    'id' => 327,
                    'name' => 'Totonicapán',
                ),
            327 =>
                array (
                    'departament_id' => 22,
                    'id' => 328,
                    'name' => 'Cabañas',
                ),
            328 =>
                array (
                    'departament_id' => 22,
                    'id' => 329,
                    'name' => 'Estanzuela',
                ),
            329 =>
                array (
                    'departament_id' => 22,
                    'id' => 330,
                    'name' => 'Gualán',
                ),
            330 =>
                array (
                    'departament_id' => 22,
                    'id' => 331,
                    'name' => 'Huité',
                ),
            331 =>
                array (
                    'departament_id' => 22,
                    'id' => 332,
                    'name' => 'La Unión',
                ),
            332 =>
                array (
                    'departament_id' => 22,
                    'id' => 333,
                    'name' => 'Río Hondo',
                ),
            333 =>
                array (
                    'departament_id' => 22,
                    'id' => 334,
                    'name' => 'San Diego',
                ),
            334 =>
                array (
                    'departament_id' => 22,
                    'id' => 335,
                    'name' => 'San Jorge',
                ),
            335 =>
                array (
                    'departament_id' => 22,
                    'id' => 336,
                    'name' => 'Teculután',
                ),
            336 =>
                array (
                    'departament_id' => 22,
                    'id' => 337,
                    'name' => 'Usumatlán',
                ),
            337 =>
                array (
                    'departament_id' => 22,
                    'id' => 338,
                    'name' => 'Zacapa',
                ),
        ));
    }
}
