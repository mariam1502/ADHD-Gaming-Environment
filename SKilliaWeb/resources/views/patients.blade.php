@extends('layouts.master')

@section('title')
    Patients
@endsection

@section('css')
{{-- add any css i want it will add to head.blade.php --}}
@endsection

@section('scripts')
{{-- add any javascript code i want it will add to footer-scripts.blade.php --}}
@endsection

@section('page title') 
    Patient Table
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Patients Table</h4>
                    <h6 class="card-subtitle">Add class <code>.table</code></h6>
                    <div class="table-responsive">


                        <table class="table user-table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Age</th>
                                    <th class="border-top-0">Gendre</th>
                                    <th class="border-top-0">Phone</th>
                                    <th class="border-top-0">Delete</th>
                                    <th class="border-top-0">Edit</th>



                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($patients as $patient)
                                <tr>
                                    <td>{{$patient->id}}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>{{$patient->birth}}</td>
                                    <td>{{$patient->gender}}</td>
                                    <td>{{$patient->phone}}</td>
                                    
                                    <td>
                                    <form action="/deleting_patient" method="POST" style="float: left; padding: 5px;">
                                        @csrf
                                        <input class="btn btn-success mx-auto mx-md-0 text-white" type="submit" name="delete" value="Delete" style="background-color: red; border: none;">
                                    </form>
                                    </td>
                                    <td>  
                                        <a href="{{route('patients.edit' , $patient->id)}}" class="btn btn-success mx-auto mx-md-0 text-white" type="submit" name="update" style="float: left; margin-left: 5px; padding: 5px; width: 70px; text-align: center;">Edit</a>

                                    </td>
                        
                                </tr> 
                                @empty
                                    <tr>
                                        <td colspan="6">No Patients Found</td>

                                    </tr>    
                                @endforelse



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>

@endsection