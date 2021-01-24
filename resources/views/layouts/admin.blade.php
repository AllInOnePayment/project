@extends('layouts.header')

@section('common')
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link"> 
      <img src="{{ asset('liberary/images/logo2.png') }}" alt="Allin|One Logo" class="brand-image img-circle">
      <span class="brand-text font-weight-light">AllIn<b class="text-primary">1</b> | Admin</span>
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
               <?php
                    $segment = Request::segment(2); 
                ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link 
            @if($segment=='user')
             active
             @endif">
              <i class="nav-icon fa fa-user-circle"></i>
              <p>
                User Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="{{ route('admin.user.index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user.create')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Register User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link  
            @if($segment=='service' || $segment=='manager')
             active
             @endif">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Servicess
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('admin.service.index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.manager.index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Manager</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link 
            @if($segment=='bank')
             active
             @endif">
              <i class="nav-icon fa fa-tasks"></i>
              <p>
                Manage Systems
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.bank.index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Mobile Bank</p>
                </a>
              </li> 
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link
            @if($segment=='information')
             active
             @endif">
              <i class="nav-icon fa fa-info-circle"></i>
              <p>
                Information
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('information')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Users</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('systeminfo')}}" class="nav-link">
                  <i class="nav-icon fa fa-money"></i>
                  <p>System</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="{{ route('transactioninfo')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Transaction history</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          <li class="nav-header">All In | ONE</li>
           
          <li class="nav-item has-treeview">
            <a href="#" class="{{ (request()->is('admin/email*')) ? 'active' : '' }} nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p>
                Send Mail
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="{{ route('sendtocustomer')}}" class="nav-link">
                    <i class="nav-icon fa fa-envelope-square"></i>
                    <p>
                    To Users
                    <span class="right badge badge-danger">email</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('sendmail')}}" class="nav-link">
                    <i class="nav-icon fa fa-envelope-square"></i>
                    <p>
                    To Managers
                    <span class="right badge badge-danger">email</span>
                  </p>
                </a>
              </li>
            </ul> 
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
