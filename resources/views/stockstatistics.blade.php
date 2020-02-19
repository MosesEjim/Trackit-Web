@extends('layouts.app')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

@section('content')

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
                        <h1 class="mb-0">
                            <span class="count">{{$stock_out_days}}</span>
                        </h1>
                        <p class="text-light">Average Stock-Out Days</p>


                    </div>

                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-6">
                <div >
                {!! $expired_rutf_chart->container() !!}
                </div>
                <a href="#">more>></a>
            </div>
            
            
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
                <div>
                {!! $usable_rutf_chart->container() !!}
                </div>
                <a href="statistics/usable">more>></a>
            </div>
            <!--/.col-->

        </div> <!-- .content -->

@endsection

@section('js')
{!! $expired_rutf_chart->script() !!}
{!! $usable_rutf_chart->script() !!}
@endsection
   