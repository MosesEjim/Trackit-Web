@extends('layouts.app')

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@endsection

@section('content')

        <div class="container">

                <form action="usable" method = "POST">
                    {{csrf_field()}}
                    <div class="row">
                            <div class="col-sm-4 col-lg-3">
                                From:<input type="date" name = "from">
                            </div>
                            <div class="col-sm-4 col-lg-3">
                                To:<input type="date" name = "to">
                            </div>
                            <div class="col-sm-4 col-lg-3">
                            Select chart type:
                                <select name="chart_type" id="">
                                    <option value="pie">Pie</option>
                                    <option value="line">Line</option>
                                    <option value="bar">Bar</option>
                                </select>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <input type="submit" class = "btn btn-success" value = "submit">
                            </div>
                    </div>
                </form>

        </div>
        
        


        <div class="content mt-3">


            <div class="col-sm-6 col-lg-6">
                {!! $chart->container() !!}
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
            
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
        
@endsection

@section('js')
{!! $chart->script() !!}
@endsection
