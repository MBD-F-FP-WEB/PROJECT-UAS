<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view () {
        $employees = Employee::all();
        return view('welcome', compact(['employees']));
    }
}
