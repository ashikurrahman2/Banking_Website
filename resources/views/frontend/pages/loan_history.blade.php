@extends('layouts.app')

@section('title', 'Loan History')

@section('content')
<div class="container my-3">
    <h4 class="text-center mb-4">Bank Loan History</h4>
    @if ($loans->isNotEmpty())
        @foreach($loans as $loan)
        <div class="card p-3 mb-3">
            <div class="d-flex align-items-center">
                <!-- Date -->
                <div class="me-3 text-center" style="width: 60px;">
                    <span class="d-block text-muted" style="font-size: 12px;">{{ \Carbon\Carbon::parse($loan->date)->format('d M') }}</span>
                    <span style="font-size: 14px;">{{ \Carbon\Carbon::parse($loan->date)->format('Y') }}</span>
                </div>

                <!-- Customer Name -->
                <div class="flex-grow-1">
                    <h6 class="mb-0">{{ $user->name }}</h6>
                </div>

                <!-- Loan Type -->
                <div class="text-nowrap">
                    <h6 class="mb-0 ms-2">{{ $loan->loan_type }}</h6>
                </div>

                <!-- Amount and Status -->
                <div class="text-end">
                    <h6 class="mb-0" style="color: {{ $loan->status == 'rejected' ? '#ff0000' : '#000' }};">
                        ৳{{ number_format($loan->loan_amount, 2) }}
                    </h6>
                    <span class="loan-status" 
                          style="background-color: {{ $loan->status == 'rejected' ? '#ffd1d1' : '#ffe6e6' }};">
                        {{ ucfirst($loan->status) }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p class="text-center">No loan history found.</p>
    @endif
</div>

<style>
  .loan-status {
    font-size: 14px;
    color: #ff0000;
  }
</style>
@endsection
