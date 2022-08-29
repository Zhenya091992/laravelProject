@extends('layauts.app')

@section('title')
    Admin page
@endsection

@section('header')
    header
@endsection

@section('body')
    <table class="table text-white">
        <thead>
        <tr>
            @foreach ($nameColumn as $column)
                <th scope="col">{{ $column }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach ($table as $line)
                <tr>
                    @foreach ($line as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('footer')
    footer
@endsection
