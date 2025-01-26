@extends('frontend.layout') 

@section('title', 'Home - My Laravel Website')

@section('content')
    
<main>

    <!-- banner section -->
    <section class="banner-area-6">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7">
                    <div class="banner-content wow fadeInRight" data-wow-delay="0.2s">
                        <h1>Simplify all your
                            banking and loan
                            methods.</span>
                        </h1>
                        <p>Our team of experts uses a methodology to
                            identify the credit cards most.</p>
                        <div class="d-flex flex-column flex-sm-row mt-25 subscribe-field">
                            <input type="email" class="form-control me-sm-1" placeholder="Enter Email address">
                            <a href="#" class="input-append theme-btn theme-btn-lg ms-sm-2">Get Started</a>
                        </div>
                        <ul class="list-unstyled feature-list">
                            <li><i class="fas fa-check-circle"></i> Get 30 day free trial</li>
                            <li><i class="fas fa-check-circle"></i> No Spamming</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 text-center text-lg-start">
                    <div class="banner-img">
                        <img class="img-1 wow fadeInLeft" data-wow-delay="0.3s" src="{{ asset('assetsfront/img/home-5/banner-img-1.png') }}"
                            alt="">
                        <img class="img-2 wow fadeInRight" data-wow-delay="0.8s" src="{{ asset('assetsfront/img/home-5/banner-img-2.png') }}"
                            alt="">
                        <img class="img-3 wow fadeInRight" data-wow-delay="1.1s" src="{{ asset('assetsfront/img/home-5/banner-img-3.png') }}"
                            alt="">
                        <img class="img-shape" src="{{ asset('assetsfront/img/home-5/banner-shape.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end-->
    <div class="banner-fact">
        <div class="container">
            <div class="row gy-lg-0 gy-4">
                <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="single-fact">
                        <div class="icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <p>A global customer base from
                            over 120 countries</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="single-fact">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <p>Almost over 250 thousand
                            active users</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInRight mx-auto" data-wow-delay="0.7s">
                    <div class="single-fact">
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <p>10 years worth of experience
                            as a industry expert</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- feature section -->
    <section class="pt-115 pb-105 feature-area-3">
        <div class="container">
            <div class="section-title">
                <span class="short-title-2">OUR Features</span>
                <h1 class="wow fadeInUp">We have better and more feature</h1>
            </div>
            <div class="row gy-4 mt-50">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp" data-wow-delay="0.1s">
                        <img src="{{ asset('assetsfront/img/home-5/feature-icon-1.svg') }}" alt="">
                        <h5>Fast Mobility</h5>
                        <p>Quis dapibus volutpat condi</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp" data-wow-delay="0.3s">
                        <img src="{{ asset('assetsfront/img/home-5/feature-icon-2.svg') }}" alt="">
                        <h5>Term Loan</h5>
                        <p>Quis dapibus volutpat condi</p>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{ asset('assetsfront/img/home-5/feature-icon-3.svg') }}" alt="">
                        <h5>Easy Experience</h5>
                        <p>Quis dapibus volutpat condi</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp" data-wow-delay="0.7s">
                        <img src="{{ asset('assetsfront/img/home-5/feature-icon-4.svg') }}" alt="">
                        <h5>Safe and protected</h5>
                        <p>Quis dapibus volutpat condi</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp" data-wow-delay="0.9s">
                        <img src="{{ asset('assetsfront/img/home-5/feature-icon-5.svg') }}" alt="">
                        <h5>Wordwide</h5>
                        <p>Quis dapibus volutpat condi</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp" data-wow-delay="1.1s">
                        <img src="{{ asset('assetsfront/img/home-5/feature-icon-6.svg') }}" alt="">
                        <h5>One term fees</h5>
                        <p>Quis dapibus volutpat condi</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp" data-wow-delay="1.3s">
                        <img src="{{ asset('assetsfront/img/home-5/feature-icon-7.svg') }}" alt="">
                        <h5>Merchant Payment</h5>
                        <p>Quis dapibus volutpat condi</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="feature-card-widget-9 wow fadeInUp widget-link" data-wow-delay="1.7s">

                        <h1>10+</h1>
                        <a href="#">More features <i class="arrow_right "></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- feature section end-->

    <section class="about-area-2 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInLeft">
                    <div class="text-start">
                        <h1 class="mb-3">Get loan from 3
                            simple process</h1>
                        <p>There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form,</p>
                        <ul class="list-unstyled feature-list">
                            <li> <i class="fas fa-check-circle"></i>It is a long established fact that a reader will
                                be </li>
                            <li> <i class="fas fa-check-circle"></i> It is a long established fact distracted by the
                                readable</li>
                        </ul>
                        <a href="#" class="read-more-btn">
                            <span>Learn about the process</span>
                            <i class="arrow_right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight">
                    <div class="sms-flow">
                        <img class="arrow-1" src="{{ asset('assetsfront/img/home-5/about-arrow-1.png') }}" alt="">
                        <img class="arrow-2" src="{{ asset('assetsfront/img/home-5/about-arrow-2.png') }}" alt="">
                        <img class="msg-1 wow fadeInUp" data-wow-delay="0.1s" src="{{ asset('assetsfront/img/home-5/msg-1.png') }}" alt="">
                        <img class="msg-2" src="{{ asset('assetsfront/img/home-5/msg-2.png') }}" alt="">
                        <img class="msg-3 wow fadeInDown" data-wow-delay="0.3s" src="{{ asset('assetsfront/img/home-5/msg-3.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="row align-items-center gy-4 mt-3">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="card-holder">
                        <div class="shape-1"></div>
                        <div class="shape-2"></div>
                        <img class="img-1 img-fluid" src="{{ asset('assetsfront/img/home-5/card-holder.png') }}" alt="">
                        <img class="img-2 wow fadeInRight" data-wow-delay="0.2s" src="{{ asset('assetsfront/img/home-5/bank-balance.png') }}"
                            alt="">
                    </div>

                </div>
                <div class="col-lg-6 order-lg-2 order-1 wow fadeInRight">
                    <h1 class="mb-3">We have reputable
                        customer relatinships</h1>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly . </p>

                    <div class="customer-num">
                        <div>
                            <h1>50</h1>
                            <span>Parters <br>
                                Included</span>
                        </div>
                        <div>
                            <h1>1M</h1>
                            <span>Total <br>
                                Attendies</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="calculator-area-2">
        <div class="container">
            <div class="section-title">
                <span class="short-title-2">Loan Calculator</span>
                <h1 class="wow fadeInUp text-white">Calculate and confirm your loans</h1>
            </div>
            <div class="calculator-widget-2 mt-50">
                <div class="row gy-lg-0 gy-3">
                    <div class="col-lg-7">
                        <div class="single-calculator-widget wow fadeInUp" data-wow-delay="0.1s">
                            <h4>Loan Calculator</h4>
        
                            <!-- Loan Type Dropdown -->
                            <div class="range-label mt-40">Loan Type</div>
                            <select class="form-select loan-dropdown mb-4" id="loanType" onchange="updateLoanDetails()">
                                <option value="" disabled selected>Select Loan Type</option>
                                @foreach($loanTypes as $loanType)
                                    <option value="{{ $loanType->id }}"
                                        data-min="{{ $loanType->min_amount }}"
                                        data-max="{{ $loanType->max_amount }}"
                                        data-interest="{{ $loanType->default_interest_rate }}">
                                        {{ $loanType->name }}
                                    </option>
                                @endforeach
                            </select>
        
                            <!-- Loan Amount, Duration, and Interest Range Sliders -->
                            <div class="range-label">Loan Amount</div>
                            <div class="single-range">
                                <input type="range" id="loanAmountRange" class="range-slider large-slider" min="0" max="0" value="0" step="10000" oninput="updateCalculation()">
                                <div class="input-group range-output small-value">
                                    <input type="text" id="loanAmount" readonly>
                                    <span class="input-group-text">BDT</span>
                                </div>
                            </div>
                           
                            <div class="range-label">Loan Duration (Years)</div>
                            <div class="single-range">
                                <input type="range" id="loanDurationRange" class="range-slider large-slider" min="1" max="30" value="1" step="1" oninput="updateCalculation()">
                                <div class="input-group range-output small-value">
                                    <input type="text" id="loanDuration" readonly>
                                    <span class="input-group-text">Years</span>
                                </div>
                            </div>
                           
                             <div class="range-label">Interest Rate</div>
                             <div class="single-range">
                                <div class="input-group range-output small-value">
                                     <input type="text" id="interestRate" readonly>
                                     <span class="input-group-text">%</span>
                                 </div>
                             </div>
                        </div>
                    </div>
        
                    
                    <div class="col-lg-5 pl-lg-35">
                        <div class="calculator-result-widget wow fadeInUp" data-wow-delay="0.3s">
                            <div class="pie-wrapper mt-25" id="loan_graph_circle">
                                <div class="label">Total Amount<h2 class="LoanTotalAmount" id="totalLoanAmount">0</h2></div>
                                <div class="pie">
                                    <div class="left-side half-circle"></div>
                                    <div class="right-side half-circle"></div>
                                </div>
                                <div class="circle-border"></div>
                            </div>
                            <div class="graph-indicator">
                                <div><span class="blue-dot"></span> EMI Amount</div>
                            </div>
                            <ul class="loan-calculation list-unstyled">
                                <li>
                                    <span class="label">EMI Amount (Principal + Interest)</span>
                                    <span class="amount LoanTotalAmount" id="emiAmount">0</span>
                                </li>
                                <li>
                                    <span class="label">Interest Payable</span>
                                    <span class="amount" id="interestPayable">0</span>
                                </li>
                                <li>
                                    <span class="label">Loan Duration</span>
                                    <span class="amount LoanTotalDuration" id="displayLoanDuration">0 Years</span>
                                </li>
                                <li>
                                    <span class="label">Your EMI Amount</span>
                                    <span class="amount" id="yourEMIAmount">0</span>
                                </li>
                            </ul>
                            <form action="{{ route('loan.application.personal.details') }}" method="POST">
                                @csrf
                                <input type="hidden" name="loan_type_id" id="hiddenLoanType">
                                <input type="hidden" name="loan_amount" id="hiddenLoanAmount">
                                <input type="hidden" name="loan_duration" id="hiddenLoanDuration">
                                <input type="hidden" name="interest_rate" id="hiddenInterestRate">
                                <!-- In your Loan Calculator page, show "Apply Now" if logged in, else don't show it -->
