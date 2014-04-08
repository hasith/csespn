$( "#propose-session" )
  .button()
  .click(function() {
    $( "#dialog-form" ).dialog( "open" );
    return false;
  });

$( "#dialog-form" ).dialog({
  autoOpen: false,
  height: 500,
  width: 750,
  modal: true,
  buttons: {
    "Create an account": function() {
      $('#create_form').submit();
    },
    Cancel: function() {
      $( this ).dialog( "close" );
    }
  },
  close: function() {
    
  }
});