$(document).ready(function(){
		
	$('#usertable').dataTable();
	
	$( "#dialog-form" ).dialog({
	  autoOpen: false,
	  height: 400,
	  width: 550,
	  modal: true,
	  buttons: {
	    "Save": function() {
	      $('#create_form').submit();
	    },
	    Cancel: function() {
	      $( this ).dialog( "close" );
	    }
	  },
	  close: function() {
	    
	  }
	});
	
    $("#usertable").on('click','.companylink',function() {
		var userId = $(this).data("id");
		var companyId = $(this).data("companyid");
		$("#userId").val(userId);
		$("#companylist").val(companyId);
		$("#dialog-form").dialog( "open" );
		return false;
    });
});
