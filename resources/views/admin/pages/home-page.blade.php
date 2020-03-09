@extends('layouts.admin')
@section('title')
    {{ config('app.author.name') }}
    - Strona Główna
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
          action="{{ $item->id ? action('Admin\Pages\HomePageController@update', ['id' => $item->id]) : action('Admin\Pages\HomePageController@store') }}"
          enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="text-left"></label>
                <input id="text-left" type="text" class="form-control form-control-sm" value="{{ old('fields.text_left') ? $field->text_left : '' }}"
                       placeholder="Tekst po lewej" name="fields[text_left]">
            </div>
            <div class="col-lg-6">
                <label for="text-right"></label>
                <input id="text-right" type="text" class="form-control form-control-sm" value="{{ old('fields.text_right') ? $field->text_right : '' }}"
                       placeholder="Tekst po prawej" name="fields[text_right]">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="title-first"></label>
                <input id="title-first" type="text" name="fields[title_first]" class="form-control-sm form-control" value="{{ old('fields.title_first') ? $field->title_first : '' }}"
                       placeholder="Pierwszy tytuł">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="image">Zdjęcie w sekcji o mnie</label>
                <input type="file" id="image" name="about_section_img" class="form-control form-control-sm">
                @if(!empty($item) && !empty($item->about_section_img))
                    <img style="width: 100%;" src="{{ $item->getImgAboutSection() }}">
                @endif
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="title-about">Tytuł w sekcji o mnie</label>
                    <input id="title-about" type="text" class="form-control-sm form-control"
                           name="fields[title_about]" placeholder="Tytuł w sekcji about" value="{{ old('fields.title_about') ? $field->title_about : '' }}">
                </div>
                <div class="form-group">
                    <label for="description-about">Opis sekcji o mnie</label>
                    <textarea id="description-about" class="form-control form-control-sm" rows="8"
                              name="fields[description_about]">{{ old('fields.description_about') ? $field->description_about : '' }}</textarea>
                    <script>
                        CKEDITOR.replace('description-about');
                    </script>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-12">
                <label for="title-second"></label>
                <input id="title-second" type="text" class="form-control-sm form-control" value="{{ old('fields.title_second') ? $field->title_second : '' }}"
                       name="fields[title_second]" placeholder="Drugi tytuł">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="info_v_one"></label>
                    <input id="info_v_one" type="text" class="form-control form-control-sm" value="{{ old('fields.info_v_one') ? $field->info_v_one : '' }}"
                           name="fields[info_v_one]" placeholder="Wartość 1">
                </div>
                <div class="form-group">
                    <label for="info_t_one"></label>
                    <input id="info_t_one" type="text" class="form-control-sm form-control" value="{{ old('fields.info_t_one') ? $field->info_t_one : '' }}"
                           name="fields[info_t_one]" placeholder="Tytuł 1">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="info_v_two"></label>
                    <input id="info_v_two" type="text" class="form-control form-control-sm" value="{{ old('fields.info_v_two') ? $field->info_v_two : '' }}"
                           name="fields[info_v_two]" placeholder="Wartość 2">
                </div>
                <div class="form-group">
                    <label for="info_t_two"></label>
                    <input id="info_t_two" type="text" class="form-control-sm form-control" value="{{ old('fields.info_t_two') ? $field->info_t_two : '' }}"
                           name="fields[info_t_two]" placeholder="Tytuł 2">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="info_v_three"></label>
                    <input id="info_v_three" type="text" class="form-control form-control-sm" value="{{ old('fields.info_v_three') ? $field->info_v_three : '' }}"
                           name="fields[info_v_three]" placeholder="Wartość 3">
                </div>
                <div class="form-group">
                    <label for="info_t_three"></label>
                    <input id="info_t_three" type="text" class="form-control-sm form-control" value="{{ old('fields.info_t_three') ? $field->info_t_three : '' }}"
                           name="fields[info_t_three]" placeholder="Tytuł 3">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="info_v_four"></label>
                    <input id="info_v_four" type="text" class="form-control form-control-sm" value="{{ old('fields.info_v_four') ? $field->info_v_four : '' }}"
                           name="fields[info_v_four]" placeholder="Wartość 4">
                </div>
                <div class="form-group">
                    <label for="info_t_four"></label>
                    <input id="info_t_four" type="text" class="form-control-sm form-control" value="{{ old('fields.info_t_four') ? $field->info_t_four : '' }}"
                           name="fields[info_t_four]" placeholder="Tytuł 4">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-sm">Zapisz</button>
    </form>
@endsection
