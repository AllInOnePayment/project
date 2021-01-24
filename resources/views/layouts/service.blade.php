@extends('layouts.header')

@section('common')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo --> 
    <a href="#" class="brand-link">
      <img src="{{ asset('liberary/images/logo2.png') }}" alt="Allin|One Logo" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{session()->get('service_name')}}</span>
    </a>    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('userprofile')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
    <!-- Sidebar -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
          $segment=Request::segment(1);
          $segment2=Request::segment(2);
          ?>
          <li class="nav-item">
            <a href="{{route('ServiceUser.index')}}" class="nav-link 
            @if($segment=='ServiceUser' && !$segment2)
            active
            @endif
            ">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ServiceUser.create')}}" class="nav-link
            @if($segment=='ServiceUser' && $segment2=='create')
            active
            @endif">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                Register User 
              </p>
            </a>
          </li> 
          </li>
          <li class="nav-item">
            <a href="{{ route('ServiceBill.index') }}" class="nav-link
            @if($segment=='ServiceBill')
            active
            @endif">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Send Bills 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ServiceNotification.index') }}" class="nav-link
            @if($segment=='ServiceNotification')
            active
            @endif">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                 Send Notfication 
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ route('ServiceNews.index') }}" class="{{ (request()->is('ServiceNews*')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-rss-square"></i>
              <p>
                Send News 
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ route('History.index') }}" class="{{ (request()->is('service/History*')) ? 'active' : '' }} nav-link">
              
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Payment History
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('Mail.index') }}" class="{{ (request()->is('service/Mail*')) ? 'active' : '' }} nav-link">
              
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Send Email
              </p>
            </a>
          </li> 
        </ul>
      </nav>
    </div>
      <!-- /.sidebar-menu --> 
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
      @include('flash::message')
    </div>
    @yield('content')
  </div>

@endsection
