@if($errors->any())
<h4 class="error">{{$errors->first()}}</h4>
@endif

<form action="{{ route('addImagePost',['idSourceData' => $idSourceData]) }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="urlAddressImage">URL address image</label>
        <input name="urlImage" type="url" class="form-control" id="urlAddressImage" placeholder="http//image">
    </div>
    <div class="mb-3">
        <label for="nameImage">Name image</label>
        <input name="nameImage" type="text" class="form-control" id="nameImage" placeholder="name image">
    </div>
    <button class="w-100 btn btn-lg btn-warning" type="submit">Accept changes</button>
</form>
