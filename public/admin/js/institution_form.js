$(function() {
  //'use strict';

  $.ajaxSetup({
  	headers: {
  		'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
  	}
  });

  var $form_id = $("#inspiration_form");
  var $country_change = $("#country_id");
// validate Inspiration form on keyup and submit
    $("#inspiration_form").validate({
      ignore:[],
      messages:institutionForm.validationMessages,

      rules: {
        institution_name: {
          required: true,
          minlength: 10,
          maxlength:500
        },
        email: {
	      required: true,
	      email: true,
	      remote: {
	        url:base_url +"/check-email",
	        type: "post",
	        data: {
	          email: function() {
	            return $( "#email" ).val();
	          }
	        }
	     }
        },
        direct_number: {
          required: true,
          minlength: 10,
          maxlength:15
        },
        contact_person: {
          required: true,
          minlength: 5,
          maxlength:50
        },
        instution_code: {
          required: true,
          minlength: 2,
          maxlength:10
        },
        country_id: {
          required: true,
          digits:true
        },
        city_id: {
          required: true,
          digits:true
        },
        timezone_id: {
          required: true,
          digits:true
        },
        institution_img:{
        	required: true,
      		accept: "image/*"
        },
        institution_address:{
        	required: true
        }
      },
      errorPlacement: function(error, element) {
       if(element.attr('name') === 'country_id'){
		    error.appendTo("span#country_name_error")
		  }else if(element.attr('name') === 'city_id'){
		  	error.appendTo("span#city_name_error")
		  }
		  else if(element.attr('name') === 'timezone_id'){
		  	error.appendTo("span#timezone_error")
		  }
		  else{
		    element.after(error);
		  }
		},
      submitHandler: function(form) {
	    $("#inspiration_form").attr("disabled",'disabled');
	    form.submit();
	  }
	});

/*
Select city based on country id
*/
$country_change.change(function(){
	var country_id = $(this).val();
	if(country_id){
		getCitiesBasedOnCountry(country_id);
	}else{
		$("#city_id").html("<option value=''>"+institutionForm.messages.select_country+"</option>");
		return false;
	}
});

});
function getCitiesBasedOnCountry(country_id){
	$.ajax({
		type:"get",
		url:base_url + "/city/list?country_id="+country_id,
		data:[],
		success:function(data){
			var json = JSON.parse(data);
			var html ='';
			$("#city_id").html('');
			if(!json.status){
				display_error_message(json.msg);
			}else{
				$.each(json['city_list'], function (key, data) {
					$("#city_id").append("<option value="+data['city_id']+">"+data['city']+"</option>");
				});
				return true;
			}
		}
	});
}