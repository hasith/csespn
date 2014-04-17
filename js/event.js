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
                url: "events.details.php",
                type: "POST",
                data: "event_id=" + id,
                success: function(data, textStatus, jqXHR)
                {
                    var event = JSON.parse(data);
                    $("#event-dialog").html(getDialogContent(event, false));
                    $("#event-dialog").dialog("open");
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    $("#event-dialog").html(getDialogContent("", true));
                    $("#event-dialog").dialog("open");
                }
            });
});

function getDialogContent(event, isError) {

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
        htmlContent += "<p><b>Time: </b>" + event.time.substring(0,event.time.lastIndexOf(":"))  + "</p>";
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

