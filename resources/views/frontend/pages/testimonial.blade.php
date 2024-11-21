@extends('layouts.app')

@section('title', 'Testimonial')

@section('content')
     <!-- start testimonial section -->
     <section class="third-testimonial-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2>Testimonials</h2>
                        <p>The passages of Lorem Ipsum available but the majority have suffered alteration embarrased</p>
                    </div>
                </div>
            </div>
            <div class="third-testimonial-slider owl-carousel">
                <div class="single-testimonial-third">
                    <div class="testimonial-img">
                        <img src="asset/img/testimonial.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="title">
                            <h4>Harry Porter</h4>
                            <p>designer</p>
                        </div>
                        <p>“ A majority have suffer alte form and web sites still innr their infancy bose if you are going to use a passage of Lorem Ipsum, you need to be sure there isn't embarrassing hidden in the middle of text.”</p>
                    </div>
                </div>
                <div class="single-testimonial-third">
                    <div class="testimonial-img">
                        <img src="asset/img/testimonial-2.jpg" alt="">
                    </div>
                    <div class="content">
                        <div class="title">
                            <h4>james Porter</h4>
                            <p>developer</p>
                        </div>
                        <p>“ A majority have suffer alte form and web sites still innr their infancy bose if you are going to use a passage of Lorem Ipsum, you need to be sure there isn't embarrassing hidden in the middle of text.”</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of third testimonial section -->

      <!-- start brand section -->
      <section class="brand-section third-brand">
        <div class="container">
            <div class="brand-slider owl-carousel">
                <div class="single-brand">
                    <img src="asset/img/brand-1.png" alt="">
                </div>
                <div class="single-brand">
                    <img src="asset/img/brand-2.png" alt="">
                </div>
                <div class="single-brand">
                    <img src="asset/img/brand-3.png" alt="">
                </div>
                <div class="single-brand">
                    <img src="asset/img/brand-4.png" alt="">
                </div>
                <div class="single-brand">
                    <img src="asset/img/brand-5.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- end of brand section -->
@endsection