<!-- Logo -->

<?php

use App\Nama_usaha;

$nama = Nama_usaha::first();
?>
<a href="{{url('nama-usaha')}}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>L</b>S</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>{{$nama->nama}}</b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <!-- Tasks: style can be found in dropdown.less -->

      <!-- User Account: style can be found in dropdown.less -->


      <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning">0</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">You have reservasi</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <li>
                <a href="#">
                  <i class="fa fa-warning text-yellow"></i> tes
                </a>
              </li>
            </ul>
          </li>
          <li class="footer"><a href="{{ url('jadwal-reservasi') }}">View all</a></li>
        </ul>
      </li>

      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{ \Auth::user()->getAvatar() }}" class="user-image" alt="User Image">
          <span class="hidden-xs">{{(Auth::user()->role==1)?'Admin':'Karyawan'}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{ \Auth::user()->getAvatar() }}" class="img-circle" alt="User Image">

            <p>
              {{\Auth::user()->name}}
              <small>{{ \Auth::user()->name }}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="" class="btn btn-default btn-flat menu-sidebar">Profile</a>
            </div>
            <div class="pull-right">
              <a href="{{ url('keluar') }}" class="btn btn-default btn-flat menu-sidebar">Sign out</a>
            </div>
          </li>
        </ul>
      </li>

    </ul>
  </div>

</nav>