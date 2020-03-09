@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Ustawienia
@endsection
@section('content')
    <h3 class="admin-page-title">Ustawienia</h3>
    @if ($errors->any())
        <div class="alert alert-danger w-100">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ $item->id ? action('Admin\Settings\SettingController@update') : action('Admin\Settings\SettingController@store') }}" enctype="multipart/form-data">
        @csrf
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="title-page">Tytuł strony</label>
            <input id="title-page" type="text" value="{{ old('title_page') ?? $item->title_page }}"
                   class="form-control form-control-sm" name="title_page" placeholder="Tytuł witryny"/>
        </div>
        <div class="col-lg-6">
            <label for="logo">Logo</label>
            <input id="logo" type="file" name="logo" class="form-control-sm form-control"/>
        </div>
    </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="hp-img">Zdjęcie w tle na stronie głownej</label>
                <input id="hp-img" type="file" name="homepage_image" class="form-control-sm form-control"/>
            </div>
            <div class="col-lg-6">
                <label for="title-top-home-page">Tytuł nad zdjęciem</label>
                <input id="title-top-home-page" type="text" value="{{ old('title_top_home_page') ?? $item->title_top_home_page }}"
                       class="form-control form-control-sm" name="title_top_home_page" placeholder="Napis na zdjęciu w tle"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="intro-top-home-page">Podpis pod tytułem</label>
                <input id="intro-top-home-page" type="text" value="{{ old('intro_top_home_page') ?? $item->intro_top_home_page }}"
                       class="form-control-sm form-control" name="intro_top_home_page" placeholder="Podpis pod tytułem"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-3">
                <label for="email">E-mail</label>
                <input id="email" type="email" value="{{ old('email') ?? $item->email }}"
                       class="form-control form-control-sm" name="email" placeholder="E-mail"/>
            </div>
            <div class="col-lg-3">
                <label for="phone">Telefon</label>
                <input id="phone" type="text" value="{{ old('phone') ?? $item->phone }}"
                       class="form-control form-control-sm" name="phone" placeholder="Telefon"/>
            </div>
            <div class="col-lg-3">
                <label for="location">Lokalizacja</label>
                <input id="location" type="text" name="location" value="{{ old('location') ?? $item->location }}"
                       class="form-control-sm form-control" placeholder="Lokalizacja"/>
            </div>
            <div class="col-lg-3">
                <label for="fb">Facebook URL</label>
                <input id="fb" type="text" name="fb_url" value="{{ old('fb_url') ?? $item->fb_url }}"
                       class="form-control form-control-sm" placeholder="Link do fb"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label for="locale">Czy wyświetlać logo?</label>
                <select id="is_promo" class="form-control form-control-sm" name="is_logo">
                    <option
                        value="1" {{ (old('is_logo') == '1' || $item->is_logo == '1') ? ' selected="selected"' : '1' }}>
                        Tak
                    </option>
                    <option
                        value="0" {{ (old('is_logo') == '0' || $item->is_logo == '0') ? ' selected="selected"' : '0' }}>
                        Nie
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-outline-secondary btn-sm" type="submit">Zapisz</button>
        </div>
    </form>
@endsection
