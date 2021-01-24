@extends('layouts.header')

@section('common')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link"> 
      <img src="{{ asset('liberary/images/logo2.png') }}" alt="Allin|One Logo" class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AllIn<b class="text-primary">1</b> | User</span>
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- This funcion will be used to check the URI and make the approprate tab active, segment is the variable that holds the name of the current uri  -->
                
          <li class="nav-item has-treeview">
            <a href="{{ route('user')}}" class="{{ (request()->is('user')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                 Home Page 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('notfication')}}" class="{{ (request()->is('user/notfication*')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Notfication 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('userBill')}}" class="{{ (request()->is('user/bill*')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Bill 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('register.users')}}" class="{{ (request()->is('user/register*')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Service 
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('seehistory')}}" class="{{ (request()->is('user/history*')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Payment History 
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="{{ route('seetransaction')}}" class="{{ (request()->is('user/transaction*')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Transaction History 
              </p>
            </a>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
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
