$(document).ready(function(){
	$("#emailbatchlbl").text($("#emailbatch").val());

	$("#emailname").keyup(function(){
		createEmail();
	});
	
	$("#emailname").change(function(){
		createEmail();
	});
	
	$("#emailname").focusout(function(){
		createEmail();
	});
	
	$("#emailbatch").change(function(){
		createEmail();
	});
	
	function createEmail() {
		var email = $("#emailname").val() + '.' + $("#emailbatch").val() + "@cse.mrt.ac.lk";
		$("#emaillbl").text("(" + email + ")");
		$("#emailHiddenInput").val(email);
		$("#batchHiddenInput").val($("#emailbatch").val());
	}
});