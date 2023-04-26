<?php

namespace App\Http\Controllers;
use App\Models\AddPatientModel;


use Illuminate\Http\Request;

class AddPatientController extends Controller
{
    public function index()
    {
        return view('add_patient');

    }

    public function store(Request $request)
    {
        AddPatientModel::create($request->all());
        // print_r(request()->all());
        // return redirect()->route('/view');
        return view('dashboard');

    }
}
