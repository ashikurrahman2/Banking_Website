@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-lg" style="width: 28rem;">
        <div class="card-body text-center">
            <!-- Icon -->
            <div class="text-success mb-3">
                {{-- <i class="bi bi-check-circle" style="font-size: 3rem;"></i> --}}
                <i class="bi bi-exclamation-triangle-fill" style="font-size: 3rem; color: #ffc107;"></i>

            </div>
            <!-- Title -->
            <h5 class="card-title text-uppercase fw-bold">Withdrawal requests are not permitted at this stage.</h5>
            <p class="card-text text-muted">Please contact the customer support for further assistance.</p>
            <!-- Home link -->
            <a href="{{ route('index') }}" class="btn btn-primary">Go to Home</a>
        </div>
    </div>
</div>
@endsection
