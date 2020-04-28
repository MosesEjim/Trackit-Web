@extends('layouts.app')

@section('content')

<form action="adhoc" method = "POST">
        {{csrf_field()}}
        <div class="col-md-12">
            Enter Question <br>
            <textarea name="question" id="" cols="10" rows="10" class="form-control" placeholder = "Enter Question"></textarea> 
            
        </div>
        
        <div class="form-group col-md-3">
							<label class="control-label">Select Question Type</label>
						   <select name="type" id="type" class="form-control">
							  <option value="" selected="selected" >- Select - Type</option>
							  <option value='Y'>Yes or No</option>
							  <option value='I'>Input Type</option>
							  <option value='O'>Options</option>
							</select>
						</div>
						  
						<div class="form-group col-md-3">
							  <label class="control-label">Enter Options</label>
                              <input type="text" class ="form-control" name = "options">
						</div>

                            
                               
                        <input type="submit" class = "btn btn-success col-md-3" value = "submit" style = "margin-top:30px">
                          
                              
						
        
    </form>

@endsection