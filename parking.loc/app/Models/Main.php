<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Main extends Model
{
    static public function getClients() 
    {
        return DB::table('clients')
            ->get();
    }

    static public function getCars() 
    {
        return DB::table('cars')
            ->where('status', 1)
            ->orderByDesc('id')
            ->paginate(5);
    }

    static public function getCarsNotParking() 
    {
        return DB::table('cars')
            ->where('status', 0)
            ->get();
    }

    static public function getClientForUpdate($id) {
        return DB::table('clients')
            ->where('id', $id)
            ->get()
            ->first();
    }

    static public function getCarsForUpdate($id) {
        return DB::table('cars')
            ->where('id_client', $id)
            ->get();
    }
}
