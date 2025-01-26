@extends('frontend.layout')

@section('title', 'Login - My Laravel Website')

@section('content')
<section class="banner-area-5" id="banner_animation">
    <div class="bg-shapes">
        <div class="shape" data-parallax='{ "x": -30,"y": 90,"rotateZ":50}'>
            <img class="layer" data-depth="-0.06" src="{{ asset('assetsfront/img/home-4/shape-2.png') }}" alt="">
        </div>
        <div class="shape" data-parallax='{ "y": -250}'>
            <img class="layer" data-depth="-0.15" src="{{ asset('assetsfront/img/home-4/shape-3.png') }}" alt="">
        </div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="basic-loan-calculator text-center">
                    <h4>Login</h4>
                    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <h6>{{ $error }}</h6>
        @endforeach
    </div>
@endif
                    <form action="{{ route('login') }}" method="POST" class="d-flex flex-column">
                        @csrf
                        <div class="mb-3">
                            <label class="label" for="email">Email Address</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email"
                                class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="label" for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                class="form-control" required>
                        </div>
                        <button type="submit" class="theme-btn w-100">Login</button>
                        <a href="{{ route('register') }}" class="under_link mt-3">Don't have an account? Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
