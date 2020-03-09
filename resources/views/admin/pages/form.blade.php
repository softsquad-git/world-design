@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Dodaje stronę
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger w-100">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post"
          action="{{ $item->id ? action('Admin\Pages\PageController@update', ['id' => $item->id]) : action('Admin\Pages\PageController@store') }}">
        @csrf
        <div class="form-group row">
            <div class="col-lg-4">
                <label for="locale">Wybierz język</label>
                <select id="is_promo" class="form-control form-control-sm" name="locale">
                    <option value="pl" {{ (old('locale') == 'pl' || $item->locale == 'pl') ? ' selected="selected"' : 'pl' }}>PL (Polski)</option>
                    <option value="en" {{ (old('locale') == 'en' || $item->locale == 'en') ? ' selected="selected"' : 'en' }}>EN (Angielski)</option>
                    <option value="ru" {{ (old('locale') == 'ru' || $item->locale == 'ru') ? ' selected="selected"' : 'ru' }}>RU (Rosyjski)</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="title">Tytuł</label>
                <input id="title" name="title" type="text" class="form-control form-control-sm" value="{{ old('title') ?? $item->title }}"
                       placeholder="Wpisz tytuł strony">
            </div>
            <div class="col-lg-6">
                <label for="alias">Alias</label>
                <input id="alias" name="alias" type="text" class="form-control-sm form-control" value="{{ old('alias') ?? $item->alias }}"
                       placeholder="Alias zawsze musi być unikalny">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="content">Treść</label>
                <textarea id="content" name="content">{{ old('content') ?? $item->content }}</textarea>
                <script>
                    window.onload = function() {
                        CKEDITOR.replace( 'content', {
                            filebrowserUploadUrl: '{{ action('Admin\Pages\PageController@uploadFileContent', ['_token' => csrf_token()]) }}',
                            filebrowserUploadMethod: 'form'
                        });
                    };
                </script>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="menu-position">Pozycja w menu</label>
                <input id="menu-position" type="number" class="form-control form-control-sm" placeholder="Kolejność wyświetlania w menu" name="menu_position" value="{{ old('menu_position') ?? $item->menu_position }}">
            </div>
        </div>
        <div class="form-group">
            <label for="meta-title">Meta tytuł</label>
            <input id="meta-title" type="text" class="form-control-sm form-control" name="meta_title" value="{{ old('meta_title') ?? $item->meta_title }}"
                   placeholder="Meta tytuł">
        </div>
        <div class="form-group">
            <label for="keywords">Słowa kluczowe</label>
            <input id="keywords" type="text" class="form-control-sm form-control" name="meta_keywords" value="{{ old('meta_keywords') ?? $item->meta_keywords }}"
                   placeholder="Słowa kluczowe">
        </div>
        <div class="form-group">
            <label for="description">Opis</label>
            <textarea id="description" class="form-control" rows="3" placeholder="Meta opis" mame="meta_description">{{ old('meta_description') ?? $item->meta_description }}</textarea>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-sm">Zapisz</button>
    </form>
@endsection
