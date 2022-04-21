<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link type="text/css" rel="StyleSheet" href="https://bootstraptema.ru/plugins/2016/shieldui/style.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

@foreach($prices as $key => $value)
    {{$value->created_at . '  ' . $value->price}}<br>
@endforeach

<br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <!-- График --><div id="chart">

                <script>
                    $(function () {
                        var householdPrices = [
                            {x:'2001',y:0.164},
                            {x:'2002',y:0.173},
                            {x:'2003',y:0.184},
                            {x:'2004',y:0.167},
                            {x:'2005',y:0.177},
                            {x:'2006',y:0.189},
                            {x:'2007',y:0.180},
                            {x:'2008',y:0.183},
                            {x:'2009',y:0.188},
                            {x:'2010',y:0.160},
                            {x:'2011',y:0.176},
                            {x:'2012',y:0.178}
                        ];
                        var industryPrices = [
                            {x:'2001',y:0.103},
                            {x:'2002',y:0.105},
                            {x:'2003',y:0.112},
                            {x:'2004',y:0.111},
                            {x:'2005',y:0.102},
                            {x:'2006',y:0.099},
                            {x:'2007',y:0.110},
                            {x:'2008',y:0.113},
                            {x:'2009',y:0.117},
                            {x:'2010',y:0.119},
                            {x:'2011',y:0.123},
                            {x:'2012',y:0.117}
                        ];
                        $("#chart").shieldChart({
                            theme: "light",
                            exportOptions: {
                                image: false,
                                print: false
                            },
                            primaryHeader: {
                                text: "Цены на электроэнергию"
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
                                    text: "Цена (EUR per kWh)"
                                }
                            },
                            dataSeries: [{
                                seriesType: 'line',
                                collectionAlias: "Бытовая",
                                data: householdPrices
                            }, {
                                seriesType: 'line',
                                collectionAlias: "Индустрия",
                                data: industryPrices
                            }]
                        });
                    });
                </script><!-- /.График -->

            </div><!-- /.col-md-8 col-md-offset-2 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
