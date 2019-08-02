<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form</title>
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
  <form action="{{ route('form.submited') }}" id="form1" method="POST" enctype="multipart/form-data" >
    @include('error_messages')
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Breadcumb</a></li>
    <?php $segments = ''; ?>
    @foreach(Request::segments() as $segment)
        <?php $segments .= '/'.$segment; ?>
        <li>
            <a href="{{ $segments }}">{{ ucfirst($segment) }}</a>
        </li>
    @endforeach
</ol>
    <div class="form-group">
      {{ csrf_field() }}
     
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Enter email" name="email">
    </div>

     <div class="form-group">
      <label for="email">File1:</label>
      <input type="file" class="form-control" id="file1"   name="file">
      <img src="#" id="preview_img" style="display:none">
    </div>

<!--     <div class="form-group">
      <label for="email">File2:</label>
      <input type="file" class="form-control" id="file2"   name="file[]">
    </div>
 -->

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" value='' placeholder="Enter password" name="pwd">

    </div>
     <input type="checkbox" name="ab" id='ab'>Checkbox<br><br>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<!-- <input type="hidden" name="t" value="0">
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

<button id="btn"> Submit </button>-->
  @push('scripts')
   
    <script type="text/javascript">
      /*$('document').ready(function(){
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
              //alert(data.id);
                //$("#employees").html(data);
            }
        });
      }else{
        alert("not checked");
      }
      });

      $("#file").on('change',function(){
        $("#form1").submit();
      });


      $("#form1").on('submit',function(e){
        e.preventDefault(); 
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        
        // var formData = $("#file").prop("files")[0]; //new FormData(this);
        // console.log(formData);
       $.ajax({
            type:"POST",
            url: "{{ route('ajaximg.upload') }}", //"{{ url('/ajax/imgupload') }}",
            cache: false,
            processData :false,
            dataType: 'JSON',
            contentType: false,
            data:new FormData(this),
            success: function(data){
              console.log(data);
              //alert(data.id);
                //$("#employees").html(data);
            }
        });
      });
    });*/


/*
    function readURL(input) {
      console.log(input.files[0]);
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('img#preview_img').show();
        reader.onload = function(e) {

          $('#preview_img').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#file1").change(function() {
      readURL(this);
      //alert("sss");
    });*/
    </script>
@endpush
<div></div>
@stack('scripts')

<script type="text/javascript">
 $("document").ready(function(){

    $("#btn").click(function(){
      var total_div = $(".a").size;
      //alert(total_div);
      var i = $("input[name='t']").val();
      if(i == 0){
        $(".a").hide();
        $("input[name='t']").val("1");
      }
      else{
        $(".a").show();
        $("input[name='t']").val("0");
      }
    });
 });
</script>
</body>
</html>
