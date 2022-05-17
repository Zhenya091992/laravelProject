<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link type="text/css" rel="StyleSheet" href="https://bootstraptema.ru/plugins/2016/shieldui/style.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

<br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- График --><div id="chart">

                <script>
                    $(function () {
                        var householdPrices = {!! $prices !!};
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
                            axisY: {
                                title: {
                                    text: "Price"
                                }
                            },
                            dataSeries: [{
                                seriesType: 'line',
                                collectionAlias: "article",
                                data: householdPrices
                            }]
                        });
                    });
                </script><!-- /.График -->

            </div><!-- /.col-md-8 col-md-offset-2 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
