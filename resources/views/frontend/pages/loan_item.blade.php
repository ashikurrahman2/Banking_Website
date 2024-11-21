@extends('layouts.app')

@section('title', 'Loan Item')

@section('content')
         <section class="block-features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <a href="{{ route('loan.form', 'personal') }}">
                    <div class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/icon-1.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Personal Loan</h4>
                            <h5>@ 6.68%</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <a href="{{ route('loan.form', 'car') }}">
                    <div class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/car.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Car Loan</h4>
                            <h5>@ 5.68%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <div class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/money.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Business Loan</h4>
                            <h5>@ 7.56%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <div class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/home.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Education Loan</h4>
                            <h5>@ 8.56%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <div class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/education.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Payday Loan</h4>
                            <h5>@ 9.5%</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-2 col-sm-6 nopadding">
                    <div class="single-block">
                        <div class="icon">
                            <img src="{{ asset('/') }}frontend/asset/img/card.png" alt="">
                        </div>
                        <div class="content">
                            <h4>Credit Card</h4>
                            <h5>@ 10.50%</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

@endsection