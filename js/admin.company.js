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