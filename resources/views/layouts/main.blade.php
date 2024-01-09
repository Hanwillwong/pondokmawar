<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/logo/logo.png">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <link rel="stylesheet" href=" {{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js') }}">
    <link rel="stylesheet" href=" {{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css') }}">
    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/jquery-3.3.1.slim.min.js') }}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js') }}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"/>
  </head>
  <body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      @include('components.sidebar')
       
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
          @include('components.navbar')
        </header>
        <div class="container-fluid">
          @yield('container')
        </div>
        @include('components.footer')
      </div>
    </div>
    {{-- <script>
      new DataTable('#example');
    </script> --}}
    <script src="{{ url('https://code.jquery.com/jquery-3.7.0.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>