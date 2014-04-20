$(document).ready(function() {
    $("#event-dialog").dialog({
        autoOpen: false,
        width: 500,
        modal: true,
        dialogClass: 'noTitleDialog',
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

    $(document).on("click", ".calendar-entry", function(e) {
        e.preventDefault();
        var id = $("#event-id", this).val();

        $.ajax(
                {
                    url: "events.get.php",
                    type: "POST",
                    data: "event_id=" + id,
                    success: function(data, textStatus, jqXHR)
                    {
                        var event = JSON.parse(data);
                        $("#event-dialog").html(getEventDialogContent(event, false));
                        $("#event-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $("#event-dialog").html(getEventDialogContent("", true));
                        $("#event-dialog").dialog("open");
                    }
                });
    });

    $(document).on("click", ".open-sponsorship-entry", function(e) {
        e.preventDefault();
        var id = $("#sponsorship-id", this).val();

        console.log(id);

        $.ajax(
                {
                    url: "sponsorships.get.php",
                    type: "POST",
                    data: "sponsorship_id=" + id,
                    success: function(data, textStatus, jqXHR)
                    {
                        var event = JSON.parse(data);
                        $("#event-dialog").html(getSponsDialogContent(event, false));
                        $("#event-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $("#event-dialog").html(getSponsDialogContent("", true));
                        $("#event-dialog").dialog("open");
                    }
                });
    });

    function getEventDialogContent(event, isError) {

        if (isError) {
            return "<h3>An Error Occurred! :(</h3>";
        }

        var htmlContent = "";

        htmlContent += "<h2>" + event.title + "</h2>";

        if (event.description) {
            htmlContent += "<p>" + event.description + "</p>";
        }

        htmlContent += "<p><b>Date: </b>" + event.date + "</p>";

        if (event.time) {
            htmlContent += "<p><b>Time: </b>" + event.time.substring(0, event.time.lastIndexOf(":")) + "</p>";
        }

        if (event.venue) {
            htmlContent += "<p><b>Venue: </b>" + event.venue + "</p>";
        }

        if (event.url) {
            htmlContent += "<p><b>More info: </b></br>";
            htmlContent += "<a href='" + event.url + "' target='_blank'>" + event.url + "</a>";
            htmlContent += "</p>";
        }

        return htmlContent;
    }

    function getSponsDialogContent(sponsorship, isError) {

        if (isError) {
            return "<h3>An Error Occurred! :(</h3>";
        }

        var htmlContent = "";

        htmlContent += "<h2>" + sponsorship.name + "</h2>";
        htmlContent += "<p><b>Amount: </b>Rs. " + sponsorship.amount + "</p>";

        if (sponsorship.description) {
            htmlContent += "<p>" + sponsorship.description + "</p>";
        }

        //temparary line
        htmlContent += "<p><i>(Please contact Department of CSE to take this sponsorship.)</i></p>";
        return htmlContent;
    }
});
