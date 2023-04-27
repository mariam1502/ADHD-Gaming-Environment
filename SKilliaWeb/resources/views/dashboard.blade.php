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

@section('content')<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3">
            <div class="card">
                <div class="card-body bg-info">
                    <h4 class="text-white card-title">My Patients</h4>
                    <h6 class="card-subtitle text-white mb-0 op-5">Checkout my patients here</h6>
                </div>
                <div class="card-body">
                    <div class="contact-box message-box">
                        <h2 class="add-ct-btn">
                            <button type="button" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">
                                <a href="/add_patient" style="text-decoration: none; color: aliceblue;">+</a>
                            </button>
                        </h2>
                        <div class="contact-widget message-widget">
                            @forelse ($patients as $patient)
                                <div class="mail-contnet">
                                    <h5 class="mb-0">{{ $patient->name }}</h5>
                                    <span class="mail-desc">{{ $patient->birth }}</span>
                                </div>
                                <br> <!-- Add a line break between each patient -->
                            @empty
                                <p>No patients found.</p>
                            @endforelse
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>          
</div>

@endsection