@if(auth()->check()) 
<button type="submit" class="theme-btn theme-btn-lg mt-20 w-100" id="applyButton"disabled >Apply Now <i class="arrow_right"></i></button>
@else
<!-- Optionally, you can show a message here for the user to log in first -->
<button type="button" class="theme-btn theme-btn-lg mt-20 w-100" id="applyButton" disabled>Apply Now (Please log in) <i class="arrow_right"></i></button>
@endif

                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    

    <!-- Loan section -->
    <section class="loan-slider-area bg-white pb-130 pt-120">
        <div class="container">
            <div class="section-title">
                <span class="short-title-2">Loan types</span>
                <h1 class="wow fadeInUp">We offer a wide variety of loans</h1>
            </div>
            <div class="loan-slider pt-80">
                @foreach ($loanTypes as $loanType)
                    <a href="{{ route('loan.details') }}" class="single-slide">
                        <div class="icon">
                            <img src="{{ asset('assetsfront/img/home-5/loan-type-1.png') }}" alt="">
                        </div>
                      
                        <h4>{{ $loanType->name }}</h4>
                        <p>{{ $loanType->description }}</p>
                    </a>
                @endforeach
            </div>            
        </div>
    </section>
    
    <!-- Loan end section -->

    <!-- About Us section -->
    <section class="about-area-3 bg-white pb-lg-120 pb-60">
        <div class="container">
            <div class="section-title">
                <span class="short-title-2">ABout us</span>
                <h1 class="wow fadeInUp">Learn about how Banca works</h1>
            </div>
            <div class="row align-items-center pt-60 gy-lg-0 gy-4">
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.1s">
                    <div>
                        <h5><span class="round-dot"></span> <span>1.5M</span> Active Customers</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have.
                        </p>
                    </div>
                    <div class="mt-40">
                        <h5><span class="round-dot"></span> <span>30k</span> Business Partners</h5>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="video-tut">
                        <img src="{{ asset('assetsfront/img/home-5/about-us-img.png') }}" alt="">
                        <a class="play-btn" data-fancybox="" href="https://www.youtube.com/watch?v=xcJtL7QggTI"
                            tabindex="0">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us section -->


    <section class="coverage-area">
        <div class="container">
            <div class="section-title">
                <span class="short-title-2">ABout us</span>
                <h1 class="wow fadeInUp">Learn about how Banca works</h1>
            </div>
            <div class="row mt-50 gy-xl-0 gy-4 text-center">
                <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <a href="#" class="country-widget wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="{{ asset('assetsfront/img/home-5/country-1.png') }}" alt="country">
                        <h5>Brazil</h5>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <a href="#" class="country-widget wow fadeInLeft" data-wow-delay="0.3s">
                        <img src="{{ asset('assetsfront/img/home-5/country-2.png') }}" alt="country">
                        <h5>Canada</h5>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <a href="#" class="country-widget wow fadeInLeft" data-wow-delay="0.5s">
                        <img src="{{ asset('assetsfront/img/home-5/country-3.png') }}" alt="country">
                        <h5>Australia</h5>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <a href="#" class="country-widget wow fadeInLeft" data-wow-delay="0.7s">
                        <img src="{{ asset('assetsfront/img/home-5/country-4.png') }}" alt="country">
                        <h5>USA</h5>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <a href="#" class="country-widget wow fadeInLeft" data-wow-delay="0.9s">
                        <img src="{{ asset('assetsfront/img/home-5/country-5.png') }}" alt="country">
                        <h5>South Korea</h5>
                    </a>
                </div>

                <div class="col-xl-2 col-lg-3 col-sm-4 col-6">
                    <a href="#" class="country-widget wow fadeInLeft" data-wow-delay="1.1s">
                        <img src="{{ asset('assetsfront/img/home-5/country-6.png') }}" alt="country">
                        <h5>Bangladesh</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="get-touch-area-2">
        <div class="container">
            <div class="row align-items-center gy-md-0 gy-4">
                <div class="col-md-6">
                    <h1>Get your own
                        personal consultation</h1>
                    <p>There are many variations of passages of Lorem Ipsum available,
                        but the majority have suffered alteration in some form,</p>
                    <div class="consult-num">
                        <div>
                            <h1>1M+</h1>
                            <p>Total Customers</p>
                        </div>
                        <div>
                            <h1>40+</h1>
                            <p>Financial Consultants</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="touch-form">
                        <h3>Get in touch</h3>
                        <form action="">
                            <input class="form-control" type="text" placeholder="Enter full name" required>
                            <input class="form-control" type="email" placeholder="Enter email address" required>
                            <button type="submit" class="theme-btn mt-10">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const loanTypeDropdown = document.getElementById("loanType");
        const loanAmountRange = document.getElementById("loanAmountRange");
        const loanAmount = document.getElementById("loanAmount");
        const loanDurationRange = document.getElementById("loanDurationRange");
        const loanDuration = document.getElementById("loanDuration");
        const interestRate = document.getElementById("interestRate");
        const totalLoanAmount = document.getElementById("totalLoanAmount");
        const emiAmount = document.getElementById("emiAmount");
        const interestPayable = document.getElementById("interestPayable");
        const yourEMIAmount = document.getElementById("yourEMIAmount");
        const displayLoanDuration = document.getElementById("displayLoanDuration");
        const applyButton = document.getElementById("applyButton");

        window.updateLoanDetails = function () {
            const selectedLoanType = loanTypeDropdown.options[loanTypeDropdown.selectedIndex];
            if (!selectedLoanType) return;

            const minAmount = parseInt(selectedLoanType.getAttribute("data-min"), 10);
            const maxAmount = parseInt(selectedLoanType.getAttribute("data-max"), 10);
            const defaultInterest = parseFloat(selectedLoanType.getAttribute("data-interest"));

            loanAmountRange.min = minAmount;
            loanAmountRange.max = maxAmount;
            loanAmountRange.value = minAmount;
            loanAmount.value = minAmount;

            loanDurationRange.min = 1;
            loanDurationRange.max = 10; 
            loanDurationRange.value = 1;
            loanDuration.value = 1;

            interestRate.value = defaultInterest.toFixed(2);

            updateCalculation();
            applyButton.disabled = false;
        };

        window.updateCalculation = function () {
            const principal = parseInt(loanAmountRange.value, 10);
            const duration = parseInt(loanDurationRange.value, 10); 
            const selectedLoanType = loanTypeDropdown.options[loanTypeDropdown.selectedIndex];
            const baseInterestRate = parseFloat(selectedLoanType.getAttribute("data-interest"));

            const dynamicInterestRate = baseInterestRate + duration * 0.50;
            const monthlyRate = dynamicInterestRate / 100 / 12;
            const totalMonths = duration * 12;

            const emi = Math.round((principal * monthlyRate * Math.pow(1 + monthlyRate, totalMonths)) / (Math.pow(1 + monthlyRate, totalMonths) - 1));
            const totalPayable = emi * totalMonths;
            const interest = totalPayable - principal;

            loanAmount.value = principal;
            loanDuration.value = duration;
            interestRate.value = dynamicInterestRate.toFixed(2);
            totalLoanAmount.innerText = totalPayable;
            emiAmount.innerText = emi;
            interestPayable.innerText = interest;
            yourEMIAmount.innerText = emi;
            displayLoanDuration.innerText = `${duration} Years`;

       
            document.getElementById("hiddenLoanType").value = selectedLoanType.value;
            document.getElementById("hiddenLoanAmount").value = principal;
            document.getElementById("hiddenLoanDuration").value = duration;
            document.getElementById("hiddenInterestRate").value = dynamicInterestRate.toFixed(2);
        };
    });
</script>
  
@endsection
