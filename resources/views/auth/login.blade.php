@extends('layouts.guest')
 
 @section('content')  
<div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item">
            <div class="img-fill">
                <img src="{{ asset('liberary/images/slide-01.jpg') }}" alt="">
                        <div class="text-content">
                <div class="row">
                    <div class="col-sm-3">
                        <img width="100px" height="100px"  src="{{ asset('liberary/images/logo.png') }}" style="opacity: .3;">
                    </div>
                    <div class="col-sm-6 m-1" style="border-radius: 25px; border:solid seagreen 2px;"><br>
                      <form method="POST" action="{{ route('login') }}">
                            @csrf 
                            <div class="form-group row">
                                <label for="email" class="col-md-4 text-white col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 text-white  col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white " for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-white " href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                      </form> <br>
                    </div>
                    <div class="col-sm-3"></div>
                    </div>
                </div> 
            </div>
          </div>
          <!-- // Item -->  
        </div>
    </div> 
@endsection
