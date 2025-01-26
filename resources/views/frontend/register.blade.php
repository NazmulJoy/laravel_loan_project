@extends('frontend.layout')

@section('title', 'Register - My Laravel Website')

@section('content')
<section class="banner-area-5" id="banner_animation">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">
                <div class="basic-loan-calculator text-center">
                    <h4>Register</h4>
                    <form action="{{ route('register') }}" method="POST" class="d-flex flex-column">
                        @csrf
                        <div class="mb-3">
                            <label class="label" for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your name"
                                class="form-control" required>
                        </div>
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
                        <div class="mb-3">
                            <label class="label" for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Confirm your password" class="form-control" required>
                        </div>
                        <button type="submit" class="theme-btn w-100">Register</button>
                        <a href="{{ route('login') }}" class="under_link mt-3">Already have an account? Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
