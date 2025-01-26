<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.components.css') 
    <title>@yield('title', 'Default Title')</title>
    <link rel="shortcut icon" href="{{ asset('/assetsfront/img/favicon.png') }}" type="image/x-icon">
    
</head>
<body>
    @include('frontend.components.header') 

    <main>
        @yield('content') 
    </main>

    @include('frontend.components.footer') 
    @include('frontend.components.script') 
</body>
</html>
