<div style="display: none" id="premium-feature-dialog" title="Corporate Feature...">
    This feature is available only for corporate users. 
    <br/></br/>
    If your organization would like to obtain a partnership, 
    please contact Dr. Chandana Gamage (chandag@cse.mrt.ac.lk) for details.
    <br/></br/>
    Thanks for your interest :)
</div> 

<script>
    $( "#premium-feature-dialog" ).dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        buttons: {
            Close: function() {
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
    function premiumFeature() {
        $( "#premium-feature-dialog" ).dialog( "open" );
        return false;
    }
</script>
