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
                                    <th class="border-top-0">Last Name</th>
                                    <th class="border-top-0">Age</th>
                                    <th class="border-top-0">Start Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ahmed</td>
                                    <td>Adel</td>
                                    <td>12</td>
                                    <td>25/3/2023</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Layla</td>
                                    <td>Ahmed</td>
                                    <td>10</td>
                                    <td>29/5/2023</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Gana</td>
                                    <td>Mohammed</td>
                                    <td>8</td>
                                    <td>19/3/2023</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Mark</td>
                                    <td>Emad</td>
                                    <td>12</td>
                                    <td>9/7/2023</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Lamya</td>
                                    <td>Ahmed</td>
                                    <td>7</td>
                                    <td>5/1/2023</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Hany</td>
                                    <td>Ahmed</td>
                                    <td>9</td>
                                    <td>3/10/2023</td>
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