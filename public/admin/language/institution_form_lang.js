var 

lang = {
	en: {
		validationMessages: {
        institution_name: {
          required: "Institution name must be filled out",
          minlength: "Your Institution Name must consist of at least 10 characters"
        },
        email:{
        	required:"Email address must be filled out",
        	email:"Email should be in valid format",
        	//remote:"Email address already in use. Please use other email."
        	remote: function() { return $.validator.format("Email address already in use. Please use other email.", $("#email").val()) }

        },
        direct_number:{
        	required:"Phone number must be filled out"
        },
        instution_code:{
        	required:"Institution code must be filled out"
        },
        country_id:{
        	required:"Select country name from dropdown"
        },
        city_id:{
        	required:"Select city name from dropdown"
        },
        timezone_id:{
        	required:"Select timezone from dropdown"
        },
        institution_img:{
        	required:"Select Image and should be only jpeg|jpg|png only"
        },
        institution_address:{
        	required:"Institution address must be filled out"
        }
      },
      messages:{
      	select_country:"Please select country first "
      }
	},
	da: {
		validationMessages: {
        institution_name: {
          required: "Please enter a institution name in danish language",
          minlength: "Your Institution Name must consist of at least 10 characters"
        },
        email:{
        	required:"Please enter a valid email address"
        },
        direct_number:{
        	required:"Please enter a Phone number"
        }
      }
	}
}
var selectedLanguage = 'en';

window.institutionForm  = lang[selectedLanguage];
