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

    public function dashboardview()
    {
        $patients = PatientModel::all();
        return view('dashboard', compact('patients'));
    }

    // PatientController.php

public function edit($id)
{
    $patient = PatientModel::find($id);
    return view('editPatients', compact('patient'));
}




public function update(Request $request, $id)
{
    $patient = PatientModel::find($id);
    $patient->name = $request->input('name');
    $patient->birth = $request->input('birth');
    $patient->gender = $request->input('gender');
    $patient->email = $request->input('email');
    $patient->phone = $request->input('phone');
    $patient->symptoms = $request->input('symptoms');
    $patient->diagnostic_information = $request->input('diagnostic_information');
    $patient->history = $request->input('history');
    $patient->impacting_daily = $request->input('impacting_daily');
    $patient->support_system = $request->input('support_system');
    $patient->save();

    return redirect()->route('dashboard')->with('success', 'Patient updated successfully.');
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
