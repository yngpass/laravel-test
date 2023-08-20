<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'fullname' => 'Иванов Иван Иванович',
                'gender' => 'мужской',
                'phone' => '+79999999999',
                'address' => 'г. Волгоград'
            ],
            [
                'fullname' => 'Олегова Ольга Олеговна',
                'gender' => 'женский',
                'phone' => '+78888888888',
                'address' => 'г. Москва'
            ],
            [
                'fullname' => 'Алексеев Алексей Алексеевич',
                'gender' => 'мужской',
                'phone' => '+77777777777',
                'address' => 'г. Саратов'
            ],
            [
                'fullname' => 'Петров Петр Петрович',
                'gender' => 'мужской',
                'phone' => '+76666666666',
                'address' => 'г. Санкт-Петербург'
            ],
        ]);
    }
}
