@extends('layouts.app')
@section('meta')
    <title>@lang('auth.blade.new_password.title')</title>
@endsection
@section('content')
    <div class="hero-wrap hero-bread mb-5" style="background-image: url({{ asset('assets/front/images/bg_6.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">@lang('auth.blade.new_password.title')</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('login') }}">@lang('auth.blade.login.title')</a></span>
                        <span><a href="{{ route('register') }}">@lang('auth.blade.register.title')</a> </span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('auth.blade.new_password.title')</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.reset') }}">
                            @csrf
                            <input type="hidden" value="{{ $_token }}" name="_token_v"/>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">@lang('auth.blade.new_password.password')</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('auth.blade.new_password.next')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
