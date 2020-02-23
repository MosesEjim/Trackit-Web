<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register</title>
  <link rel="stylesheet" href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
  
<div class="row">

    <div class="col-md-4">
    
    </div>
    <div class="col-md-4 col-md-offset-4">

        <form action = "store">
           {{csrf_field()}}
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control input-lg" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Username:</label>
              <input type="text" class="form-control input-lg" name="username">
            </div>
          
            <button type="submit" class="btn btn-default">Register</button>
        </form>
      
    </div>

    
    
</div>



<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>










