{{-- <!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head />

<body>

    <!-- ..::  header area start ::.. -->
    <x-sidebar />
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        <x-navbar />
        <!-- ..::  navbar end ::.. -->
        <div class="dashboard-main-body">
            
            <!-- ..::  breadcrumb  start ::.. -->
            <x-breadcrumb title='{{ $title }}' subTitle='{{ $subTitle }}' />
            <!-- ..::  header area end ::.. -->

            @yield('content')
        
        </div>
        <!-- ..::  footer  start ::.. -->
        <x-footer />
        <!-- ..::  footer area end ::.. -->

    </main>

    <!-- ..::  scripts  start ::.. -->
    <x-scripts script="{{ isset($script) ? $script : '' }}" />

    <!-- ..::  scripts  end ::.. -->

</body>

</html> --}}
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @include('admin.components.head')
</head>

<body>

    <!-- ..::  header area start ::.. -->
    <!-- Sidebar -->
    <div class="sidebar">
        @include('admin.components.sidebar')
    </div>
    <!-- ..::  header area end ::.. -->

    <main class="dashboard-main">

        <!-- ..::  navbar start ::.. -->
        <!-- Navbar -->
        <nav class="navbar">
            @include('admin.components.navbar')
        </nav>
        <!-- ..::  navbar end ::.. -->

        <div class="dashboard-main-body">
            
            <!-- ..::  breadcrumb  start ::.. -->
           
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">{{ $title }}</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="http://localhost:8000/dashboard/index" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            {{ $subTitle }}
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium"></li>
                </ul>
            </div>            <!-
            <!-- ..::  breadcrumb end ::.. -->

            @yield('content')
        
        </div>

        <!-- ..::  footer start ::.. -->
        <footer class="footer">
            @include('admin.components.footer')
        </footer>
        <!-- ..::  footer area end ::.. -->

    </main>

    <!-- ..::  scripts start ::.. -->
    @include('admin.components.scripts') <!-- For reusable Blade script content -->

@if(isset($script)) 
    <script src="{{ asset($script) }}"></script> <!-- For dynamic script inclusion -->
@endif

    <!-- ..::  scripts end ::.. -->

</body>

</html>
