@extends('layouts.app')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

@section('content')
        <div class="content mt-3">


            <div class="col-sm-6 col-lg-6">
                {!! $rtuf_chart->container() !!}
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
            <div>{!! $band1_Chart->container() !!}</div>
            
            <h3>Band 1</h3>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
            <div>{!! $band2_Chart->container() !!} </div>
            
            <h3>Band 2</h3>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-6">
            <div>{!! $band3_Chart->container() !!} </div>
            <h3>Band 3</h3>
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
                            <span class="count">{{$average_days}}</span>
                        </h4>
                        <p class="text-light">Average length of stay in treatment of children discharged as cured/recovered from SAM treatment</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            

        </div> <!-- .content -->
    </div><!-- /#right-panel -->
@endsection    

@section('js')
{!! $band1_Chart->script() !!}
{!! $band2_Chart->script() !!}
{!! $band3_Chart->script() !!}
{!! $rtuf_chart->script() !!}
@endsection