  var paymentCheck = true;
  $("document").ready(function(){
    $("input[name='is_enquiry']").click(function(){
      var check = $("input[name='is_enquiry']:checked").val();
      if(check == 0){
        $(".payment").show();
        paymentCheck =true;
      }else{
       $(".payment").hide();
       paymentCheck =false;
      }
    });
  });
//$("document").ready(function() {
    $("#add-user").validate({
      rules: {
        name: "required",
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
          minlength: 10
        },
        course_id: {
          required: true
        },
        payment:{
          required: paymentCheck
        }
      }
    });
  //});

