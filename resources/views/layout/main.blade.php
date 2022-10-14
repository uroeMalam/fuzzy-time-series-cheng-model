
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Menarra Finance Dashboard Page" />
    <meta
      name="keywords"
      content="HTML, CSS, JavaScript, Bootstrap, Chart JS"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="hehe" />

    <title>Sistem Informasi Forecasting Pengiriman Barang</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('sweetalert2\dist\sweetalert2.min.css') }}">

    {{-- data tabel --}}
   <link href="{{ asset('datatables.net-bs4\css\dataTables.bootstrap4.css')}}" rel="stylesheet">


    <!-- Scrollbar Custom CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />

    <!-- External CSS -->
    <link
      rel="stylesheet"
      href="{{asset('template')}}/assets/css/styles.css"
      type="text/css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href="{{asset('template')}}/assets/css/main-content.css"
      type="text/css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href="{{asset('template')}}/assets/css/rcss.css"
      type="text/css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href="{{asset('template')}}/assets/css/nav-sidebar.css"
      type="text/css"
      media="screen"
    />

    <!-- CDN Fontawesome -->
    <script
      src="https://kit.fontawesome.com/32f82e1dca.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <!-- Nav Sidebar -->
    <nav
      class="sidebar offcanvas-md offcanvas-start"
      data-bs-scroll="true"
      data-bs-backdrop="false"
    >
      <div class="d-flex justify-content-end m-2 d-block d-md-none">
        <button
          aria-label="Close"
          data-bs-dismiss="offcanvas"
          data-bs-target=".sidebar"
          class="btn p-0 border-0 fs-4"
        >
          <i class="fas fa-close"></i>
        </button>
      </div>
      {{-- <div class=" text-secondary text-center mt-md-4 mb-2">
        <h3>Forcasting</h3>
    </div> --}}
      <div class="d-flex justify-content-center text-primary mt-md-4 mb-2">
        {{-- <h4>Forecasting</h4> --}}
        <img
          src="{{asset('template')}}/assets/images/hehe.png"
          alt="Logo"
          width="140px"
          height="100px"
        />
      </div>
      <div class="pt-2 d-flex flex-column gap-5">
        <div class="menu p-0">
          <p>Forcasting Pengiriman Barang</p>
          <a href="/" class="item-menu nav-link {{ Request::is('/') ? 'active':''}}">
            <i class="icon ic-stats"></i>
            Dashboard
          </a>
          <a href="pengiriman" class="item-menu nav-link {{ Request::is('pengiriman') ? 'active':''}}">
            <i class="icon ic-stats"></i>
            Pengiriman
          </a>
          <a href="grafik" class="item-menu nav-link {{ Request::is('grafik') ? 'active':''}}">
            <i class="icon ic-stats"></i>
            Perhitungan
          </a>
          <a href="perhitungan" class="item-menu nav-link {{ Request::is('perhitungan') ? 'active':''}}">
            <i class="icon ic-stats"></i>
            Grafik Perhitungan
          </a>
          <a href="/logout" class="item-menu nav-link">
            <i class="icon ic-logout"></i>
            Logout
          </a>
        </div>
        {{-- <div class="menu">
          <p>Others</p>
          <a href="#" class="item-menu">
            <i class="icon ic-settings"></i>
            Settings
          </a>
          <a href="#" class="item-menu">
            <i class="icon ic-help"></i>
            Help
          </a>
          <a href="#" class="item-menu">
            <i class="icon ic-logout"></i>
            Logout
          </a>
        </div> --}}
      </div>
    </nav>

    <!-- Main Content -->
    <main class="content">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div>
            <button
              class="sidebarCollapseDefault btn p-0 border-0 d-none d-md-block"
              aria-label="Hamburger Button"
            >
              <i class="fa-solid fa-bars"></i>
            </button>
            <button
              data-bs-toggle="offcanvas"
              data-bs-target=".sidebar"
              aria-controls="sidebar"
              aria-label="Hamburger Button"
              class="sidebarCollapseMobile btn p-0 border-0 d-block d-md-none"
            >
              <i class="fa-solid fa-bars"></i>
            </button>
          </div>
          <div class="d-flex align-items-center justify-content-end gap-4">
            <input
              type="text"
              placeholder="Search"
              class="search form-control"
            />
            <button
              class="btn btn-search d-flex justify-content-center align-items-center p-0"
              type="button"
            >
              <img
                src="{{asset('template')}}/assets/images/ic_search.svg"
                width="20px"
                height="20px"
              />
            </button>
            <img
              src="{{asset('template')}}/assets/images/pos.jpg"
              alt="Photo Profile"
              class="avatar"
            />
            {{-- <p>Admin</p> --}}
          </div>
        </div>
      </nav>
      
      
      <!-- Page content  -->
      @yield('content')
      <!-- page tampilan  -->
      @extends('layout/modal')
    </main>
      
    <!-- Bootstrap JS -->
    {{-- JQUERY KAMPRET AJAX --}}
    <script src="{{asset('template')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
   <script src="{{asset('template')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="{{asset('template')}}/assets/vendor/js-cookie/js.cookie.js"></script>
   <script src="{{asset('template')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
   {{-- <script src="{{asset('template')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script> --}}
   
   {{-- <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"
    ></script>
    
    
    {{-- js mr.riko (my script) --}}
    <script src="{{asset('dist\js\my-script.js') }}"></script>
    <script src="{{ asset('sweetalert2\dist\sweetalert2.min.js') }}"></script>
    
    {{-- data table --}}
    <script src="{{ asset('datatables.net\js\jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('dist\js\datatable\datatable-basic.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script>
      $(document).ready(function () {
        $('.sidebarCollapseDefault').on('click', function () {
          $('.sidebar').toggleClass('active');
          $('.content').toggleClass('active');
        });
      });
    </script>
    <!-- java scripts punya cerita -->
  @stack('page-scripts')
  </body>
</html>
