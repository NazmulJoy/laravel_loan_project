@extends('frontend.layout') 

@section('title', 'Loan Type - My Laravel Website')

@section('content')
<main>
    <!-- Banner start -->
    <section class="banner-area-2 loan-banner pt-145" style="background-image: url('{{ asset('assetsfront/img/banner/loan-banner.png') }}')">
        <div class="container">
            <div class="row align-items-center  pt-165 pb-200">
                <div class="col-lg-7 mx-auto">
                    <div class="banner-content text-center">
                        <div class="section-title">
                            <h1 class="wow fadeInUp">Get your loan approved in 3 steps</h1>
                        </div>
                        <a class="theme-btn theme-btn-lg theme-btn-alt mt-50 wow fadeInUp" data-wow-delay='0.2s'
                            href="loan-details.html">
                            Get started <i class="arrow_right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row position-relative pt-70 d-lg-block d-none">
                <div class="col-md-12">
                    <div class="floated-widget">
                        <div class="row gy-4 gy-lg-0 gx-5">
                            <div class="col-lg-4 border-end">
                                <div class="steps-widget pr-30 pl-30 wow fadeInUp" data-wow-delay="0.1s">
                                    <img src="{{asset('assetsfront/img/steps/icon-1.png')}}" alt="icon">
                                    <h4><a href="#">Check Eligibility</a></h4>
                                    <p>Select your loan amount, answer a few questions and get instant loan amount
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4  border-end">
                                <div class="steps-widget pr-30 pl-30 wow fadeInUp" data-wow-delay="0.3s">
                                    <img src="{{asset('assetsfront/img/steps/icon-2.png')}}" alt="icon">
                                    <h4><a href="#">Submit Documents</a></h4>
                                    <p>Share required documents with our representative hassle-free
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="steps-widget pr-30 pl-30 wow fadeInUp" data-wow-delay="0.5s">
                                    <img src="{{asset('assetsfront/img/steps/icon-3.png')}}" alt="icon">
                                    <h4><a href="#">Approval in Principle</a></h4>
                                    <p>Choose the final sanctioned loan offer with the terms that work best for you
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner end -->
    <section class="loan-types-section bg-white pt-80 pb-80" style="margin-top: 80px;">
        <div class="container">
            <!-- Section Title -->
            <div class="saas-section-title text-center mb-60">
                <h2 class="wow fadeInUp">Our <span>Loan Types</span></h2>
                <p class="wow fadeInUp" data-wow-delay="0.2s">
                    Explore our variety of loan options tailored to meet your financial needs.
                </p>
            </div>
    
            <!-- Loan Types Cards -->
            <div class="row gy-5 gx-5">
                @foreach ($loanTypes as $index => $loanType)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ ($index + 1) * 0.2 }}s">
                        <div class="feature-card-widget-8 saas-feature-card loan-type-card text-center">
                            <div class="card-img mb-3">
                                <!-- Replace with a loan type icon or default placeholder -->
                                <img src="{{ asset('img/loan-icons/default-icon.svg') }}" alt="{{ $loanType->name }}" class="img-fluid">
                            </div>
                            <h4 class="card-title">{{ $loanType->name }}</h4>
                            <p class="card-description">{{ $loanType->description }}</p>
                            <ul class="loan-info list-unstyled mt-3">
                                <li><strong>Min Amount:</strong> BDT {{ number_format($loanType->min_amount, 2) }}</li>
                                <li><strong>Max Amount:</strong> BDT {{ number_format($loanType->max_amount, 2) }}</li>
                                <li><strong>Interest Rate:</strong> {{ $loanType->default_interest_rate }}%</li>
                            </ul>
                            <a href="{{ route('loan.details1') }}" class="theme-btn theme-btn-lg mt-4">
                                Apply Now <i class="arrow_right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    
    
    

    <!-- Testimonial start -->
    <section class="pt-140 pb-140 testimonial-area bg_disable">
        <div class="container-fluid px-0">
            <div class="testimonial-slider">
                <div class="single-slider container px-0">
                    <div class="testimonial-widget">
                        <div class="row">
                            <div class="col-4">
                                <div class="author-img">
                                    <img src="{{asset('assetsfront/img/testimonial/img-2.png')}}" alt="image">
                                </div>
                            </div>
                            <div class="col-8 d-flex align-items-center">
                                <div class="testimonial-content">
                                    <div class="watch-button">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=xcJtL7QggTI">
                                            <i class="fa fa-play"></i>
                                            watch the video
                                        </a>
                                    </div>
                                    <h2>Making dreams a reality!</h2>
                                    <p class="pr-lg-60">We were looking for a home of happiness and peace. Thanks to
                                        the
                                        Grihashakti
                                        team, who helped us to realise this dream of ours. Our home has been
                                        very
                                        lucky for us – as we shifted to our new home, prosperity followed!
                                    </p>
                                    <div class="author-info">
                                        <h4>Maxwell Wood</h4>
                                        <span>New York, US</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider container px-0">
                    <div class="testimonial-widget">
                        <div class="row">
                            <div class="col-4">
                                <div class="author-img">
                                    <img src="{{asset('assetsfront/img/testimonial/img-1.png')}}" alt="image">
                                </div>
                            </div>
                            <div class="col-8 d-flex align-items-center">
                                <div class="testimonial-content">
                                    <div class="watch-button">
                                        <a data-fancybox href="https://www.youtube.com/watch?v=xcJtL7QggTI">
                                            <i class="fa fa-play"></i>
                                            watch the video
                                        </a>
                                    </div>
                                    <h2>Making dreams a reality!</h2>
                                    <p class="pr-lg-60">We were looking for a home of happiness and peace. Thanks to
                                        the
                                        Grihashakti
                                        team, who helped us to realise this dream of ours. Our home has been
                                        very
                                        lucky for us – as we shifted to our new home, prosperity followed!
                                    </p>
                                    <div class="author-info">
                                        <h4>Maxwell Wood</h4>
                                        <span>New York, US</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </section>
    <!-- Testimonial end -->
</main>

@endsection