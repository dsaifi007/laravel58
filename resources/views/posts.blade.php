<!DOCTYPE html>
<html lang="en">
<head>
  <title>Posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style type="text/css">
    .bs{
      display:none;
    }
    .a{
      margin-left: 200px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Add New Post from here</h2>
  <form action="{{ route('form.submited') }}" id="form1" method="POST" >
    @include('error_messages')

    <div class="form-group">
      {{ csrf_field() }}
     
      <label for="email">Post Title:</label>
      <input type="text" class="form-control" id="post_title" value="{{ old('post_title') }}" placeholder="Enter Post Title" name="post_title">
      {!! $errors->first('post_title', '<p style="color:red;font-style: italic">:message</p>') !!}
    </div>
    <div class="form-group">
      <label for="pwd">Post Description:</label>
      <textarea class="form-control" id="post_description" placeholder="Enter post description" name="post_description" >  </textarea>
      {!! $errors->first('post_description', '<p style="color:red;font-style: italic">:message</p>') !!}
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</body>
</html>
