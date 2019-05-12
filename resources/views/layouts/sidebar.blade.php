<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="danger" data-background-color="black" data-image="/assets/img/sidebar-2.jpg">
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Stok Opname
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li {{ (request()->is('home')) ? 'class=active' : '' }}>
            <a class="nav-link" href="{{url('home')}}">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li {{ (request()->is('pegawai')) ? 'class=active' : '' }} >
            <a class="nav-link" href="{{ url('/pegawai') }}"">
              <i class="material-icons">content_paste</i>
              <p>Table Pegawai</p>
            </a>
          </li>
           <li {{ (request()->is('barang')) ? 'class=active' : '' }}>
            <a class="nav-link" href="{{ url('/barang') }}">
              <i class="material-icons">content_paste</i>
              <p>Table Daftar Barang</p>
            </a>
          </li>
          <li {{ (request()->is('sales')) ? 'class=active' : '' }}>
            <a class="nav-link" href="{{ url('/sales') }}">
              <i class="material-icons">content_paste</i>
              <p>Table Sales</p>
            </a>
          </li>
          <li {{ (request()->is('barang_in')) ? 'class=active' : '' }}>
            <a class="nav-link" href="{{ url('/barang_in') }}">
              <i class="material-icons">content_paste</i>
              <p>Table Barang Masuk</p>
            </a>
          </li>
          <li {{ (request()->is('barang_out')) ? 'class=active' : '' }}>
            <a class="nav-link" href="{{ url('/barang_out') }}">
              <i class="material-icons">content_paste</i>
              <p>Table Barang Out</p>
            </a>
          </li>
          <li {{ (request()->is('persediaan')) ? 'class=active' : '' }}>
            <a class="nav-link" href="{{ url('/persediaan') }}">
              <i class="material-icons">content_paste</i>
              <p>Table Persediaan Barang</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
