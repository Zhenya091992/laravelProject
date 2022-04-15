<header class="mb-auto">
    <div>
        <h3 class="float-md-start mb-0">Cover</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
            <a class="nav-link active" aria-current="page" href="{{ route('/') }}">Home</a>
            @if( !empty($name))
                <a class="nav-link" href="{{ route('exit') }}">Exit</a>
            @else
                <a class="nav-link" href="{{ route('signinForm') }}">Signin</a>
                <a class="nav-link" href="{{ route('registerForm') }}">Registr</a>
            @endif
        </nav>
    </div>
</header>
