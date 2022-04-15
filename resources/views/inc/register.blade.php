@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>

            @endforeach
        </ul>

    </div>
@endif

<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0">
    <div class="row align-items-center">
        <main class="form-signin">
            <form action="{{ route('registerForm') }}" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-white">Please fill the fields</h1>

                <div class="mb-3">
                    <label for="nameUser">Name</label>
                    <input name="name" type="text" class="form-control" id="nameUser" placeholder="name">
                </div>
                <div class="mb-3">
                    <label for="emailUser">Email address</label>
                    <input name="email" type="email" class="form-control" id="emailUser" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="passwordUser">Password</label>
                    <input name="password" type="password" class="form-control" id="passwordUser" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="rePasswordUser">Repeat password</label>
                    <input name="rePassword" type="password" class="form-control" id="rePasswordUser" placeholder="Repeat password">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
        </main>
    </div>
</div>
