 @extends('layouts.guest')
 
 @section('content')    
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item">
            <div class="img-fill">
                <img src="{{ asset('liberary/images/slide-01.jpg') }}" alt="">
                <div class="text-content">
                  <h3>Welcome To All In One</h3>
                  <h5>Were You Can Pay All Your Bills</h5>
                  <a href="{{ route('register') }}" class="main-stroked-button">Sign Up Now</a>
                  <a href="{{ route('login') }}" class="main-filled-button">Log In</a>
                </div>
            </div>
          </div>
          <!-- // Item -->  
        </div>
    </div>  
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 has-feedback display-flex">
            <hr><h3 class="text-info" align="center"><b>Our Partners Services</b></h3><hr>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img width="50px" src="{{ asset('liberary/images/power.jpg') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Ethiopian Electric Power</h4>
                            <p>Proin euismod sem ut diam ultricies, ut faucibus velit ultricies. Nam eu turpis quam. Duis ac condimentum eros.</p>
                            <a href="https://www.facebook.com/Ethiopian-Electric-Power-Corporation-EEPCo-226726324031870/" class="text-button-icon" target="_blank">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img width="50px" src="{{ asset('liberary/images/water.jpg') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Water Development Commision</h4>
                            <p>Ethiopias Water Development Commision have been doing termondous work to distribute water supply to all citizens of ethiopia,</p>
                            <a href="https://www.developmentaid.org/" target="_blank" class="text-button-icon">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img width="50px" src="{{ asset('liberary/images/telecom.png') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Ethio Telecom</h4>
                            <p>Ethio Telecom is the only telecommunication provider, be with us to be part of a better future</p>
                            <a href="https://www.ethiotelecom.et/" target="_blank" class="text-button-icon">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->
<div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 has-feedback display-flex">
            <hr><h3 class="text-info" align="center"><b>Our Partners Banking</b></h3><hr>
        </div>
        <div class="col-sm-4"></div>
    </div>
 <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img width="50px" src="{{ asset('liberary/images/cbe.jpg') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>CBE</h4>
                            <p>CBE is a mobile banking platform developed by commercial bank of ethiopia.</p>
                            <a href="#" target="_blank" class="text-button-icon">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter bottom move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img width="50px" src="{{ asset('liberary/images/hellocash.png') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Hello Cash</h4>
                            <p>Hello Cash is a mobile banking platform developed by Lion International Bank.</p>
                            <a href="https://www.facebook.com/HelloCash/" target="_blank" class="text-button-icon">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <div class="features-item">
                        <div class="features-icon">
                            <img width="50px"  src="{{ asset('liberary/images/amolle.png') }}" alt="">
                        </div>
                        <div class="features-content">
                            <h4>Amolle</h4>
                            <p>Amolle is a mobile banking platform developed by Dashen Bank, be part of dashen bank community.</p>
                            <a href="https://www.facebook.com/MyAmoleOfficial/" target="_blank" class="text-button-icon">
                                Learn More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->

    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="container">
                        <img style="border: solid seagreen 2px; border-radius: 60px;" src="{{ asset('liberary/images/logo.png') }}" class="img img-circle" width="90%" height="90%">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="section-heading">
                         <h2>All In | One</h2>
                    </div>
                    <div class="subscribe-content">
                        <p>Be part of our community, we will help you to live a simple life. We will provide you a simple, elegant, and effective way of bill payment.</p> 
                    </div>
                    <div class="">
                  <a href="{{ route('register') }}" class="main-stroked-button">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->
 
    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>We Are Partners With Many Brands</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{ asset('liberary/images/service-item-01.png') }}" alt="">
                                    <h4>Fast Paymnet</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{ asset('liberary/images/service-item-01.png') }}" alt="">
                                    <h4>Many Services</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{ asset('liberary/images/contact-info-03.png') }}" alt="">
                                    <h4>Many Mobile Banks</h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="service-item">
                                    <img src="{{ asset('liberary/images/contact-info-03.png') }}" alt="">
                                    <h4>Still Growing</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-text-content">
                        <p><a rel="nofollow noopener" href="#" target="_parent">All In One</a> bill paymnet system is an online plateform that lets you pay your monthly bills for different services, we are partners with different service providers.
                        <br>Register<br>ing In our system will help you to organize your bills, it lets you select your own service and mobile banking plateforms too. Be with us and make your life easy . . . Thank you
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->
    <!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Contact Us</h6>
                            <h2>Feel free to keep in touch with us!</h2>
                        </div>
                        <ul class="contact-info">
                            <li><img src="{{ asset('liberary/images/contact-info-01.png') }}" alt="">0947131824</li>
                            <li><img src="{{ asset('liberary/images/contact-info-02.png') }}" alt="">allinone@gmail.com</li>
                            <li><img src="{{ asset('liberary/images/contact-info-03.png') }}" alt="">www.allinone.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="{{ route('suggestionmail') }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name *" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="phone" type="text" id="phone" placeholder="Your Phone" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" id="email" placeholder="Your Email *" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button-icon">Send Message Now <i class="fa fa-arrow-right"></i></button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->
    @endsection