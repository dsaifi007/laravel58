<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Role</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="apple-touch-icon" href="https://laravel.com/favicon.png">
</head>
<body>

  <div class="container">
    <h2></h2>
    <h2></h2>
    <div class="row"> 
      <div class="col-md-4"></div>
      <div class="col-md-4"> 
        <div class="panel panel-default">
          <div class="panel-heading">Add New Role</div>
          <div class="panel-body">
          <form action="{{ route('role.submited') }}" id="form1" method="POST" >
            @include('error_messages') 
            <div class="form-group">
              {{ csrf_field() }}
              <label for="role_name">Add New Role:</label>
              <input type="text" class="form-control" id="role_name" value="{{ old('role_name') }}" placeholder="Enter Role Name" name="role_name">
              {!! $errors->first('role_name', '<p style="color:red;font-style: italic">:message</p>') !!}
            </div>
            <div class="form-group">
              <label for="role_description">Role Description:</label>
              <textarea class="form-control" id="role_description" placeholder="Enter Role Description" name="role_description" >  </textarea>
              {!! $errors->first('role_description', '<p style="color:red;font-style: italic">:message</p>') !!}
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</body>
</html>
