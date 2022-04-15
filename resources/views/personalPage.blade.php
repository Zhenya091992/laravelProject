@extends('layauts.app')

@section('title')
    Personal page
@endsection

@section('header')
    @include('inc.header')
@endsection

@section('body')
    <div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0">
        <h2>Welcome {{$name}}</h2>
    </div>
@endsection

@section('footer')
    @include('inc.footer')
@endsection
