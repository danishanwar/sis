$(function(){
	$("#username_error_message").hide();
	$("#password_error_message").hide();
	$("#retype_password_error_message").hide();
	$("#email_error_message").hide();

	var error_username = false;
	var error_password = false;
	var error_retypepassword = false;
	var error_email = false;

	$("#form_username").focusout(function() {

		check_username();
	});
	$("#form_email").focusout(function() {
		
		check_email();
	});
	$("#form_password").focusout(function() {
		
		check_password();
	});
	$("#form_username").focusout(function() {
		
		check_retype_password();
	});
	
});