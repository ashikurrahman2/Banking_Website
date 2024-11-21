<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="asset/img/favicon.png" type="image/gif">
        <meta name="description" content="Loanplus - Loan Company HTML Template, Credit Website Template.">
        <meta name="keywords" content="Home Loan Template, Bootstrap Template, Loan Product, Personal Loan">
        <title>MBC Finance | @yield('title')</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/asset/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="asset/css/reset.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/css/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/asset/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend/asset/css/responsive.css')}}">
        {{-- For bottom nav --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding-bottom: 70px; /* Space for navigation bar */
            font-family: 'Noto Sans Bengali', sans-serif;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #f8f9fa; /* Light background */
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
        }

        .nav-link {
            color: black;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            flex: 1; /* Ensure all items take equal space */
            transition: color 0.3s ease-in-out;
        }

        .nav-link .icon {
            font-size: 24px;
            margin-bottom: 5px;
            display: block;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .nav-link.active {
            color: #007bff;
        }
    </style>
    </head>
<body class="js">
  
    <!-- header start -->
    @include('frontend.layouts.header')
    <!-- header end -->

    @yield('content')

      <!-- Bottom Navigation -->
      <div class="bottom-nav">
        <a href="/" class="nav-link active">
            <i class="icon bi bi-house-door-fill"></i>
            <span>হোম</span>
        </a>
        <a href="#" class="nav-link">
            <i class="icon bi bi-clock-history"></i>
            <span>হিস্টোরি</span>
        </a>
        <a href="#" class="nav-link">
            <i class="icon bi bi-wallet-fill"></i>
            <span>উইড্রো</span>
        </a>
        <a href="#" class="nav-link">
            <i class="icon bi bi-person-fill"></i>
            <span>একাউন্ট</span>
        </a>
    </div>

    <!-- footer start -->
    @include('frontend.layouts.footer')
    <!-- footer end -->

    {{-- Form submit success message --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- All script -->
    <script src="{{asset('frontend/asset/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.0/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script src="{{asset('frontend/asset/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/asset/js/jquery.nice-select.js')}}"></script>
    <script src="{{asset('frontend/asset/js/menumaker.js')}}"></script>
    <script src="{{asset('frontend/asset/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/asset/js/slider.js')}}"></script>
    <script src="{{asset('frontend/asset/js/calculator.js')}}"></script>
    <script src="{{asset('frontend/asset/js/active.js')}}"></script>
	<script>
	$(window).scroll(function() {
		if ($(this).scrollTop() > 50){  
			$('.second-header').addClass("sticky");
		}
		else{
			$('.second-header').removeClass("sticky");
		}
	});	
	</script>
    {{-- Bottom nav --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>