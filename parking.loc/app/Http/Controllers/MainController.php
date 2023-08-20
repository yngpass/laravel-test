<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainController extends Controller
{
    public function index() 
    {
        $clients = Main::getClients();
        $cars = Main::getCars();
        $carsNotParking = Main::getCarsNotParking();
        return view('main', ['clients' => $clients, 'cars' => $cars, 'carsNotParking' => $carsNotParking]);
    }
    
    public function registration() 
    {
        return view('registration');
    }

    public function update($id) 
    {
        $client = Main::getClientForUpdate($id);
        $cars = Main::getCarsForUpdate($id);
        return view('update', ['client' => $client, 'cars' => $cars]);
    }
}
