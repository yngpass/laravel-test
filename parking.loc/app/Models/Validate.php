<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Validate extends Model
{
    // регистрация клиента и машин
    static public function reg($request) 
    {
        $phone = $request->input('phone');
        $check_phone = DB::table('clients')
            ->where('phone', $phone)
            ->value('phone');
        $cars = DB::table('cars')
            ->get();

        // проверяем на уникальность номер телефона
        if (!empty($check_phone)) {
            $message = 'Номер телефона "'.$phone.'" уже зарегестрирован!';
            return $message;
        }

        // проверяем на уникальность Гос Номер РФ
        for ($i=1; $i <= $request->input('count_car'); $i++) { 
            $state_number = $request->input('state_number-'.$i);

            foreach ($cars as $car) {
                if ($car->state_number == $state_number) {
                    $message = 'Гос Номер РФ "'.$state_number.'" уже зарегестрирован!';
                    return $message;
                }
            }
        }

        // вносим данные о клиенте в базу
        DB::table('clients')->insert([
            'fullname' => $request->input('fullname'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);
        // получаем id внесенного клиента
        $id_client = DB::table('clients')
            ->where('phone', $request->input('phone'))
            ->value('id');

        // вносим данные о машинах в базу
        for ($i=1; $i <= $request->input('count_car'); $i++) { 
            $status = $request->input('status-'.$i);
            if ($status == null) {
                $status = 0;
            }
            DB::table('cars')->insert([
                'id_client' => $id_client,
                'brand' => $request->input('brand-'.$i),
                'model' => $request->input('model-'.$i),
                'color' => $request->input('color-'.$i),
                'state_number' => $request->input('state_number-'.$i),
                'status' => $status,
            ]);
        }

        $message = 'Клиент и автомобили успешно зарегестрированы!';
        return $message;
    }

    // редактирование данных 
    public static function updateDB($id, $request) 
    {
        // редактируем данные о клиенте 
        DB::table('clients')
            ->where('id', $id)
            ->update([
                'fullname' => $request->input('fullname'),
                'gender' => $request->input('gender'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address')
            ]);

        // редактируем и вносим (если нужно) данные о машинах
        for ($i=1; $i <= $request->input('count_car'); $i++) { 
            $status = $request->input('status-'.$i);
            if ($status == null) {
                $status = 0;
            }
            DB::table('cars')->updateOrInsert(
                [
                    'state_number' => $request->input('state_number_up-'.$i),
                    'id_client' => $id,
                ],
                [
                    'brand' => $request->input('brand-'.$i),
                    'model' => $request->input('model-'.$i),
                    'color' => $request->input('color-'.$i),
                    'state_number' => $request->input('state_number-'.$i),
                    'status' => $status,
                ]
            );
        }

        $message = 'Данные успешно изменены!';
        return $message;
    }

    // добавление автомобиля на автостоянку
    public static function addCar($request) 
    {
        DB::table('cars')
            ->where('id', $request->input('car-add'))
            ->update(['status' => 1]);

        $message = 'Автомобиль был успешно добавлен на автостоянку!';
        return $message;
    }

    // удаления автомобиля с автостоянки
    public static function deleteCar($request) 
    {
        DB::table('cars')
            ->where('id', $request->input('car-delete'))
            ->update(['status' => 0]);

        $message = 'Автомобиль был успешно удален с автостоянки!';
        return $message;
    }

    // удаления всех данных о клиенте и его машинах
    public static function deleteClient($id) 
    {
        // удаление машин клиента
        DB::table('cars')
            ->where('id_client', $id)
            ->delete();
        // удаление данных о клиенте
        DB::table('clients')
            ->where('id', $id)
            ->delete();

        $message = 'Данные о клиенте были успешно удалены!';
        return $message;
    }
}
