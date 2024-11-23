<div id="preloader"></div>
<!-- start logo menu area -->
<header class="second-header third-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-xl-2">
                <div class="second-logo">
                    <a href="/"><img src="{{ asset('/') }}frontend/asset/img/mbc.png" style="width:90px; height:70;" alt=""></a>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 text-right col-xl-5">
                <div class="bg-black px-3 py-1 rounded-pill text-white position-absolute" style="width: auto; top:3px; right:60px;">
                    $1200
                </div>
                <div id="cssmenu">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li><a href="about.html">About us </a></li>
                        <li><a href="services.html">Service</a>
                            <ul>
                                <li><a href="services-image.html">Services Image</a></li>
                                <li><a href="business-loan.html">Business Loan</a></li>
                                <li><a href="education-loan.html">Education Loan</a></li>
                                <li><a href="car-loan.html">Car Loan</a></li>
                                <li><a href="home-loan.html">Home Loan</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li> <a href="calculator.html">Calculator</a></li>
                                <li> <a href="gallery.html">Gallery</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="testimonial.html">Testimonials</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="how-it-work.html">How It Works</a></li>
                                <li><a href="apply-now.html">Apply Now</a></li>
                                
                            </ul>
                        </li>
                    
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="/register">Register</a></li>
                        <li>
                            @if(Auth::check())
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            @else
                                <a href="{{ route('login') }}">Login</a>
                            @endif
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 col-xl-5">
                <div class="menu-info">
                    <div class="icon">
                        <span class="fa fa-phone"></span>
                    </div>
                    <div class="content">
                        <p>+2 -450-000-0120</p>
                    </div>
                </div>
                <div class="menu-info">
                    <div class="icon">
                        <span class="fa fa-envelope"></span>
                    </div>
                    <div class="content">
                        <p>Info@loanplus.com</p>
                    </div>
                </div>
                <div class="menu-info-wrapper">
                    <div class="menu-info thir-btn">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>

</header>
<!-- /header -->