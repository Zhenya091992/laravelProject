<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0">
    <div class="row align-items-center">
        <main class="form-parser">
            <form action="{{ route('parser') }}" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal text-white">Please enter URL address</h1>
                <div class="mb-3">
                    <label for="urlAddress">URL address</label>
                    <input name="url" type="url" class="form-control" id="urlAddress" placeholder="example.com" value="{{ session('urlPattern') }}">
                </div>
                <div class="mb-3">
                    <label for="price">XPath</label>
                    <input name="pattern" type="text" class="form-control" id="price" placeholder="XPath" value="{{ session('pattern') }}">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Ok</button>
            </form>
        </main>
    </div>
</div>
