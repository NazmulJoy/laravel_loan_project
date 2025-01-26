<header class="header">
    <div class="header-menu header-menu-2" id="sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('frontend.home') }}">
                    <img src="{{ asset('assetsfront/img/logo/Logo-2.png') }}" srcset="img/logo/Logo-2@2x.png 2x" alt="logo">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu_toggle">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="hamburger-cross">
                            <span></span>
                            <span></span>
                        </span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav menu ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('frontend.home') }}" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Loan
                            </a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                data-bs-toggle="dropdown"></i>

                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('loan-types') }}">Get loan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loan
                                        Application</a>
                                    <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                        data-bs-toggle="dropdown"></i>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('loan.details1') }}">Step
                                                01</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('personal.details') }}">Step
                                                02</a></li>
                                    
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about.us') }}" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="blog.html" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Blog
                            </a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                data-bs-toggle="dropdown"></i>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog Listing</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog.details') }}">Blog Details</a></li>
                            </ul>
                        </li>

                        
                        @guest
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('my.loan') }}" class="nav-link">My Loan</a>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false" data-bs-toggle="dropdown"></i>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" 
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        
                        @endguest
                    </ul>

                    <!-- Dark Mode Toggle -->
                    <div class="px-2 js-darkmode-btn" title="Toggle dark mode">
                        <label for="something" class="tab-btn tab-btns">
                            <ion-icon name="moon"></ion-icon>
                        </label>
                        <label for="something" class="tab-btn">
                            <ion-icon name="sunny"></ion-icon>
                        </label>
                        <label class="ball" for="something"></label>
                        <input type="checkbox" name="something" id="something" class="dark_mode_switcher">
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
