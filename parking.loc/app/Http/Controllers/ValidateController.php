<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Validate;

class ValidateController extends Controller
{
    public function regCheck(Request $request) {
        $message = Validate::reg($request);
        return redirect('/registration')->with('message', $message);
    }

    public function upCheck($id, Request $request) {
        $message = Validate::updateDB($id, $request);
        return redirect('/update/'.$id)->with('message', $message);
    }

    public function addCar(Request $request) {
        $message = Validate::addCar($request);
        return redirect('/')->with('message', $message);
    }

    public function deleteCar(Request $request) {
        $message = Validate::deleteCar($request);
        return redirect('/')->with('message', $message);
    }

    public function deleteClient($id) {
        $message = Validate::deleteClient($id);
        return redirect('/')->with('message', $message);
    }
}
