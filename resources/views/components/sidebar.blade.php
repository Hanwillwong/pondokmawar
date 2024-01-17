<!-- Sidebar Start -->
<aside class="left-sidebar" style="width: 220px;">
    <!-- Sidebar scroll-->
      <div class="brand-logo d-flex align-items-center justify-content-between">
          <p class="fs-4 mt-4">
            <b>Pondok Mawar</b>
          </p>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse" style="margin-top: -20px; margin-right: -10px;">
            <i class="bi bi-x"></i>
          </div>
          {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <span class="fs-4">Pondok Mawar</span>
          </a> --}}
        {{-- </a> --}}
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav" data-simplebar="">
        <ul id="sidebarnav" style="margin-left: -20px; margin-right: 10px;">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Product</span>
          </li> 
        @if (Gate::check('admin') || Gate::check('owner'))
          <li class="sidebar-item">
            <a class="sidebar-link text-decoration-none" href="/product/create" aria-expanded="false">
              <span>
                <i class="bi bi-columns-gap"></i>
              </span>
              <span class="hide-menu">Tambah Barang</span>
            </a>
          </li>
        @endif
          <li class="sidebar-item">
            <a class="sidebar-link text-decoration-none" href="/product" aria-expanded="false">
              <span>
                <i class="bi bi-columns-gap"></i>
              </span>
              <span class="hide-menu">List Barang</span>
            </a>
          </li>
          @if (Gate::check('owner'))
          {{-- <li class="sidebar-item">
            <a class="sidebar-link text-decoration-none" href="./index.html" aria-expanded="false">
              <span>
                <i class="bi bi-journal-text"></i>
              </span>
              <span class="hide-menu">History</span>
            </a>
          </li> --}}
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">AUTH</span>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link text-decoration-none" href="/api/login" aria-expanded="false">
              <span>
                <i class="bi bi-box-arrow-in-left"></i>
              </span>
              <span class="hide-menu">Login</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link text-decoration-none" href="/api/register" aria-expanded="false">
              <span>
                <i class="bi bi-person-plus"></i>
              </span>
              <span class="hide-menu">Register</span>
            </a>
          </li> --}}
          <li class="sidebar-item">
            <a class="sidebar-link text-decoration-none" href="/admin" aria-expanded="false">
              <span>
                <i class="bi bi-person-plus"></i>
              </span>
              <span class="hide-menu">User</span>
            </a>
          </li>
          @endif
          <hr width="90%">
          <li class="sidebar-item">
            <i class="bi bi-person-circle fa-lg"></i>
            <strong>{{ auth()->user()->name }}</strong>
          </li>
          <hr width="90%">
          <form action="{{ url('/api/logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger justify-content-center d-flex" type="submit">Logout</button>
          </form>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
      <!-- End Sidebar scroll-->
  </aside>