<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view () {
        $employees = Employee::all();
        // $my_result = \DB::select('select calc_total(10248);');
        // dd($my_result);
        return view('welcome', compact(['employees']));
    }
}
