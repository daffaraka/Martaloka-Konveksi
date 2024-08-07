<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <!-- <img src="home/assets/img/logo-menak.png" alt="" class="brand-image " style="opacity: .8"> -->
        <span class="brand-text font-weight-light ml-2">Martaloka Konveksi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item ">
                    <a href="#" class="nav-link active">
                        <!-- <i class="nav-icon fas fa-tachometer-alt"></i>  -->
                        <p>
                            Dashboard
                            <i class="right "></i>
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> -->
                </li>
                {{-- <li class="nav-item">
            <a href="{{route('transaksi.index')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li> --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Transaksi
              </p>
            </a>

          </li> --}}
                <li class="nav-item">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Produk
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <i class="nav-icon fas  fa-bars"></i>
                        <p>
                            Kategori
                            <!-- <i class="fas fa-angle-left right"></i> -->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Manajemen
                            <!-- <i class="fas fa-angle-left right"></i> -->
                        </p>
                    </a>
                </li>


                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <i class="nav-icon fas  fa-bars"></i>
                        <p>
                            Keranjang
                            <!-- <i class="fas fa-angle-left right"></i> -->
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        <i class="nav-icon fas  fa-bars"></i>
                        <p>
                            Transaksi
                            <!-- <i class="fas fa-angle-left right"></i> -->
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
