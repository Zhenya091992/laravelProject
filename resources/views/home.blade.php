@extends('layauts.app')

@section('title')
    Home
@endsection

@section('header')
    @include('inc.header')
@endsection

@section('body')
    <div>
        <h2>Prise monitoring</h2>
        <p>This website is designed to monitor prices on various sites.</p>
        <p>All you need is a link to the product with the specified price and the XPATH of the element where the price is indicated.</p>
        <ul><h3>Lets started</h3></ul>
        <li>Copy the link to the product with the specified price and paste it into the url field.</li>>
        <li>On the website with the price, right-click on the price itself. Then select "explore item".</li>
        <img src="/image/explore_item.png">
        <li>The html code indicating the price will be displayed in the window that appears. You need to right-click on this html element and select "copy XPATH".</li>
        <img src="/image/copy_XPATH.png">
        <li>Next, paste XPATH into the field on our website and click ok.</li>
        <li>If the price matches the price on the website, confirm the match. If the price is incorrect or not determined, check if you did everything correctly.</li>
            <div class="btn btn-warning">
                <a class="btn" href="{{ route('demoAccount') }}">Try demo account</a>
            </div>
    </div>
@endsection

@section('footer')
    @include('inc.footer')
@endsection
