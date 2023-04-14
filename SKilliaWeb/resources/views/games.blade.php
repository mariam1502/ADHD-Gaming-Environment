@extends('layouts.master')

@section('title')
    Games
@endsection

@section('css')
{{-- add any css i want it will add to head.blade.php --}}
@endsection

@section('scripts')
{{-- add any javascript code i want it will add to footer-scripts.blade.php --}}
@endsection

@section('page title') 
    Therapy Games
@endsection

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>Behavioral Games</h1>
                </div>
            </div>
        </div>
    </div>

    <div style="display: flex">
        <div style="flex: 33.33% ; padding: 5px;">
            <img src="../assets/images/g1.png" alt="homepage" style="width:100%">
        </div>
        <div style="flex: 33.33% ; padding: 5px;">
        <img src="../assets/images/g2.png" alt="homepage"  style="width:100%">
        </div>
        <div style="flex: 33.33% ; padding: 10px;">
            <img src="../assets/images/g3.png" alt="Mountains" style="width:100%">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>cognitive Games</h1>
                </div>
            </div>
        </div>
    </div>

    <div style="display: flex">
        <div style="flex: 33.33% ; padding: 5px;">
            <img src="../assets/images/g4.png" alt="homepage" style="width:100%">
        </div>
        <div style="flex: 33.33% ; padding: 5px;">
        <img src="../assets/images/g5.png" alt="homepage"  style="width:100%">
        </div>
        <div style="flex: 33.33% ; padding: 10px;">
            <img src="../assets/images/g6.png" alt="Mountains" style="width:100%">
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