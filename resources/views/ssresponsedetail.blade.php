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
    
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}">
    
    


    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

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
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Facility Information</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                   
                                    <tbody>

                                    <tr>
                                            <td>Date Of visit</td>
                                            <td>{{$response->created_at}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Data Collector</td>
                                            <td>{{$response->name_of_data_collector}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Name</td>
                                            <td>{{$response->facility->facility_name}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Code</td>
                                            <td>{{$response->facility->facility_id}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Type</td>
                                            @if($response->facility->facility_type==1)
                                            <td>Hospital</td>
                                            @elseif($response->facility->facility_type==2)
                                            <td>Health Center</td>
                                            @elseif($response->facility->facility_type==3)
                                            <td>Therapeutic Feeding unit</td>
                                            @endif
                                            
                                        </tr>
                                        <tr>
                                            <td>Facility Operated By</td>

                                            @if($response->facility->facility_operator==1)
                                            <td>Government</td>
                                            @elseif($response->facility->facility_operator==2)
                                            <td>NGO</td>
                                            @elseif($response->facility->facility_operator==3)
                                            <td>UNICEF</td>
                                            @elseif($response->facility->facility_operator==4)
                                            <td>Private</td>
                                            @elseif($response->facility->facility_operator==5)
                                            <td>Faith-based organization</td>
                                            @endif
                                            
                                            
                                        </tr>
                                        <tr>
                                            <td>State </td>
                                            <td>{{$response->facility->state}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>LGA</td>
                                            <td>{{$response->facility->lga}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Name Of Facility Respondent</td>
                                            <td>{{$response->facility->facility_respondent}}</td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="content mt-3">


                    <div class="col-sm-6 col-lg-12">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Questions</th>
                                                        <th>Response</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    <tr>
                                                        <td>What is the physical count of usable (undamaged, unexpired) RUTF sachets today?  
                                                        </td>
                                                        <td>{{$response->no_of_usable_RTUF}}</td>
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>Is  there  usable  RUTF  in  stock  today? 
                                                        </td>
                                                        @if($response->usable_RTUF==0)
                                                        <td>No</td>
                                                        @else
                                                        <td>Yes</td>
                                                        @endif

                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>Is there any RUTF at this facility that is expired as of today's visit?  
                                                        </td>
                                                        @if($response->expired_RTUF==0)
                                                        <td>No</td>
                                                        @else
                                                        <td>Yes</td>
                                                        @endif
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>Is there any RUTF at this facility that is damaged as of today's visit? (sachet ripped, perforated, opened, nibbled by pests, or otherwise damaged so as to be unusable)   
                                                        </td>
                                                        @if($response->damaged_RTUF==0)
                                                        <td>No</td>
                                                        @else
                                                        <td>Yes</td>
                                                        @endif
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>What is the physical count of unusable (damaged or expired) RUTF sachets today?  
                                                        </td>
                                                        
                                                        <td>{{$response->no_of_damaged_RTUF}}</td>
                                                        
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>Is there a stock card or stock ledger for RUTF?    
                                                        </td>
                                                        
                                                        @if($response->sc_available==0)
                                                        <td>No</td>
                                                        @else
                                                        <td>Yes</td>
                                                        @endif
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>Does the stock card or stock ledger have complete records for the past 3 months? 
                                                        </td>
                                                        
                                                        @if($response->complete_sc_record==0)
                                                        <td>No</td>
                                                        @else
                                                        <td>Yes</td>
                                                        @endif
                                                        
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>According to the stock card or stock ledger how many days in the last three months has RUTF been stocked out?  
                                                        </td>
                                                        
                                                        
                                                        <td>{{$response->stock_out_days}}</td>
                                                        
                                                        
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>Is there a register or tally that records how many sachets of RUTF were dispensed to patients/caregivers? Can you show it to me? 
                                                        </td>
                                                        
                                                        
                                                        @if($response->dispensed_RTUF_record==0)
                                                        <td>No</td>
                                                        @else
                                                        <td>Yes</td>
                                                        @endif
                                                        
                                                        
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>If there is a register or tally card, does it contain complete records of RUTF distributed to patients/caregivers for the most recent three months?    If there is no register or tally card, does the stock card or stock ledger contain complete records of RUTF removed from stock or distributed to patients/caregivers for the most recent three months?
                                                        </td>
                                                        
                                                        
                                                        @if($response->record_of_distributed_RTUF==0)
                                                        <td>No</td>
                                                        @else
                                                        <td>Yes</td>
                                                        @endif
                                                        
                                                        
                                                    
                                                    </tr>
                                                    <tr>
                                                        <td>According to the tally, what quantity of RUTF was dispensed to patients/caregivers from this site during the most recent three months? 
                                                        </td>
                                                        
                                                        
                                                        
                                                        <td>{{$response->no_of_dispensed_RTUF}}</td>
                                                        
                                                        
                                                        
                                                    
                                                    </tr>
                                                
                                            
                                                
                                                    
                                                </tbody>
                                            </table>
                    </div>
                    

            




            


           


            

            

                        </div>
                        
                    </div>
                    
            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

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

</body>

</html>
