@extends('layouts.master')
@section('title')
    Add Patient
    
@endsection

@section('css')
{{-- add any css i want it will add to head.blade.php --}}
@endsection

@section('scripts')
{{-- add any javascript code i want it will add to footer-scripts.blade.php --}}
@endsection

@section('page title') 
Add Patient
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">

<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            <form  action="/adding_patient" method="POST" class="form-horizontal form-material mx-2">
                @csrf
                <div class="form-group">
                    <label class="col-md-12 mb-0">Child's Full Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="" name="name"
                            class="form-control ps-0 form-control-line" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Date of birth</label>
                    <div class="col-md-12">
                        <input type="date" placeholder="" name="birth"
                            class="form-control ps-0 form-control-line" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Gendre</label>
                    <div class="col-sm-12 border-bottom">
                        <select class="form-select shadow-none ps-0 border-0 form-control-line" name="gendre" required>
                            <option>Male</option>
                            <option>Female</option>
             
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Guardian's Email</label>
                    <div class="col-md-12">
                        <input type="email" placeholder=""
                            class="form-control ps-0 form-control-line" name="email"
                            id="example-email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Guardian's Phone No</label>
                    <div class="col-md-12">
                        <input type="number" placeholder=" " name="phone"
                            class="form-control ps-0 form-control-line" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Current symptoms and severity of symptoms</label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A " name="symptoms"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Diagnostic information related to ADHD</label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder="N/A " name="diagnostic_information"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">History of ADHD
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder="N/A " name="history"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about how ADHD is impacting daily functioning
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A" name="impacting_daily"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's support system, including family, friends
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A" name="support_system"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's school performance
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A" name="school_performance"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's home environment and family dynamics

                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder="N/A " name="home_environment"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's social skills and relationships with peers
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder="N/A " name="social_skills"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about any medication use and management
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A" name="medication"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's daily routines and habits
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A" name="daily_routines"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's emotional and behavioral regulation
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A" name="emotional_behavioral_regulation"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's self-esteem and self-concept

                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder=" N/A" name="self_esteem"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">
                        Goals for therapy and desired outcomes
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder="N/A " name="goals"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">
                       Extra Information
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" placeholder="N/A " name="extra"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>



            

                <div class="form-group">
                    <div class="col-sm-12 d-flex">
    
                            <input class="btn btn-success mx-auto mx-md-0 text-white" type="submit" name="submit" value="Store Profile">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

    Add Patient
    @endsection