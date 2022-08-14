<link type="text/css" rel="StyleSheet" href="https://bootstraptema.ru/plugins/2016/shieldui/style.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

<div class="container">
        <div class="container">

            <!-- График --><div id="chart">

                <script>
                    $(function () {
                        var x = {!! $priceOsX !!};
                        var y = {!! $priceOsY !!};
                        $("#chart").shieldChart({
                            theme: "dark",
                            exportOptions: {
                                image: false,
                                print: false
                            },
                            primaryHeader: {
                                text: "Price dynamic"
                            },
                            chartLegend: {
                                align: 'right',
                                verticalAlign: 'top',
                                renderDirection: 'vertical'
                            },
                            seriesSettings: {
                                line: {
                                    enablePointSelection: true,
                                    pointMark: {
                                        activeSettings: {
                                            pointSelectedState: {
                                                drawWidth: 4,
                                                drawRadius: 4
                                            }
                                        }
                                    }
                                }
                            },
                            axisX: {
                                categoricalValues: x,
                                title: {
                                    text: "Date"
                                }
                            },
                            axisY: {
                                title: {
                                    text: "Price"
                                }
                            },
                            dataSeries: [{
                                seriesType: 'line',
                                collectionAlias: "article",
                                data: y
                            }]
                        });
                    });
                </script><!-- /.График -->

            </div><!-- /.col-md-8 col-md-offset-2 -->

            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <main class="container-sm form-parser">
                            <form action="{{ route('update',['idSourceData' => $idSourceData]) }}" method="post">
                                @csrf
                                <h1 class="h3 mb-3 fw-normal text-white">You can change form</h1>
                                <div class="mb-3">
                                    <label for="urlAddress">URL address</label>
                                    <input name="url" type="url" class="form-control" id="urlAddress" placeholder="example.com" value="{{ $record->url }}">
                                </div>
                                <div class="mb-3">
                                    <label for="price">Xpath</label>
                                    <input name="pattern" type="text" class="form-control" id="price" placeholder="Pattern" value="{{ $record->pattern }}">
                                </div>
                                <div class="mb-3">
                                    <label for="minPrice">min price</label>
                                    <input name="minPrice" type="text" class="form-control" id="minPrice" placeholder="min price" value="{{ $record->min_price }}">
                                </div>
                                <button class="w-100 btn btn-lg btn-warning" type="submit">Accept changes</button>
                            </form>
                        </main>
                    </div>
                    <div class="col-4">
                        <div class="container-sm">
                            <h1 class="h3 mb-3 fw-normal text-white">Image product</h1>
                            <img src=
                                @if($image = $record->image()->first())
                                    "{{ Storage::url($image->pathImage) }}"
                                @else
                                    "../storage/images/noImageProduct.png"
                                @endif
                                    class="card-img-top" alt="...">
                        </div>
                        <a class="btn nav-link" href="{{ route('addImageGet', ['idSourceData' => $idSourceData]) }}">Chaange image</a>
                    </div>
                </div>
              </div>


        </div><!-- /.row -->

</div>
