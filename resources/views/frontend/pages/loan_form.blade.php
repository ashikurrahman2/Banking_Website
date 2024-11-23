 @extends('layouts.app')

@section('title', $loanDetails['title'])

@section('content')
<section class="loan-form-section">
    <div class="container">
        <h1>{{ $loanDetails['title'] }}</h1>
        <p>Interest Rate: {{ $loanDetails['rate'] }}</p>

        <form action="{{ url('/apply-loan') }}" method="POST">
            @csrf
            <input type="hidden" name="loan_type" value="{{ $loanType }}">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="amount">Loan Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
</section>
@endsection 



