@extends('layouts.app')

@section('content')

<div class = "content mt-3 chart-options-pane">
    <form action="charts">
        {{csrf_field()}}
        <div class="col-md-3">
            Select Questionaire <br>
            <input type="radio" name = 'question' value ='Availability'>Availability & Quality <br>
            <input type="radio" name = 'question' value = 'Usage'> Usage <br>
            <input type="radio" name = 'question' value = 'Household'> Household <br>
        </div>
        <div class="col-md-3">
            Select Programs <br>
            <input type="checkbox" name = 'health' value = 'health'>Health <br>
            <input type="checkbox" name = 'education' value = 'education'> Education <br>
            <input type="checkbox" name = 'wash'  value = 'wash'> WASH <br>
            <input type="checkbox" name = 'nutrition' value = 'nutrition'> Nutrition <br>
        </div>
        <div class="form-group col-md-3">
							<label class="control-label">Select State</label>
						   <select name="state" id="state" class="form-control">
							  <option value="" selected="selected" >- Select -</option>
							  <option value='Abia'>Abia</option>
							  <option value='Adamawa'>Adamawa</option>
							  <option value='AkwaIbom'>AkwaIbom</option>
							  <option value='Anambra'>Anambra</option>
							  <option value='Bauchi'>Bauchi</option>
							  <option value='Bayelsa'>Bayelsa</option>
							  <option value='Benue'>Benue</option>
							  <option value='Borno'>Borno</option>
							  <option value='Cross River'>Cross River</option>
							  <option value='Delta'>Delta</option>
							  <option value='Ebonyi'>Ebonyi</option>
							  <option value='Edo'>Edo</option>
							  <option value='Ekiti'>Ekiti</option>
							  <option value='Enugu'>Enugu</option>
							  <option value='Gombe'>Gombe</option>
							  <option value='Imo'>Imo</option>
							  <option value='Jigawa'>Jigawa</option>
							  <option value='Kaduna'>Kaduna</option>
							  <option value='Kano'>Kano</option>
							  <option value='Katsina'>Katsina</option>
							  <option value='Kebbi'>Kebbi</option>
							  <option value='Kogi'>Kogi</option>
							  <option value='Kwara'>Kwara</option>
							  <option value='Lagos'>Lagos</option>
							  <option value='Nasarawa'>Nasarawa</option>
							  <option value='Niger'>Niger</option>
							  <option value='Ogun'>Ogun</option>
							  <option value='Ondo'>Ondo</option>
							  <option value='Osun'>Osun</option>
							  <option value='Oyo'>Oyo</option>
							  <option value='Plateau'>Plateau</option>
							  <option value='Rivers'>Rivers</option>
							  <option value='Sokoto'>Sokoto</option>
							  <option value='Taraba'>Taraba</option>
							  <option value='Yobe'>Yobe</option>
							  <option value='Zamfara'>Zamafara</option>
							</select>
						</div>
						  
						<div class="form-group col-md-3">
							  <label class="control-label">Select LGA </label>
							  <select name="lga" id="lga" class="form-control" required>
							  </select>
						</div>
        <input type="submit" class = "btn btn-success col-md-3" value = "submit">
    </form>
        
</div>


<div class="content mt-3">


            <div class="col-sm-6 col-lg-6">
                <div id="piechart"></div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
            
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
                <div class="row">
                    @isset($stock_out_days_health)
                    <div class="col-sm-3 col-lg-3">
                        <h1><span class="count">{{$stock_out_days_health}}</span></h1>
                        <h6>Health</h6>
                    </div>
                    @endisset
                    @isset($stock_out_days_nutrition)
                    <div class="col-sm-3 col-lg-3">
                        <h1><span class="count">{{$stock_out_days_nutrition}}</span></h1>
                        <h6>Nutrition</h6> 
                    </div>
                    @endisset
                    @isset($stock_out_days_wash)
                    <div class="col-sm-3 col-lg-3">
                        <h1><span class="count">{{$stock_out_days_wash}}</span></h1>
                        <h6>WASH</h6>
                    </div>
                    @endisset
                    @isset($stock_out_days_education)
                    <div class="col-sm-3 col-lg-3">
                        <h1><span class="count">{{$stock_out_days_education}}</span></h1>
                        <h6>Education</h6>
                    </div>
                    @endisset
                    <h4>Average RTUF Stock-out days</h4>
                </div>
            </div>
            <!--/.col-->

</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="assets/js/lga.min.js"></script>
{!! $expired_rutf_chart->script() !!}
@endsection