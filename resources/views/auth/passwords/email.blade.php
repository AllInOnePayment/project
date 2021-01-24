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
                    <div class="col-sm-2"></div>
                    <div class="col-sm-7">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-white text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary text-white">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                    </div>
                    <div class="col-sm-4"></div> 
                    </div>
                </div> 
            </div>
          </div>
          <!-- // Item -->  
        </div>
    </div>  
@endsection
