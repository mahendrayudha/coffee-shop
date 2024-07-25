<header class="th-header header-layout4">
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <div class="menu-area">
                <div class="container th-container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img src="assets/landing_page/img/logo-coffee.svg" alt="Pizzan">
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="#menu-section">Menu</a>
                                    </li>
                                    <li>
                                        <a href="#news-section">News</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('comingSoon') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                            <button type="button" class="th-menu-toggle d-inline-block d-lg-none">
                                <i class="far fa-bars"></i>
                            </button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                @if (auth()->user() !== null)
                                    <p class="text-white mb-0"><strong>Hello, {{ auth()->user()->name }}</strong></p>
                                @endif
                                <button type="button" class="icon-btn sideMenuToggler d-none d-xl-block">
                                    <i class="far fa-cart-shopping"></i>
                                    <span class="badge">5</span>
                                </button>
                                @if (auth()->user() !== null)
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <p>
                                            <button class="th-btn style3 mt-3 d-none d-xl-block" type="submit">
                                                LOG OUT
                                            </button>
                                        </p>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="th-btn style3 d-none d-xl-block">LOG IN</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
