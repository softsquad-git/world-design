@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
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
          action="{{ $item->id ? action('Admin\Products\ProductController@update', ['id' => $item->id]) : action('Admin\Products\ProductController@store') }}"
          enctype="multipart/form-data">
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
            <div class="col-lg-8">
                <label for="title">Tytuł</label>
                <input id="title" type="text" class="form-control-sm form-control"
                       name="title" value="{{ old('title') ? old('title') : $item->title }}"
                       placeholder="Wpisz tytuł produktu">
            </div>
            <div class="col-lg-4">
                <label for="category">Kategoria</label>
                <select id="category" name="category_id" class="form-control-sm form-control">
                    <option value=""{{ (old('category_id')=='0' || $item->category_id=='0') ? ' selected="selected"' : '' }} selected>Wybierz kategorię</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"{{ (old('category_id')==$category->id || $item->category_id==$category->id) ? ' selected="selected"' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Krótki opis</label>
            <textarea id="description" name="description" class="form-control" placeholder="Krótki opis produktu">{{ old('description') ? old('description') : $item->description }}</textarea>
            <script>
                CKEDITOR.replace('description');
            </script>
        </div>
        <div class="form-group">
            <label for="content">Treść produktu</label>
            <textarea id="content" name="content" class="form-control" placeholder="Opis produktu">{{ old('content') ? old('content') : $item->content }}</textarea>
            <script>
                CKEDITOR.replace('content');
            </script>
        </div>
        <div class="form-group row">
{{--            <div class="col-lg-6">--}}
{{--                <label for="colors">Wybierz kolory</label>--}}
{{--                <select multiple class="form-control form-control-sm" id="colors" name="colors[]">--}}
{{--                    @foreach($colors as $color)--}}
{{--                        <option value="{{ $color->code }}" style="background: {{ $color->code }}"></option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="col-lg-6">
                <label for="sizes">Wybierz rozmiary</label>
                <select multiple class="form-control-sm form-control" id="sizes" name="sizes[]">
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label for="price">Cena</label>
                <input id="price" name="price" value="{{ old('price') ? old('price') : $item->price }}"
                       class="form-control form-control-sm" placeholder="Cena produktu"
                       type="number" step="0.01">
            </div>
            <div class="col-lg-4">
                <label for="quantity">Ilość</label>
                <input id="quantity" name="quantity" value="{{ old('quantity') ? old('quantity') : $item->quantity }}"
                       class="form-control-sm form-control" placeholder="Ilość produktów" type="number">
            </div>
            <div class="col-lg-4">
                <label for="availability">Czy produkt jest dostępny?</label>
                <select id="availability" class="form-control form-control-sm" name="availability">
                    <option value="1" {{ (old('availability') == '1' || $item->availability == '1') ? ' selected="selected"' : '1' }}>TAK</option>
                    <option value="0" {{ (old('availability') == '0' || $item->availability == '0') ? ' selected="selected"' : '0' }}>NIE</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label for="is_promo">Czy produkt jest w promocji?</label>
                <select id="is_promo" class="form-control form-control-sm" name="is_promo">
                    <option value="0" {{ (old('is_promo') == '0' || $item->is_promo == '0') ? ' selected="selected"' : '0' }}>NIE</option>
                    <option value="1" {{ (old('is_promo') == '1' || $item->is_promo == '1') ? ' selected="selected"' : '1' }}>TAK</option>
                </select>
            </div>
            <div id="is-news" class="col-lg-4">
                <label for="is_news">Czy produkt jest nowością?</label>
                <select id="is_news" class="form-control form-control-sm" name="is_news">
                    <option value="0" {{ (old('is_news') == '0' || $item->is_news == '0') ? ' selected="selected"' : '0' }}>NIE</option>
                    <option value="1" {{ (old('is_news') == '1' || $item->is_news == '1') ? ' selected="selected"' : '1' }}>TAK</option>
                </select>
            </div>
            <div id="old-price" class="col-lg-4">
                <label for="availability">Poprzednia cena</label>
                <input id="old_price" class="form-control-sm form-control" value="{{ old('old_price') ? old('old_price') : $item->old_price }}"
                       placeholder="Poprzednia cena" name="old_price" type="number" step="0.01">
            </div>
        </div>
        <div class="form-group">
            @if($item->id == 0)
                <div class="form-group">
                    <label for="images">Dodaj zdjęcia</label>
                    <input type="file" id="images" class="form-control-sm form-control" name="images[]"
                           multiple>
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-outline-dark btn-sm">Zapisz</button>
    </form>
    @if($item->id > 0)
        @if($item->images->count() > 0)
            <div class="form-group row">
                @foreach($item->images as $image)
                    <div class="col-lg-3">
                        <div id="image-{{ $image->id }}" class="images-form" style="background-image: url({{ $image->getImage() }})">
                            <span id="remove-{{ $image->id }}" class="btn btn-sm btn-danger" title="Usuń"><i class="fa fa-ban"></i> </span>
                        </div>
                    </div>
                    <script>
                        $('#remove-{{ $image->id }}').click(function () {
                            $.ajax({
                                type: 'GET',
                                url: '{{ action('Admin\Products\ProductController@removeImage', ['id' => $image->id]) }}',
                                success: function () {
                                    document.getElementById('image-{{$image->id}}').remove();
                                },
                                error: function () {
                                    alert('Error')
                                }
                            })
                        });
                    </script>
                @endforeach
            </div>
        @endif
        <form method="post" action="{{ action('Admin\Products\ProductController@uploadImages') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $item->id }}" name="item_id">
                <div class="form-group">
                    <label for="images">Dodaj zdjęcia</label>
                    <input type="file" id="images" class="form-control-sm form-control" name="images[]"
                           multiple>
                </div>
            <button class="btn btn-outline-dark btn-sm">Dodaj</button>
        </form>
    @endif
@endsection
<script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#old-price').hide();
        $('#is_promo').on('change', function() {
            if (this.value == '1')
            {
                $("#old-price").show();
                $('#is-news').hide();
            }
            else
            {
                $("#old-price").hide();
                $('#is-news').show();
            }
        });
    });
</script>
