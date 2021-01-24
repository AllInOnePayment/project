<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>All In | One</title>
 
    <link rel="stylesheet" type="text/css" href="{{ asset('liberary/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('liberary/css/font-awesome.css') }}">

    <link rel="stylesheet" href="{{ asset('liberary/css/templatemo-breezed.css') }}">

    <link rel="stylesheet" href="{{ asset('liberary/css/owl-carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('liberary/css/lightbox.css') }}">

    </head>
    
    <body>
      
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav"> 
                        <a href="index.html" class="logo">
                            <ul class="contact-info mb-1">
                            <li><img width="40px" height="20px" src="{{ asset('liberary/images/logo2.png') }}" alt="">.AllIn | ONE</li></ul>
                            
                        </a> 
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="http://127.0.0.1:8000/" class="{{ (request()->is('')) ? 'active' : '' }} nav-link">Home</a></li>
                            <li class="scroll-to-section"><a href="#about" class="{{ (request()->is('http://127.0.0.1:8000/#[object%20Object]')) ? 'active' : '' }} nav-link">About</a></li>
                            <li class="scroll-to-section"><a href="#contact-us" class="{{ (request()->is('http://127.0.0.1:8000/#[object%20Object]')) ? 'active' : '' }} nav-link">Contact Us</a></li> 
                            @guest
                            <li class="nav-item">
                                <a  href="{{ route('login') }}" class="{{ (request()->is('login')) ? 'active' : '' }} nav-link">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a  href="{{ route('register') }}" class="{{ (request()->is('register')) ? 'active' : '' }} nav-link">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-info" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; text-color:red;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->   
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="left-text-content">
                        <p>Copyright &copy; 2020 Allin | One  
                    </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><p>Follow Us</p></li>
                                <li><a rel="nofollow" href="https://fb.com/allinone"><i class="fa fa-facebook"></i></a></li>
                                <li><a rel="nofollow" href="https://fb.com/allinone"><i class="fa fa-twitter"></i></a></li>
                                <li><a rel="nofollow" href="https://fb.com/allinone"><i class="fa fa-linkedin"></i></a></li>
                                <li><a rel="nofollow" href="https://fb.com/allinone"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="{{ asset('liberary/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('liberary/js/popper.js') }}"></script>
    <script src="{{ asset('liberary/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('liberary/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('liberary/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('liberary/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('liberary/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('liberary/js/imgfix.min.js') }}"></script> 
    <script src="{{ asset('liberary/js/slick.js') }}"></script> 
    <script src="{{ asset('liberary/js/lightbox.js') }}"></script> 
    <script src="{{ asset('liberary/js/isotope.js') }}"></script> 
     
    <script src="{{ asset('liberary/js/custom.js') }}"></script> 
  </body>
</html>