<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'id_client' => 1,
                'brand' => 'Lada',
                'model' => 'SW Cross',
                'color' => 'Белый',
                'state_number' => 'А777АА',
                'status' => 1,
            ],
            [
                'id_client' => 1,
                'brand' => 'BMW',
                'model' => 'X5',
                'color' => 'Черный',
                'state_number' => 'В789ВВ',
                'status' => 0,
            ],
            [
                'id_client' => 1,
                'brand' => 'Mercedes-Benz',
                'model' => 'E-Class',
                'color' => 'Серый',
                'state_number' => 'О123ХО',
                'status' => 1,
            ],

            [
                'id_client' => 2,
                'brand' => 'Lada',
                'model' => 'Largus',
                'color' => 'Черный',
                'state_number' => 'К152КА',
                'status' => 1,
            ],
            [
                'id_client' => 2,
                'brand' => 'Mercedes-Benz',
                'model' => 'E-Class',
                'color' => 'Белый',
                'state_number' => 'О991АО',
                'status' => 0,
            ],

            [
                'id_client' => 3,
                'brand' => 'BMW',
                'model' => 'X6',
                'color' => 'Синий',
                'state_number' => 'Р734КК',
                'status' => 1,
            ],
            [
                'id_client' => 3,
                'brand' => 'Mercedes-Benz',
                'model' => 'C-Class',
                'color' => 'Красный',
                'state_number' => 'Х321НН',
                'status' => 1,
            ],
            [
                'id_client' => 3,
                'brand' => 'BMW',
                'model' => 'X5',
                'color' => 'Зеленый',
                'state_number' => 'Р904МН',
                'status' => 0,
            ],
            [
                'id_client' => 3,
                'brand' => 'Mercedes-Benz',
                'model' => 'A-Class',
                'color' => 'Красный',
                'state_number' => 'С822ЕТ',
                'status' => 1,
            ],

            [
                'id_client' => 4,
                'brand' => 'BMW',
                'model' => 'X5',
                'color' => 'Красный',
                'state_number' => 'Р191РР',
                'status' => 1,
            ],
            [
                'id_client' => 4,
                'brand' => 'Mercedes-Benz',
                'model' => 'C-Class',
                'color' => 'Серый',
                'state_number' => 'Х399ХО',
                'status' => 0,
            ],
            [
                'id_client' => 4,
                'brand' => 'BMW',
                'model' => 'X5',
                'color' => 'Серый',
                'state_number' => 'Т001УХ',
                'status' => 0,
            ],
            [
                'id_client' => 4,
                'brand' => 'Mercedes-Benz',
                'model' => 'A-Class',
                'color' => 'Черный',
                'state_number' => 'Т002ТЕ',
                'status' => 1,
            ],
        ]);
    }
}
