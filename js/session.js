$(document).ready(function(){
		
	$( "#propose-session" )
	  .button()
	  .click(function() {
	    $( "#dialog-form" ).dialog( "open" );
	    return false;
	  });
	
	$( "#dialog-form" ).dialog({
	  autoOpen: false,
	  height: 500,
	  width: 850,
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
	
	$("#datepicker").datepicker({ dateFormat: "yy-mm-dd" });
	$("#create_form").validate();
});
