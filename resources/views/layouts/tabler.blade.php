<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title', 'Retema')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/vintage.css') }}" rel="stylesheet"/>
  </head>
  <body>
    <div class="page">
      <!-- Sidebar -->
      @include('layouts.partials.sidebar')
      
      <!-- Navbar -->
      @include('layouts.partials.header')
      
      <div class="page-wrapper">
        <!-- Page Header -->
        @if(View::hasSection('page-header'))
        <div class="page-header d-print-none">
          <div class="container-xl">
            @yield('page-header')
          </div>
        </div>
        @endif

        <!-- Page Body -->
        <div class="page-body">
          <div class="container-xl">
            @yield('content')
          </div>
        </div>

        @include('layouts.partials.footer')
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    @stack('scripts')
  </body>
</html>
