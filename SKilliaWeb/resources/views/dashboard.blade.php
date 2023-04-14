@extends('layouts.master')

@section('title')
    Main Page
@endsection

@section('css')
{{-- add any css i want it will add to head.blade.php --}}
@endsection

@section('scripts')
{{-- add any javascript code i want it will add to footer-scripts.blade.php --}}
@endsection

@section('page title')
    Dashboard 
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3">
            <!-- Column -->
            
            <!-- Column -->
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">My Patients</h4>
                    <h6 class="card-subtitle text-white mb-0 op-5">Checkout my patients here</h6>
                </div>
                <div class="card-body">
                    <div class="message-box contact-box">
                        <h2 class="add-ct-btn"><button type="button"
                                class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</button>
                        </h2>
                        <div class="message-widget contact-widget">
                            <!-- Message -->
                            <a href="#" class="d-flex align-items-center">
                                <div class="user-img mb-0"> <img src="../assets/images/users/1.png"
                                        alt="user" class="img-circle"> <span
                                        class="profile-status online pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5 class="mb-0">Layla Ahmed</h5> <span
                                    class="mail-desc">10 years old</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#" class="d-flex align-items-center">
                                <div class="user-img mb-0"> <img src="../assets/images/users/2.jpeg"
                                        alt="user" class="img-circle"> <span
                                        class="profile-status busy pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5 class="mb-0">Gana Mohammed</h5> <span
                                        class="mail-desc">8 years old</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#" class="d-flex align-items-center">
                                <div class="user-img mb-0"> <img src="../assets/images/users/3.png"
                                    alt="user" class="img-circle"> <span
                                    class="profile-status offline pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5 class="mb-0">Ahmed Adel</h5> <span
                                        class="mail-desc">12 years old</span>
                                </div>
                            </a>
                            <!-- Message -->
                            <a href="#" class="d-flex align-items-center">
                                <div class="user-img mb-0"> <img src="../assets/images/users/4.jpeg"
                                        alt="user" class="img-circle"> <span
                                        class="profile-status offline pull-right"></span> </div>
                                <div class="mail-contnet">
                                    <h5 class="mb-0">Hany Ahmed</h5> <span
                                        class="mail-desc">9 years old</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                
    <!-- ============================================================== -->
    <!-- Table -->
    <!-- ============================================================== -->

    
</div>

@endsection