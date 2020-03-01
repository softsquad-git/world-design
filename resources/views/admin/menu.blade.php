<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name')  }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ action('Admin\AdminController@index') }}">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="product" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Produkty
                </a>
                <div class="dropdown-menu" aria-labelledby="product">
                    <a class="dropdown-item" href="{{ action('Admin\Products\ProductController@items') }}">Lista</a>
                    <a class="dropdown-item" href="{{ action('Admin\Products\ProductController@create') }}">Dodaj</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="page" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Zamówienia
                </a>
                <div class="dropdown-menu" aria-labelledby="page">
                    <a class="dropdown-item" href="{{ action('Admin\CheckOuts\CheckOutController@items') }}">Lista</a>
                    <a class="dropdown-item" href="#">Oczekujące</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Zrealizowane</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="page" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Strony
                </a>
                <div class="dropdown-menu" aria-labelledby="page">
                    <a class="dropdown-item" href="{{ action('Admin\Pages\PageController@items') }}">Lista</a>
                    <a class="dropdown-item" href="{{ action('Admin\Pages\PageController@create') }}">Dodaj</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ action('Admin\Pages\HomePageController@form') }}">Strona główna</a>
                </div>
            </li>
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="color" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Kolory--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="color">--}}
{{--                    <a class="dropdown-item" href="{{ action('Admin\Colors\ColorController@items') }}">Lista</a>--}}
{{--                    <a class="dropdown-item" href="{{ action('Admin\Colors\ColorController@create') }}">Dodaj</a>--}}
{{--                </div>--}}
{{--            </li>--}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="user" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Użytkownicy
                </a>
                <div class="dropdown-menu" aria-labelledby="user">
                    <a class="dropdown-item" href="{{ action('Admin\Users\UserController@items') }}">Lista</a>
                    <a class="dropdown-item" href="{{ action('Admin\Users\UserController@locked') }}">Zablokowane konta</a>
                    <a class="dropdown-item" href="{{ action('Admin\Users\UserController@news') }}">Nowi użytkownicy</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="category" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategorie
                </a>
                <div class="dropdown-menu" aria-labelledby="category">
                    <a class="dropdown-item" href="{{ action('Admin\Categories\CategoryController@items') }}">Lista</a>
                    <a class="dropdown-item" href="{{ action('Admin\Categories\CategoryController@create') }}">Dodaj</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('Admin\References\ReferenceController@items') }}">Referencje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('Admin\Settings\SettingController@form') }}">Ustawienia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('Admin\Newsletters\NewsletterController@items') }}">Newsletter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('Admin\Shipments\ShipmentPriceController@form') }}">Wysyłka</a>
            </li>
        </ul>
    </div>
</nav>
