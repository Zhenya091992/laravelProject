@extends('layauts.app')

@section('title')
    Admin page
@endsection

@section('header')
    header
@endsection

@section('body')
    @foreach ($tables as $table)
        <a href="{{ route('adminTable', ['nameTable' => $table->name]) }}">{{ $table->name }}</a><br>
    @endforeach
@endsection

@section('footer')
    footer
@endsection
