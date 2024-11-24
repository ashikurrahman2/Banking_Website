@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Withdraw</h2>
    <form action="{{ route('withdraw.submit') }}" method="POST" id="withdraw-form">
        @csrf
        <div class="mb-3">
            <label for="withdraw_via" class="form-label">Withdraw via</label>
            <select name="withdraw_via" id="withdraw_via" class="form-select">
                <option value="" disabled selected>Select an option</option>
                <option value="bkash">Bkash</option>
                <option value="nagad">Nagad</option>
                <option value="rocket">Rocket</option>
                <option value="bank">Bank</option>
            </select>
        </div>

        <!-- Dynamic Fields -->
        <div id="dynamic-fields"></div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Withdraw</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const withdrawVia = document.getElementById('withdraw_via');
        const dynamicFields = document.getElementById('dynamic-fields');

        withdrawVia.addEventListener('change', function () {
            const selectedOption = this.value;
            let fields = '';

            if (selectedOption === 'bkash' || selectedOption === 'nagad' || selectedOption === 'rocket') {
                fields = `
                    <div class="mb-3">
                        <label for="account_number" class="form-label">${capitalize(selectedOption)} Number</label>
                        <input type="text" name="account_number" id="account_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="account_name" class="form-label">Account Name</label>
                        <input type="text" name="account_name" id="account_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                `;
            } else if (selectedOption === 'bank') {
                fields = `
                    <div class="mb-3">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" name="account_number" id="account_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="account_name" class="form-label">Account Name</label>
                        <input type="text" name="account_name" id="account_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="branch" class="form-label">Branch</label>
                        <input type="text" name="branch" id="branch" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                `;
            }

            dynamicFields.innerHTML = fields;
        });

        function capitalize(word) {
            return word.charAt(0).toUpperCase() + word.slice(1);
        }
    });
</script>
@endsection
