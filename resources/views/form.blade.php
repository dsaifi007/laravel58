<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simple-admin-panel</title>
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
  <h2>Form</h2>
  <form action="{{ route('form.submited') }}" method="POST" enctype="multipart/form-data" >
    @include('error_messages')
    <div class="form-group">
      {{ csrf_field() }}
     
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter email" name="email">
    </div>
     <div class="form-group">
   
      <label for="email">Email:</label>
      <input type="file" class="form-control" id="file"   name="file">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" value='' placeholder="Enter password" name="pwd">

    </div>
     <input type="checkbox" name="ab" id='ab'>Checkbox
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<input type="hidden" name="t" value="0">
<div  style="width:50px;height:50px;background:red" class="a">
</div><br>
<div  style="width:50px;height:50px;background:red" class="a">
</div><br>
<div  style="width:50px;height:50px;background:red" class="a">
</div><br>
<div  style="width:50px;height:50px;background:red" class="a">
</div><br>
<div  style="width:50px;height:50px;background:red" class="a">
</div><br>

<section class="group">
  <div class="header">Header 2</div>
      <div class="item">item1</div>
      <div class="item">item2</div>
      <div class="item">item3</div>
      <div class="item">item4</div>
      <div class="item">item5</div>
   
</section>

<button id="btn"> Submit </button>
  @push('scripts')
   
    <script type="text/javascript">
      $('document').ready(function(){
      $("#ab").click(function(){
      if($(this).is(':checked')){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });  
        $.ajax({
            type:"post",
            url: "{{ url('/ajax/call') }}",
            cache: false,
            processData :true,
            data: {"_token":"{{ csrf_token() }}","id":1},
            success: function(data){
              console.log(data);
                //$("#employees").html(data);
            }
        });
      }else{
        alert("not checked");
      }
      });
    });
    </script>
@endpush
<div></div>
@stack('scripts')

<script type="text/javascript">
 $("document").ready(function(){

    $("#btn").click(function(){
      var total_div = $(".a").size;
      alert(total_div);
      /*var i = $("input[name='t']").val();
      if(i == 0){
        $(".a").hide();
        $("input[name='t']").val("1");
      }
      else{
        $(".a").show();
        $("input[name='t']").val("0");
      }*/
    });
 });
</script>
</body>
</html>
