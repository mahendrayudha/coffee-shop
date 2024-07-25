<div class="th-menu-wrapper">
    <div class="th-menu-area text-center">
        <button class="th-menu-toggle">
            <i class="fal fa-times"></i>
        </button>
        <div class="mobile-logo">
            <a href="index.html">
                <img src="assets/landing_page/img/logo.svg" alt="Pizzan">
            </a>
        </div>
        <div class="th-mobile-menu">
            <ul>
                <li>
                    @if (auth()->user() !== null)
                        <p>Hello, <span>{{ auth()->user()->name }}</span></p>
                    @endif
                </li>
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
                <li>
                    @if (auth()->user() !== null)
                        <form action="/logout" method="POST">
                            @csrf
                            <p>
                                <button class="th-btn style3 mt-3" type="submit">Log Out</button>
                            </p>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Log In</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
