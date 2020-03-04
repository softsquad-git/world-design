<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            @if(!empty(Setting::isLogo()))
                <img src="{{ Setting::getLogo() }}" alt="{{ Setting::getTitlePage() }}">
                @else
                {{ Setting::getTitlePage() }}
            @endif
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">@lang('navbar.home')</a></li>
                <li class="nav-item"><a href="{{ route('shops') }}" class="nav-link">@lang('navbar.shop')</a></li>
                @foreach(Page::getPagesTop()->slice(0, 2) as $page)
                    <li class="nav-item"><a href="{{ route('page', ['alias' => $page->alias]) }}" class="nav-link">{{ $page->title }}</a></li>
                @endforeach
                @if(Page::getPagesTop()->count() > 2)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="page" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-newspaper"></i></a>
                        <div class="dropdown-menu" aria-labelledby="page">
                            @foreach(Page::getPagesTop()->slice(2, 100) as $page)
                                <a class="dropdown-item" href="{{ route('page', ['alias' => $page->alias]) }}">{{ $page->title }}</a>
                            @endforeach
                        </div>
                    </li>
                @endif
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">@lang('navbar.contact')</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="auth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu" aria-labelledby="auth">
                        @auth
                            @if(Auth::user()->role == 'R_ADMIN')
                                <a class="dropdown-item" href="{{ route('admin') }}">{{ Auth::user()->name }}</a>
                            @else
                                <a class="dropdown-item" href="{{ route('user.profile') }}">{{ Auth::user()->name }}</a>
                            @endif
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">@lang('navbar.logout')</button>
                            </form>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">@lang('navbar.login')</a>
                            <a class="dropdown-item" href="{{ route('register') }}">@lang('navbar.register')</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item cta cta-colored"><a href="{{ route('basket') }}" class="nav-link"><span class="icon-shopping_cart"></span>({{ Basket::countProductsInBasket() }})</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="lang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i></a>
                    <div class="dropdown-menu" aria-labelledby="lang">
                        <a class="dropdown-item" href="{{ url('locale/pl') }}"><img src="{{ asset('assets/flags/pl.png') }}"></a>
                        <a class="dropdown-item" href="{{ url('locale/en') }}"><img src="{{ asset('assets/flags/en.png') }}"></a>
                        <a class="dropdown-item" href="{{ url('locale/ru') }}"><img src="{{ asset('assets/flags/ru.png') }}"></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
