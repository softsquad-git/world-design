<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('user.profile') }}">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.orders') }}">Zamówienia</a>
            </li>
            <li class="nav-item">
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link" style="background: transparent;border: 0;color: red;"><i class="fa fa-sign-out-alt"></i></button>
                </form>
            </li>
        </ul>
    </div>
</nav>
