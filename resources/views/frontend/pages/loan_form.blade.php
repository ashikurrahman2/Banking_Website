@extends('layouts.app')

@section('title', $loanDetails['title'])

@section('content')
<section class="loan-form-section">
    <div class="container">
        <h1>{{ $loanDetails['title'] }}</h1>
        <p>Interest Rate: {{ $loanDetails['rate'] }}</p>

        <form action="{{ url('/apply-loan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="loan_type" value="{{ $loanType }}">
            <div class="form-group">
                <label for="F_name">Father's name (পিতার নাম): <span class="text-danger">*</span></label>
                <input type="text" id="F_name" name="F_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="M_name">Mother's name (মাতার নাম): <span class="text-danger">*</span></label>
                <input type="text" id="M_name" name="M_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="spouse_name">Spouse's name (স্ত্রীর নাম): <span class="text-danger">*</span></label>
                <input type="text" id="spouse_name" name="spouse_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="d_birth"> Date Of Birth (জন্ম তারিখ): <span class="text-danger">*</span></label>
                <input type="date" id="d_birth" name="d_birth" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender (লিঙ্গ): <span class="text-danger">*</span></label>
                <input type="text" id="gender" name="gender" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="pass_num">Passport number (পাসপোর্ট নম্বর):</label>
                <input type="number" id="pass_num" name="pass_num" class="form-control">
            </div>

            <div class="form-group">
                <label for="country">Country (দেশ): <span class="text-danger">*</span></label>
                <input type="text" id="country" name="country" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Mobile No (মোবাইল নম্বর): <span class="text-danger">*</span></label>
                <input type="number" id="phone" name="phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="social_phone">Imo/WhatsApp No (ইমু/হোয়াটসঅ্যাপ নম্বর): <span class="text-danger">*</span></label>
                <input type="number" id="social_phone" name="social_phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="permanent_address">Permanent Address (স্থায়ী ঠিকানা): <span class="text-danger">*</span></label>
                <input type="text" id="permanent_address" name="permanent_address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="district">District (জেলা): <span class="text-danger">*</span></label>
                <input type="text" id="district" name="district" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="police_station">Thana (থানা): <span class="text-danger">*</span></label>
                <input type="text" id="police_station" name="police_station" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail (ইমেইল): <span class="text-danger">*</span></label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group mt-4">
                <h5>Bank Details</h5>
            </div>

            <div class="form-group">
                <label for="account_no">Account No (অ্যাকাউন্ট নম্বর): <span class="text-danger">*</span></label>
                <input type="text" id="account_no" name="account_no" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="branch">Branch (শাখা): <span class="text-danger">*</span></label>
                <input type="text" id="branch" name="branch" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="account_holder">Account Holder Name (অ্যাকাউন্ট হোল্ডারের নাম): <span class="text-danger">*</span></label>
                <input type="text" id="account_holder" name="account_holder" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="loan_amount">Loan Amount (ঋণের পরিমাণ): <span class="text-danger">*</span></label>
                <input type="number" id="loan_amount" name="loan_amount" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="repayment_period">Loan Repayment Period (ঋণ পরিশোধের মেয়াদ): <span class="text-danger">*</span></label>
                <input type="date" id="repayment_period" name="repayment_period" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="photo">Photo (ছবি):<span class="text-danger">*</span></label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="signature">Signature (স্বাক্ষর):<span class="text-danger">*</span></label>
                <input type="file" id="signature" name="signature" class="form-control" accept="image/*" required>
            </div>

            <div class="form-group mt-4">
                <h5>Loan Guarantor Details</h5>
            </div>

            <div class="form-group">
                <label for="guarantor_name">Name (নাম): <span class="text-danger">*</span></label>
                <input type="text" id="guarantor_name" name="guarantor_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="guarantor_father_name">Father's Name (পিতার নাম): <span class="text-danger">*</span></label>
                <input type="text" id="guarantor_father_name" name="guarantor_father_name" class="form-control" value="{{ old('guarantor_father_name') }}" required>
            </div>

            <div class="form-group">
                <label for="guarantor_mother_name">Mother's Name (মাতার নাম): <span class="text-danger">*</span></label>
                <input type="text" id="guarantor_mother_name" name="guarantor_mother_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="guarantor_nid">NID No (এনআইডি নম্বর): <span class="text-danger">*</span></label>
                <input type="number" id="guarantor_nid" name="guarantor_nid" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="guarantor_thana">Thana (থানা): <span class="text-danger">*</span></label>
                <input type="text" id="guarantor_thana" name="guarantor_thana" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="guarantor_zilla">Zilla (জেলা): <span class="text-danger">*</span></label>
                <input type="text" id="guarantor_zilla" name="guarantor_zilla" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
</section>

{{-- 
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loanAmountInput = document.getElementById('loan_amount');
        const repaymentPeriodInput = document.getElementById('repayment_period');
        const resultContainer = document.createElement('div');
        resultContainer.style.marginTop = '10px';
        resultContainer.style.fontWeight = 'bold';
        resultContainer.id = 'result';
        repaymentPeriodInput.parentElement.appendChild(resultContainer);

        loanAmountInput.addEventListener('input', calculateLoanRepayment);
        repaymentPeriodInput.addEventListener('input', calculateLoanRepayment);

        function calculateLoanRepayment() {
            const loanAmount = parseFloat(loanAmountInput.value) || 0;
            const repaymentDate = new Date(repaymentPeriodInput.value);
            const currentDate = new Date();

            // Calculate the number of years between the current date and repayment date
            const years = (repaymentDate - currentDate) / (1000 * 60 * 60 * 24 * 365.25);

            if (years > 0 && loanAmount > 0) {
                const interestRate = 0.005; // 0.5% annual interest rate
                const totalAmount = loanAmount * Math.pow(1 + interestRate, years);
                resultContainer.textContent = `Total Repayment Amount (মোট ঋণ পরিশোধের পরিমাণ): ৳${totalAmount.toFixed(2)}`;
            } else {
                resultContainer.textContent = '';
            }
        }
    });
</script> --}}

@endsection
