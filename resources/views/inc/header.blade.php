<header>
    <div>
        <h3 class="float-md-start mb-0">Monitoring</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link active" aria-current="page" href="{{ route('/') }}">Home</a>
            @if( \Illuminate\Support\Facades\Auth::check())
                <a class="nav-link" href="{{ route('account', ['name' => \Illuminate\Support\Facades\Auth::user()->name]) }}">New check</a>
                <a class="nav-link" href="{{ route('list') }}">List</a>
                <a class="nav-link" href="{{ route('exit') }}">Exit</a>
            @else
                <a class="nav-link" href="{{ route('signinForm') }}">Signin</a>
                <a class="nav-link" href="{{ route('registerForm') }}">Registr</a>
            @endif
        </nav>
    </div>
</header>
