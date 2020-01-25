<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trackit</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    
    <link rel="stylesheet" href="{{ secure_asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendors/bootstrap/dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendors/bootstrap/dist/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendors/bootstrap/dist/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendors/bootstrap/dist/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('vendors/jqvmap/dist/jqvmap.min.css') }}">
    
    


    <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Trackit Admin</a>
               
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    
                    <h3 class="menu-title">Questionaire Responses</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Facilities</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="#">Bauchi</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="#">Plateau</a></li>
                            <li><i class="fa fa-bars"></i><a href="#">Anambra</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="#">Benue</a></li>
                            <li><i class="fa fa-id-card-o"></i><a href="#">Ondo</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="#">Kwara</a></li>
                            <li><i class="fa fa-spinner"></i><a href="#">Oyo</a></li>
                            <li><i class="fa fa-fire"></i><a href="#">Adamawa</a></li>
                            <li><i class="fa fa-book"></i><a href="#">Gombe</a></li>
                            <li><i class="fa fa-th"></i><a href="#">Kano</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="#">Enugu</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Facility Personnel</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="FSQuestioniares">Responses</a></li>
                            <li><i class="fa fa-table"></i><a href="personnelstatistics">Statistics</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Stock Status</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="SSQuestioniares">Responses</a></li>
                            <li><i class="fa fa-table"></i><a href="statistics">Statistics</a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Storage conditions</a>
                    </li>

                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">


            <div class="col-sm-6 col-lg-6">
                <div id="piechart"></div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
            <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$stock_out_days}}</span>
                        </h4>
                        <p class="text-light">Average Stock-Out Days</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
            <div id="piechart-usable"></div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                
            </div>
            <!--/.col-->

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


var usable = @json($usable);
// Draw the chart and set the chart values
function drawChart() {
    console.log(usable[0]);
    console.log(usable[1]);
  var usable_data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['usable', usable[0]],
  ['Unusable', usable[1]],
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Percentage of facilities in [period] with usable RUTF on hand as per LMIS report'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart-usable'));
  chart.draw(usable_data, options);
}
</script>

<script>
    google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

var d = @json($data);
// Draw the chart and set the chart values
function drawChart() {
    console.log(d[0]);
    console.log(d[1]);
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['expired', d[0]],
  ['Unexpired', d[1]],
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Percentage of facilities surveyed with usable (undamaged, unexpired) RUTF in stock'};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>






</body>

</html>