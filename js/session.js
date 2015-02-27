$(document).ready(function(){
    
 $('#usertable').dataTable();   
		
	$( "#propose-session" ).button().click(function() {
        if($(this).data("access") >= 2) {
            $('#create_form').populate({});
	        $( "#dialog-form" ).dialog( "open" );
        } else {
            premiumFeature();
        }
	  	
	    return false;
	  });
	
	$( "#dialog-form" ).dialog({
	  autoOpen: false,
	  height: 520,
	  width: 850,
	  modal: true,
	  buttons: {
	    "Save": function() {
	      $("input[name='queryString']").val(location.search);
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
        
        
    $('#session-time').timepicker({
        'minTime': '7:30am',
        'maxTime': '7:30pm',
        'timeFormat': 'H:i'
    });
        
        
	$("#create_form").validate();
	
	$(".session_edit").click(function(){
		var sessionId = $(this).data("id");
		$.getJSON( "./sessions.get.php?id=" + sessionId, function( data ) {
  			$('#create_form').populate(data);
  			$( "#dialog-form" ).dialog( "open" );
	    	return false;
		});
	});
	
	$("#dialog-confirmation").dialog({
	  autoOpen: false,
	  height: 470,
	  width: 750,
	  modal: true,
	  buttons: {
	    "Confirm Facilitation": function() {
	    	$("input[name='queryString']").val(location.search);
	    	$("#confirmation_form").submit();
	    },
	    "Cancel": function() {
	      $( this ).dialog( "close" );
	    }
	  }
	});
	
	$(".takeSession").click(function(){
		var access_level = $(this).data("access");
        if(access_level > 2){
            var sessionId = $(this).data("id");
            var orgId = $(this).data("orgid");
			
            $("#confirmation_form :input[name='sessionId']").val(sessionId);
            var url =  "sessions.facilitate.get.php?sessionId=" + sessionId;
            //get data on who else is interested
            $.ajax({
                dataType: "json",
                url: url
            }).done(function(data) {
				
				(data.length > 0)? $('#other_orgs').css({'display':'block'}) : $('#other_orgs').css({'display':'none'}) ;
				if(access_level > 4) {
					$('#facilitators').css({'display':'block'}) ;
					$('#facilitatorsdiv').css({'display':'none'}) ;
					
	                $("#facilitators tbody tr").remove();
					for(var i=0; i<data.length; i++) { 
	                    $('#facilitators').append(
							'<tbody><tr><td>' + data[i].company_name + '</td><td>' + data[i].resp_name + '</td><td>' + data[i].resp_contact + '</td><td>' + data[i].comment + '</td></tr></tbody>');
	                }
				} else {
					$('#facilitators').css({'display':'none'}) ;
					$('#facilitatorsdiv').css({'display':'block'}) ;
					var orgList = '&nbsp;&nbsp;&nbsp;&nbsp;';
					for(var i=0; i<data.length; i++) { 
	                    orgList = orgList + data[i] + ', ';
	                }
					$('#facilitatorsdiv').html(orgList.substring(0, orgList.length - 2));
				}
                
            });
            
            $("#dialog-confirmation").dialog( "open" );
        } else {
            premiumFeature();
        }
		
		return false;
	});

	$("input[name='filterby'][value=" + qs['filter'] + "]").prop('checked', true);

	$("input[name='filterby']").change(function(){
		var filter = $("input[name='filterby']:checked").val();
		updateQueryString("filter", filter);	
	});
	
	$("input[name='sortby'][value=" + qs['sort'] + "]").prop('checked', true);

	$("input[name='sortby']").change(function(){
		var filter = $("input[name='sortby']:checked").val();
		updateQueryString("sort", filter);	
	});
});
