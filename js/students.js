//$(document).ready(function(){
    
    function techFilter() {
        var techs = $('#technoFilterCombo').find(":selected").map( function() { return this.value; }).get();
        updateQueryString("technology", techs);	
        return false;
    }
    
    function techClear() {
        updateQueryString("technology", []);	
        return false;
    }

    $("#dialog-form").dialog({
      autoOpen: false,
      height: 420,
      width: 550,
      modal: true,
      buttons: {
        Close: function() {
          $( this ).dialog( "close" );
        }
      }
    });
    
    function showUniScorecard(el) {
        var studentId = el.data("student_id");
		$.getJSON( "./uniscore.get.php?student_id=" + studentId, function( data ) {
  			$('#create_form').populate(data);
  			$( "#dialog-form" ).dialog( "open" );
	    	return false;
		});
        return false;
    }
    
    $(".batch-tab").click(function(){
        updateQueryString("batch", $(this).data('batch'));	
    });
    
    
    
    
    $('#technoFilterCombo').val(qs['technology'])
    
    $(function() {
        $("#example-two").organicTabs({
            "speed": 200
        });
        $("#accordion").accordion({
            autoHeight: true,
            navigation: true,
            collapsible: true,
            heightStyle: "content" 
        });
        
    });
    
   $("#accordion a").click(function() {
        var href = $(this).attr("href");
        if(href && href !== '') {
            window.open(href, '_blank');
        } else {
            //premiumFeature();
        }
        
        return false;
   });
    
   $("#team-dialog").dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        buttons: {
            Unlikely: function() {
                $(this).dialog("close");
            },
            Neutral: function() {
                $(this).dialog("close");
            },
            Likely: function() {
                $(this).dialog("close");
            }
        },
        show: {
            effect: "fade",
            duration: 200
        },
        hide: {
            effect: "fade",
            duration: 200
        }
    });
    
    $( "#assemble-team" )
	  .button()
	  .click(function() {
	    $( "#team-dialog" ).dialog( "open" );
	    return false;
	  });
	    

	$("input[name='sort'][value='" + qs['sort'] + "']").prop('checked', true);

	$("input[name='sort']").change(function(){
		var filter = $("input[name='sort']:checked").val();
		updateQueryString("sort", filter);	
	});
	    



//})