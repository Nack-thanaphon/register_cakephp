<div class="row  m-0 py-3">
    <div class="col-12 col-md-12 col-lg-12 p-3">
        <h1>Dashboard</h1>
    </div>
    <div class="col-12 col-md-12 col-lg-8 ">
        <div class="row m-0 p-0">
            <div class="col-12  col-lg-4 ">
                <div class="card p-2 mb-2 py-2 rounded bg-primary">
                    <div class="card-header m-0 p-0">
                        <small class="mb-2">จำนวนยอดขายทั้งหมด</small>
                    </div>
                    <h4 class="pt-1">
                        <i class="fas fa-credit-card p-1" style="font-size: 2.5rem ;"></i>
                        100,000 <span><small>บาท</small></span>
                    </h4>
                </div>
            </div>
            <div class="col-12  col-lg-4 ">
                <div class="card p-2 mb-2 py-2 rounded bg-primary">
                    <div class="card-header m-0 p-0">
                        <small class="mb-2">จำนวนพนักงานทั้งหมด</small>
                    </div>
                    <h4 class="pt-1">
                        <i class="fas fa-user-friends p-1" style="font-size: 2.5rem ;"></i>
                        30 <span><small>คน</small></span>
                    </h4>
                </div>
            </div>
            <div class="col-12  col-lg-4 ">
                <div class="card p-2 mb-2 py-2 rounded bg-primary">
                    <div class="card-header m-0 p-0">
                        <small class="mb-2">จำนวนสาขาทั้งหมด</small>
                    </div>
                    <h4 class="pt-1">
                        <i class="fas fa-store p-1" style="font-size: 2.5rem ;"></i>
                        17 <span><small>สาขา</small></span>
                    </h4>
                </div>
            </div>
            <div class="col-12 ">
                <div class="card card-primary h-100">
                    <div class="card-header">
                        <h3 class="card-title">ยอดขายแบบรายปี</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block;" width="386" height="250" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4 h-100">
        <div class="row m-0 p-0">
            <div class="card  w-100 p-1 m-2 m-sm-0">
                <div class="btn-group">
                    <div class="btn btn-primary">
                        รายงานประจำเดือน
                    </div>
                    <div class="btn btn">
                        รายงานประจำปี
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {

        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: 'Electronics',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })

        //-------------
        //- LINE CHART -
        //--------------
        var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
        var lineChartOptions = $.extend(true, {}, areaChartOptions)
        var lineChartData = $.extend(true, {}, areaChartData)
        lineChartData.datasets[0].fill = false;
        lineChartData.datasets[1].fill = false;
        lineChartOptions.datasetFill = false

        var lineChart = new Chart(lineChartCanvas, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        })

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Chrome',
                'IE',
                'FireFox',
                'Safari',
                'Opera',
                'Navigator',
            ],
            datasets: [{
                data: [700, 500, 400, 600, 300, 100],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = donutData;
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = $.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

        new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })
</script>