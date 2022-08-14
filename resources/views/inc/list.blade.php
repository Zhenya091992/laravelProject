<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($list as $key => $value)
        <div class="col">
            <div class="card text-white bg-secondary" style="width: 18rem;">
                <img src=
                    @if($image = $value->image()->first())
                        "{{ Storage::url($image->pathImage) }}"
                    @else
                        "storage/images/noImageProduct.png"
                    @endif
                 class="card-img-top" alt="...">
                <div class="card-body">
                    <a class="card-text text-white " href="{{ $value->url }}">{{ $value->url }}</a><br>
                    <a href="{{ route('monitoring', ['idSourceData' => $value->id]) }}" class="btn btn-primary">Price monitoring</a>
                    <a href="{{ route('deleteSourceData', ['idSourceData' => $value->id]) }}" class="btn btn-warning">Delete</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
