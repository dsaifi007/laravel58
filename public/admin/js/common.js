$(function() {


});
function display_error_message(msg){
	$(".error-or-success-msg").show();
	$(".error-or-success-msg").text(msg);
	setTimeout(function(){
		$('.error-or-success-msg').fadeOut(500);
	}, 5000);
}