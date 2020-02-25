@extends('layouts.app')
@section('meta')
    <title>Lista referencji</title>
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big">Referencje</h1>
            </div>
        </div>
        <div class="row">
            @foreach($data as $row)
                <div class="col-lg-12">
                    <div class="references">
                        <div class="content">
                            {{ $row->reference }}
                        </div>
                        <div class="footer">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="name">
                                        {{ $row->name }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="created text-right">
                                        {{ $row->created_at }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
