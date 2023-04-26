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
                                    <th class="border-top-0">First Name</th>
                                    <th class="border-top-0">Age</th>
                                    <th class="border-top-0">Gendre</th>
                                    <th class="border-top-0">Phone</th>
                                    <th class="border-top-0">Actions</th>


                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>Ahmed</td>
                                    <td>Male</td>
                                    <td>12</td>
                                    <td>01016633884</td>
                                    <td>
                                       <form action="/deleting_patient"  method="POST" style="float: left;  padding: 5px;'">
                                            @csrf
                                        <input class="btn btn-success mx-auto mx-md-0 text-white" type="submit" name="delete" value="Delete" style="background-color: red;  border: none;">
                                    </form>
                                    <form action="#" method="POST" style="float: left;  padding: 5px;'">
                                        @csrf
                                        <input type="hidden" name="patient_id" value="644927fe11c04242320c6b26">
                                        <input class="btn btn-success mx-auto mx-md-0 text-white" type="submit" name="update" value="Update">

                                    </form>


                                    </td>
                                </tr>

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