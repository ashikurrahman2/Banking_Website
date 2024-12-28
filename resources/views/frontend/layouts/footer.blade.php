    <!-- start footer area -->
    <section class="footer-area footer-two footer-three section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="footer-widget">
                        <div class="footer-title">
                            <h4>About Us</h4>
                        </div>
                        <p>Over 24 years experience and knowledge Loanplus wе’rе hеrе to рrоvіdе уоu wіth fіnаnсіаl ѕоlutіоnѕ fоr аll уоur lеndіng needs. Whether you are lооkіng fоr any kind of loan, оur lending tеаm wіll explain lеndіng орtіоnѕ.</p>
                        <div class="footer-two-social">
                            <a href="{{ $setting->facebook }}" class="fa fa-facebook-f"></a>
                            {{-- <a href="#" class="fa fa-twitter"></a> --}}
                            <a href="{{ $setting->linkedin }}" class="fa fa-linkedin"></a>
                            {{-- <a href="#" class="fa fa-google-plus"></a> --}}
                            {{-- <a href="#" class="fa fa-pinterest"></a> --}}
                            <a href="{{ $setting->instragram }}" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2">
                    <div class="footer-widget pages-widget">
                        <div class="footer-title">
                            <h4>Get a Loan</h4>
                        </div>
                        <ul>
                            <li><a href="#">How it works</a></li>
                            <li><a href="#">Express Visa card</a></li>
                            <li><a href="#">Apply</a></li>
                            <li><a href="#">Costs & Tax</a></li>
                            <li><a href="#">FAQs </a></li>
                            <li><a href="#">Contact us </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-3">
                    <div class="footer-widget recent-post">
                        <div class="footer-title">
                            <h4>Opening Hours</h4>
                        </div>
                        <ul class="opening-time">
                            <li>Mon : 8.30am to 7.00pm</li>
                            <li>Tue : 8.30am to 7.00pm</li>
                            <li>Wed : 8.30am to 7.00pm</li>
                            <li>Thu : 8.30am to 7.00pm</li>
                            <li>Fri : 8.30am to 7.00pm</li>
                            <li>Sat - Sun : CLOSED</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-title">
                            <h4>Contact us</h4>
                        </div>
                        <div class="contact-widget">        
                            <ul>
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('/') }}frontend/asset/img/map-pin.png" alt="">
                                    </div>
                                    <div class="content">
                                        {{-- <p>Loanplus 201, San Francis, United States.</p> --}}
                                        <p>{{ $setting->address }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('/') }}frontend/asset/img/envalope-2.png" alt="">
                                    </div>
                                    <div class="content">
                                        <p>{{ $setting->main_email }},{{ $setting->support_email }}
                                            <span>reply within 2 Hours</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <img src="{{ asset('/') }}frontend/asset/img/call.png" alt="">
                                    </div>
                                    <div class="content">
                                        <p>{{ $setting->phone_one }}
                                            <span>Call @ 8.30am to 5.00pm </span></p>
                                    </div>
                                </li>
                            </ul>
                            {{-- @endforeach --}}
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="copy-right-section second-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                  
                    <div class="copyright-text">
                        <p>Copyright <i class="fa fa-copyright"></i> {{ date('Y') }} MBC Finance.</p>
                    </div>
                    
                </div>
                {{-- <div class="col-md-6 text-right">
                    <ul class="footer-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Aboutus</a></li>
                        <li><a href="#">Loans</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contactus</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- end of footer area -->