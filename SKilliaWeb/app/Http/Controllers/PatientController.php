<?php

namespace App\Http\Controllers;
use App\Models\PatientModel;


use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return view('add_patient');

    }

    // public function view()
    // {
    //     $patients=auth()->user()->patients;  //get the patient of this therapist
    //     return view('patients' , compact('patients'));

    // }

    public function view()
    {
        $patients = PatientModel::all();
        return view('patients', compact('patients'));
    }


    public function store(Request $request)
    {
        PatientModel::create($request->all());
        return view('dashboard');

    }

    public function destroy(Request $request){

        $patientId=$request->get('patient_id');
        $patient = PatientModel::find($patientId);
        $patient->delete();
        return view('patients');    
    }
}
