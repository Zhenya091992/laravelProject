<form action="{{ route('addImage',['idSourceData' => $idSourceData]) }}" method="post">
    @csrf
    <h1 class="h3 mb-3 fw-normal text-white">Paste url address image</h1>
    <div class="mb-3">
        <label for="urlAddressImage">URL address image</label>
        <input name="urlImage" type="url" class="form-control" id="urlAddressImage" placeholder="http//image">
    </div>
    <button class="w-100 btn btn-lg btn-warning" type="submit">Accept changes</button>
</form>
