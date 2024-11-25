@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Withdraw</h2>
    <form action="{{ route('withdraw.submit') }}" method="POST" id="withdraw-form">
        @csrf
        <div class="mb-3">
            <label for="withdraw_via" class="form-label">Withdraw via</label>
            <select name="withdraw_via" id="withdraw_via" class="form-select" readonly>
                <option value="bank" selected>Bank</option>
            </select>
        </div>

        <!-- Dynamic Fields -->
        <div id="dynamic-fields">
            <div class="mb-3">
                <label for="account_number" class="form-label">Account Number</label>
                <input type="text" name="account_number" id="account_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="account_name" class="form-label">Account Holder Name</label>
                <input type="text" name="account_name" id="account_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="bank_name" class="form-label">Bank Name</label>
                <input type="text" name="bank_name" id="bank_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="branch" class="form-label">Branch</label>
                <input type="text" name="branch" id="branch" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" name="amount" id="amount" class="form-control" required>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Withdraw</button>
    </form>
</div>
@endsection
