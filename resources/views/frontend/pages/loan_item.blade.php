 @extends('layouts.app')

@section('title', 'Loan Item')

@section('content')
         <section class="block-features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <a href="{{ route('loan.form', 'personal') }}" class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/icon-1.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Personal Loan</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <a href="{{ Auth::check() ? route('loan.form', ['type' => 'home']) : route('login') }}" class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/education.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Home Loan</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <a href="{{ route('loan.form', 'car') }}" class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/car.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Car Loan</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <a href="{{ route('loan.form', 'business') }}" class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/money.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Business Loan</h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <a href="{{ route('loan.form', 'education') }}" class="single-block">
                    {{-- <a  class="single-block"> --}}
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/home.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Education Loan</h4>
                        </div>
                    </a>
                </div>
                
                
            </div>
        </div>
    </section>   

@endsection 



