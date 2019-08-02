<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h2>Simple Form</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" id="btn1" data-toggle="modal" data-target="#myModal">Click Here</button>
    @include('error_messages')
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Simple Form</h4>
          </div>
          <div class="modal-body">
          <form action="{{ route('form.submited1') }}" id="form1" method="POST"  >
            @include('error_messages')
            {{ csrf_field() }}
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="text" class="form-control" name="post_title" id="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="text" class="form-control" name="post_description" id="pwd">
            </div>
             <button type="submit" name="submit" class="btn btn-default btn2">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    </div>
  </div>
  <p>If you click on me, I will disappear.</p>
<p>Click me away!</p>
<p>Click me too!</p>
   <a href="#"  id="abcd">Click here</a>
  <span class="heading">User Rating</span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
</div>
<script type="text/javascript">
  $("document").ready(function() {
    //$("#btn1").delay(14000).trigger("click");
    //$(".btn2").on('click', function(){

      @if (session('added'))
      $("#btn1").trigger("click");
      @endif

      $("#abcd").on('click', function(){
        $("p").css("background-color","red");
        return false;
      });
   // });
  });
function a(){
 $("p").css("background-color","red");
 return false;
}
</script>
</body>
</html>
