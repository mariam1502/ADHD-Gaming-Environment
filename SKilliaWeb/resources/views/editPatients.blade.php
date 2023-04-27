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
            <form  action="{{route('patients.update' , $patients->id)}}" method="POST" class="form-horizontal form-material mx-2">
                @csrf
                @method('PUT')



                <div class="form-group">
                    <label class="col-md-12 mb-0">Child's Full Name</label>
                    <div class="col-md-12">
                        
                        <input type="text" value="{{ old('name' ,$patients->name)}}" name="name"
                            class="form-control ps-0 form-control-line" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">Date of birth</label>
                    <div class="col-md-12">
                        <input type="date" value="{{ old('birth' ,$patients->birth)}}" name="birth"
                            class="form-control ps-0 form-control-line" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Gender</label>
                    <div class="col-sm-12 border-bottom">
                        <select class="form-select shadow-none ps-0 border-0 form-control-line" name="gender" required>
                            <option value="Male" {{ old('gender', $patients->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $patients->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>
                
                
                


                <div class="form-group">
                    <label for="example-email" class="col-md-12">Guardian's Email</label>
                    <div class="col-md-12">
                        <input type="email" value="{{ old('email' ,$patients->email)}}"
                            class="form-control ps-0 form-control-line" name="email"
                            id="example-email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Guardian's Phone No</label>
                    <div class="col-md-12">
                        <input type="number" value="{{ old('phone' ,$patients->phone)}}" name="phone"
                            class="form-control ps-0 form-control-line" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Current symptoms and severity of symptoms</label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('symptoms' ,$patients->symptoms)}}" name="symptoms"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Diagnostic information related to ADHD</label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('diagnostic_information' ,$patients->diagnostic_information)}}" name="diagnostic_information"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">History of ADHD
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('history' ,$patients->history)}}" name="history"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about how ADHD is impacting daily functioning
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('impacting_daily' ,$patients->impacting_daily)}}" name="impacting_daily"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's support system, including family, friends
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('support_system' ,$patients->support_system)}}" name="support_system"
                        class="form-control ps-0 form-control-line">

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's school performance
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('school_performance' ,$patients->school_performance)}}" name="school_performance"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's home environment and family dynamics

                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('home_environment' ,$patients->home_environment)}}" name="home_environment"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's social skills and relationships with peers
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('social_skills' ,$patients->social_skills)}}" name="social_skills"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about any medication use and management
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('medication' ,$patients->medication)}}" name="medication"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's daily routines and habits
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('daily_routines' ,$patients->daily_routines)}}" name="daily_routines"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's emotional and behavioral regulation
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('emotional_behavioral_regulation' ,$patients->emotional_behavioral_regulation)}}" name="emotional_behavioral_regulation"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-md-12 mb-0">Information about the child's self-esteem and self-concept

                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('self_esteem' ,$patients->self_esteem)}}" name="self_esteem"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">
                        Goals for therapy and desired outcomes
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('goals' ,$patients->goals)}}" name="goals"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-12 mb-0">
                    Extra Information
                    </label>
                    <div class="col-md-12">
                        <input type="textarea" value="{{ old('extra' ,$patients->extra)}}" name="extra"
                            class="form-control ps-0 form-control-line">
                    </div>
                </div>
                {{-- @empty   
                <p>No patients found</p>

                                @endforelse --}}



            

                <div class="form-group">
                    <div class="col-sm-12 d-flex">
    
                            <input class="btn btn-success mx-auto mx-md-0 text-white" type="submit" name="submit" value="Edit Profile">

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

    Edit Patient
    @endsection