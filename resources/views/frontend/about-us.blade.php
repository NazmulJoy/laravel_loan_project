@extends('frontend.layout')

@section('title', 'About Us - My Laravel Website')

@section('content')
<main>
    <!-- Banner start -->
    <section class="banner-area-2 pt-145" style="background-image: url('{{ asset('assetsfront/img/banner/about-bg.png') }}')">
        <div class="container">
            <div class="row align-items-center pt-130 pb-140">
                <div class="col-xl-6 col-lg-8">
                    <div class="banner-content py-5">
                        <div class="section-title text-start">
                            <span class="short-title wow fadeInUp">ABOUT US</span>
                            <h1 class="wow fadeInUp mb-0" data-wow-delay='0.2s'>Believing, banking and achieving
                                different</h1>
                        </div>
                        <a class="theme-btn-2 theme-btn-primary mt-45 wow fadeInUp" data-wow-delay="0.4s" href="#">
                            <span class="arrow">
                                <span class="horizontal-line"></span>
                            </span>View our 2024 Annual Report
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner end -->

    <section class="bg_white pt-90 pb-160 ">
        <div class="container">
            <div class="description-widget">
                <div class="row">
                    <div class="col-md-4">
                        <div class="desc-title text-end bg_primary">
                            <h2>A journey that started with a belief to Bank Different</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="desc-text pl-lg-10">
                            <p>Banca Bank’s journey started with a single belief to connect people,
                                places and
                                possibilities by doing things others said could not be done. Anchored on this
                                belief,
                                the Bank was founded in 2017 and we are, to date, headquartered in the Mauritius
                                International Financial Centre with a representative office in United States.</p>
                            <p class="mt-20">Banca Bank's core banking and transactional capabilities are also
                                complemented. Banca
                                experienced team and its regional foundation are complemented by the belief and
                                trust
                                our clients have in our ability to connect them to a global banking network to
                                seamlessly achieve their financial aspirations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics start -->
    <section class="statistics-area pt-135 pb-140 bg_disable">
        <div class="container">
            <div class="row gy-lg-0 gy-4 ">
                <div class="col-lg-7">
                    <div class="statistics-widget-2 wow fadeInUp">
                        <div class="row gx-0">
                            <div class="col-7">
                                <div class="statistics-slider h-100">
                                    <div class="widget-content  widget-1">
                                        <h1 class="stat-counter">15,000</h1>
                                        <p>We employ 15,000 people around the world</p>
                                    </div>
                                    <div class="widget-content  widget-1">
                                        <h1 class="stat-counter">10,000</h1>
                                        <p>We employ 15,000 people around the world</p>
                                    </div>
                                    <div class="widget-content  widget-1">
                                        <h1 class="stat-counter">25,000</h1>
                                        <p>We employ 15,000 people around the world</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <img class="img-fluid" src="{{ asset('assetsfront/img/statistics/img-1.png') }}" alt="img">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="statistics-widget-2  wow fadeInUp" data-wow-delay="0.2s">
                        <div class="widget-content widget-2">
                            <h1 class="stat-counter">125</h1>
                            <p>Our colleagues come from 125 different countries</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-30 pb-30 gy-4 gy-lg-0">
                <div class="col-lg-7">
                    <div class="row gy-4 gy-lg-0">
                        <div class="col-lg-4 col-md-6">
                            <div class="statistics-widget-2 wow fadeInRight" data-wow-delay="0.1s">
                                <div class="widget-content widget-3">
                                    <h1 class="stat-counter">75</h1>
                                    <p>More than 75 years in business</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="statistics-widget-2 wow fadeInRight" data-wow-delay="0.3s">
                                <div class="widget-content widget-4">
                                    <h1 class="stat-counter">450</h1>
                                    <p>450 branches worldwide</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <div class="statistics-widget-2 wow fadeInRight" data-wow-delay="0.5s">
                                <div class="widget-content widget-5">
                                    <h1 class="stat-counter">25</h1>
                                    <p>We are present in 25 markets</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ">
                    <div class="statistics-widget-2 wow fadeInRight" data-wow-delay="0.7s">
                        <div class="widget-content widget-6"
                            style="background-image: url('{{ asset('assetsfront/img/statistics/img-2.png') }}')">
                            <h2>Best Consumer Digital Bank</h2>
                            <p>Global Finance 2024</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-4 gy-md-0">
                <div class="col-md-5">
                    <div class="statistics-widget-2 wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="widget-content widget-7"
                            style="background-image: url('{{ asset('assetsfront/img/statistics/img-3.png') }}')">
                            <h1 class="stat-counter">35</h1>
                            <p>Global Finance 2024</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="statistics-widget-2 wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="row gx-0">
                            <div class="col-5">
                                <img class="img-fluid" src="{{ asset('assetsfront/img/statistics/img-6.png') }}" alt="img">

                            </div>
                            <div class="col-7">
                                <div class="widget-content widget-8"
                                    style="background-image: url('{{ asset('assetsfront/img/statistics/img-4.png') }}')">
                                    <h1 class="stat-counter">2</h1>
                                    <p>We’re listed on two of Asia’s largest stock exchanges</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Statistics end -->

    <!-- Recgnition start -->
    <section class="recognition-area bg_white pt-135 pb-140">
        <div class="container">
            <div class="section-title text-start">
                <span class="short-title mt-0 wow fadeInUp">
                    Recognition
                </span>
                <h2 class="mb-0 wow fadeInUp" data-wow-delay="0.2s">Milestones and Accolades</h2>
            </div>

            <div class="recognition-widget pt-70">
                <div class="row gy-4 gy-lg-0">
                    <div class="col-lg-3 col-5">
                        <div class="widget-navigation wow fadeInUp pe-lg-4" data-wow-delay="0.1s">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="2020-tab" data-bs-toggle="tab" href="#twenty"
                                        role="tab" aria-controls="twenty" aria-selected="true">2024</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="2019-tab" data-bs-toggle="tab" href="#nineteen"
                                        role="tab" aria-controls="nineteen" aria-selected="false">2023</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="2018-tab" data-bs-toggle="tab" href="#eighteen"
                                        role="tab" aria-controls="eighteen" aria-selected="false">2022</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="2017-tab" data-bs-toggle="tab" href="#seventeen"
                                        role="tab" aria-controls="seventeen" aria-selected="false">2021</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link " id="2016-tab" data-bs-toggle="tab" href="#sixteen"
                                        role="tab" aria-controls="sixteen" aria-selected="false">2020</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link " id="2015-tab" data-bs-toggle="tab" href="#fifteen"
                                        role="tab" aria-controls="fifteen" aria-selected="false">2019</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link " id="2014-tab" data-bs-toggle="tab" href="#lessfifteen"
                                        role="tab" aria-controls="lessfifteen" aria-selected="false">2018 and
                                        before</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-7">
                        <div class="tab-content wow fadeInUp" data-wow-delay="0.3s" id="myTabContent">
                            <div class="tab-pane fade show active" id="twenty" role="tabpanel"
                                aria-labelledby="2020-tab">
                                <h3>2024</h3>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                            </div>
                            <div class="tab-pane fade" id="nineteen" role="tabpanel" aria-labelledby="2019-tab">
                                <h3>2023</h3>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                            </div>
                            <div class="tab-pane fade" id="eighteen" role="tabpanel" aria-labelledby="2018-tab">
                                <h3>2022</h3>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                            </div>
                            <div class="tab-pane fade" id="seventeen" role="tabpanel" aria-labelledby="2017-tab">
                                <h3>2021</h3>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                            </div>
                            <div class="tab-pane fade" id="sixteen" role="tabpanel" aria-labelledby="2016-tab">
                                <h3>2020</h3>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                            </div>
                            <div class="tab-pane fade" id="fifteen" role="tabpanel" aria-labelledby="2015-tab">
                                <h3>2019</h3>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                            </div>
                            <div class="tab-pane fade" id="lessfifteen" role="tabpanel" aria-labelledby="2014-tab">
                                <h3>2018 and before</h3>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                                <p>The First Mauritian Bank to join the GRI Community</p>
                                <p>Instant account opening with a Customer On-boarding App</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-lg-5 offset-xl-1 pr-lg-35 pl-lg-35">
                        <div class="accolades-widget wow fadeInUp" data-wow-delay="0.5s">
                            <div class="accolades-header d-flex justify-content-between align-items-end">
                                <h2>Awards</h2>
                                <img src="{{ asset('assetsfront/img/recognition/icon.svg')}}" alt="icon">
                            </div>
                            <div class="accolades-content">
                                <ul>
                                    <li class="">
                                        <p class="subtitle">CITI BANK</p>
                                        <p class="text">Straight-Through processing (STP) Excellence Award</p>
                                    </li>
                                    <li class="mt-3">
                                        <p class="subtitle">MARCOM AWARDS</p>
                                        <p class="text">Platinum Winner for ‘The Believers’ Campaign</p>
                                    </li>
                                    <li class="mt-3">
                                        <p class="subtitle">BURJ CEO AWARDS</p>
                                        <p class="text">Most Innovative Bank in Mauritius</p>
                                    </li>
                                    <li class="mt-3">
                                        <p class="subtitle">GLOBAL BRANDS MAGAZINE</p>
                                        <p class="text">Most Innovative Treasury Services</p>
                                        <p class="text">Best Banking Brand in Mauritius</p>
                                        <p class="text">Best Credit Card Rewards Program</p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recgnition end -->

    <!-- Leadership Team start -->
    <section class="leadership-area pt-135 pb-140 bg_disable">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-sm-8">
                    <div class="section-title text-start wow fadeInRight">
                        <span class="short-title mt-0">Leadership</span>
                        <h2 class="mb-0">Meet our leadership team</h2>
                    </div>
                </div>
                <div class="col-sm-4 text-end">
                    <a href="#" class="theme-btn theme-btn-outlined wow fadeInLeft"> see more <i
                            class="arrow_carrot-right "></i></a>

                </div>
            </div>

            <div class="row pt-65 gy-md-0 gy-4">
                <div class="col-lg-4">
                    <div class="single-leadership-widget wow fadeInUp " data-wow-delay="0.1s">
                        <a href="#">
                            <img src="{{ asset('assetsfront/img/leadership/img-1.png')}}" alt="leader-1">
                            <div class="leader-info">
                                <h5>Eldridge Robles</h5>
                                <p>Co-Founder, Conis</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="single-leadership-widget wow fadeInUp " data-wow-delay="0.3s">
                        <a href="#">
                            <img src="{{ asset('assetsfront/img/leadership/img-2.png')}}" alt="leader-2">
                            <div class="leader-info">
                                <h5>Eldridge Robles</h5>
                                <p>Co-Founder, Conis</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-leadership-widget wow fadeInUp " data-wow-delay="0.5s">
                        <a href="#">
                            <img src="{{ asset('assetsfront/img/leadership/img-3.png')}}" alt="leader-3">
                            <div class="leader-info">
                                <h5>Eldridge Robles</h5>
                                <p>Co-Founder, Conis</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Leadership Team end -->

    <!-- Call To Action start -->
    <section class="cta-area-2 pt-80 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="cta-content text-black wow fadeInRight">
                        <h2>Our latest financial results</h2>
                        <p>Access Scotiabank’s latest quarterly results and archived financial documents.</p>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="cta-content mt-3 mt-sm-0 text-sm-end text-center">
                        <a href="#" class="theme-btn wow fadeInLeft">See results</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action end -->
</main>
@endsection
