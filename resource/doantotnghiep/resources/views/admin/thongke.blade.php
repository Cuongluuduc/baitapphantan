@extends('admin.ad')
@section('ndc')

    <style>
        .name-summary {
            color: #FFFFFF;
            font-weight: bold;
        }

        .vote-padding
    </style>
    <div class="row well well-sm" style="margin-left: 0px;margin-right: 0px;margin-bottom: -1px">
        <div class="col-xs-8 col-sm-9 col-md-10 col-lg-11">
            
                <span class="company-register name-page-profile">Thống kê số lượng vé đặt tại các bến</span>
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <canvas id="myChart" min-width="500" style="background-color: #f5f5f5; height: 420px;"></canvas>
        </div>
    </div>
    <script>
        var nameCompany = new Array();
        var pointCompany = new Array();
        $.get('station', function (data) {
            $.each(data, function (index, sta) {
                nameCompany.push(sta.name);
                pointCompany.push(sta.number);
            });
            window.console.log(nameCompany.length);
            var ctx = document.getElementById('myChart').getContext('2d');
            var mylable = nameCompany;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: mylable,
                    datasets: [{
                        label: 'Số vé đặt tại bến',
                        data: pointCompany,
                        backgroundColor: "#286091"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 100,
                                callback: function (value) {
                                    return value
                                },
                                stacked: true
                            }
                        }]
                    },
                    animation: {
                        duration: 500,
                        easing: "easeOutQuart",
                        onComplete: function () {
                            var ctx = this.chart.ctx;
                            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';

                            this.data.datasets.forEach(function (dataset) {
                                for (var i = 0; i < dataset.data.length; i++) {
                                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                            scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                                    ctx.fillStyle = '#444';
                                    var y_pos = model.y - 5;
                                    // Make sure data value does not get overflown and hidden
                                    // when the bar's value is too close to max value of scale
                                    // Note: The y value is reverse, it counts from top down
                                    if ((scale_max - model.y) / scale_max >= 0.93)
                                        y_pos = model.y + 20;
                                    ctx.fillText(dataset.data[i], model.x, y_pos);
                                }
                            });
                        }
                    }
                }
            });
        });
        $(function () {
            $('#statistic-vote').addClass('menu-menu');
            $('a#statistic-vote').css('color', '#000000');

        });
        
    </script>

@endsection