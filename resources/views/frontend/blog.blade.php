@extends('frontend.layout')

@section('title', 'Blog - My Laravel Website')

@section('content')
<main>
    <!-- BreadCrumb start-->
    <section class="breadcrumb-area" id="banner_animation2">
        <div class="breadcrumb-widget breadcrumb-widget-2  pt-200 pb-145"
            style="background-image: url('{{asset('assetsfront/img/breadcrumb/bg-3.jpg')}}');">

            <div class="shapes">
                <div class="one-shape shape-1" data-parallax='{"x": 100, "y": 0, "rotateZ":0}'>
                    <img src="{{asset('assetsfront/img/breadcrumb/Polygon-1.png')}}" alt="shape">
                </div>
                <div class="one-shape shape-2" data-parallax='{"x": 200, "y": 50, "rotateZ":0}'>
                    <img src="{{asset('assetsfront/img/breadcrumb/Polygon-2.png')}}" alt="shape">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="breadcrumb-content pt-50">
                            <h1>Blog</h1>
                            <div class="search-box mt-20">
                                <form action="#">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Search for topic...">
                                        <button class="search-btn input-group-append"> <i class="icon_search "></i>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div
                                class="popular-tags d-flex flex-wrap justify-content-center align-items-center mt-20">
                                <span>Popular Tags:</span>
                                <a href="#">Business</a>
                                <a href="#">Financial</a>
                                <a href="#">Case Study</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BreadCrumb end-->


    <!-- Blog Posts start-->
    <section class="pt-120 pb-120 bg_disable">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ">
                    <div class="blog-post-widget">
                        <div class="row gy-4 ">
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-1.png')}}" alt="blog-img">
                                        <div class="catagory bg_primary">buisiness</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">Five Steps to Buying for Your Home Loan</a>
                                        </h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-2.png')}}" alt="blog-img">
                                        <div class="catagory yellow-bg">loan</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">How To Save Enough Money To Buy A Home</a>
                                        </h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-3.png')}}" alt="blog-img">
                                        <div class="catagory green-bg">Securiey</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">Create A WordPress Multi Step Form</a></h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-4.png')}}" alt="blog-img">
                                        <div class="catagory sky-bg">buisiness</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">What Happens to Your Debt When You Die?</a>
                                        </h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-5.png')}}" alt="blog-img">
                                        <div class="catagory deep-green-bg">banking</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">How Do Banca Banks Make Money?</a></h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-6.png')}}" alt="blog-img">
                                        <div class="catagory yellow-bg">loan</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">Finance Your Property in a Market</a></h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-7.png')}}" alt="blog-img">
                                        <div class="catagory violet-bg">finances</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">How our revamped API can help your
                                                finances</a></h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-8.png')}}" alt="blog-img">
                                        <div class="catagory violet-bg">finances</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">Linking your finances and your business</a>
                                        </h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-9.png')}}" alt="blog-img">
                                        <div class="catagory bg_primary">buisiness</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">Why Set Impossible Goals for 2021?</a></h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="blog-img">
                                        <img src="{{asset('assetsfront/img/blog/blog-10.png')}}" alt="blog-img">
                                        <div class="catagory yellow-bg">loan</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4><a href="blog-details.html">How Banca elevated the design to code.</a>
                                        </h4>
                                        <p>Cup of char brilliant horse play bro bread sloshed lavatory only...</p>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{asset('assetsfront/img/blog/user-profile.svg')}}" alt="user profile">
                                                <span>Zain Siphron</span>
                                            </div>
                                            <div class="post-date">
                                                <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calendar">
                                                <span>March 18, 2021</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-55">
                            <div class="col-12">
                                <div class="pagination-widget">
                                    <ul>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"> <i class="arrow_carrot-right "></i> </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ps-xl-5 mt-5 mt-lg-0">
                    <div class="blog-sidebar-widget ps-lg-2">
                        <div class="widget-subscribe">
                            <h4 class="widget-title mb-15">Subscribe to our blog</h4>
                            <p>Get the latest posts in your email</p>

                            <form action="#" class="mt-15">
                                <input class="form-control" type="text" placeholder="Enter your email">
                                <button class="theme-btn w-100 mt-30" type="submit">Subscribe</button>
                            </form>


                        </div>

                        <div class="widget-social mt-40">
                            <div class="row text-center gx-3 gy-3 gy-md-0">
                                <div class="col-md-4">
                                    <a href="#">
                                        <img src="{{asset('assetsfront/img/social/facebook-logo.svg')}}" alt="faceebook">
                                        <h6>815.5K</h6>
                                        <span>Fans</span>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#">
                                        <img src="{{asset('assetsfront/img/social/twitter.svg')}}" alt="twitter">
                                        <h6>107.2K</h6>
                                        <span>Followers</span>
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="#">
                                        <img src="{{asset('assetsfront/img/social/youtube.svg')}}" alt="youtube">
                                        <h6>90.6K</h6>
                                        <span>Subscribers</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="widget-catagory mt-55">
                            <h4 class="widget-title mb-20">Categories</h4>

                            <ul>
                                <li><a href="#">Business<span>(10)</span></a> </li>
                                <li><a href="#">Loan<span>(9)</span></a> </li>
                                <li><a href="#">Financial<span>(12)</span></a> </li>
                                <li><a href="#">Bank Transfer<span>(07)</span></a> </li>
                                <li><a href="#">Technology<span>(06)</span></a> </li>
                                <li><a href="#">Security<span>(11)</span></a> </li>
                                <li><a href="#">Privacy<span>(05)</span></a> </li>
                            </ul>
                        </div>

                        <div class="widget-news mt-50">
                            <h4 class="widget-title">Reacent News</h4>

                            <ul class="recent-post">
                                <li>
                                    <img src="{{asset('assetsfront/img/blog/recent-post-1.png')}}" alt="recent-post">
                                    <div class="news-content">
                                        <h6><a href="#">Is It Worth Buying A Premium Form Builder.</a></h6>
                                        <div class="post-date">
                                            <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calender">
                                            <span>March 18, 2021</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{asset('assetsfront/img/blog/recent-post-2.png')}}" alt="recent-post">
                                    <div class="news-content">
                                        <h6><a href="#">10 Classic Summer Vacations</a></h6>
                                        <div class="post-date">
                                            <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calender">
                                            <span>March 18, 2021</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{asset('assetsfront/img/blog/recent-post-3.png')}}" alt="recent-post">
                                    <div class="news-content">
                                        <h6><a href="#">How To Easily Add weForms Widget Using Elementor</a></h6>
                                        <div class="post-date">
                                            <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calender">
                                            <span>March 18, 2021</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <img src="{{asset('assetsfront/img/blog/recent-post-4.png')}}" alt="recent-post">
                                    <div class="news-content">
                                        <h6><a href="#">How to Create GDPR Consent Form In WordPress</a></h6>
                                        <div class="post-date">
                                            <img src="{{asset('assetsfront/img/blog/calendar-outline.svg')}}" alt="calender">
                                            <span>March 18, 2021</span>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="widget-tags mt-50">
                            <h4 class="widget-title mb-0">Tags</h4>

                            <div class="tags d-flex flex-wrap mt-30">
                                <a href="#">Banking</a>
                                <a href="#">web design</a>
                                <a href="#">ui/ux</a>
                                <a href="#">saas</a>
                                <a href="#">software</a>
                                <a href="#">creative</a>
                                <a href="#">product</a>
                                <a href="#">development</a>
                                <a href="#">design</a>
                                <a href="#">sequrity</a>
                                <a href="#">agency</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Posts end-->
</main>
@endsection