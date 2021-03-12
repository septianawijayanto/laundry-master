<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ \Auth::user()->getAvatar() }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{\Auth::user()->name}}</p>

      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="{{ url('/beranda')}}">
          <i class="fa fa-home"></i> <span>Beranda</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      @if(\Auth::user()->role == 1)
      <li>
        <a href="{{ url('/paket-laundry') }}">
          <i class="fa fa-firefox"></i> <span>Paket Laundry</span>
          <span class=" pull-right-container">
          </span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Master User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="fa fa-circle-o"></span> Customer</span></a></li>

          <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-circle-o"></span> Karyawan</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-reorder"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="menu-sidebar"><a href="{{ url('/status-pesanan') }}"><span class="fa fa-circle-o"></span> Status Pesanan</span></a></li>

          <li class="menu-sidebar"><a href="{{ url('/status-pembayaran') }}"><span class="fa fa-circle-o"></span> Status Pembayaran</span></a></li>

        </ul>
      </li>
      @endif
      <li>
        <a href="{{ url('/transaksi-pesanan') }}">
          <i class="fa  fa-edit"></i> <span>Transaksi Pesanan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ url('laporan')}}">
          <i class="fa  fa-file-o"></i> <span>Laporan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li>
        <a href="{{ url('/keluar')}}">
          <i class="glyphicon glyphicon-log-out"></i> <span>Logout</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>