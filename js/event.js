$(document).ready(function() {
    $("#event-dialog").dialog({
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

    $("#sponsorships-dialog").dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        buttons: {
            "Take Sponsorship": function() {
                var id = $("#sp-dialog-id").val();
                var access_level = $("#user-level").val();
                $(this).dialog("close");
                showTakeSposorshipDialog(id, access_level);
            },
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

    $("#sp-confirm-dialog").dialog({
        autoOpen: false,
        width: 500,
        modal: true,
        buttons: {
            "Confirm": function() {
                takeSponsorship();
            },
            "Cancel": function() {
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

    $("#message-dialog").dialog({
        autoOpen: false,
        width: 500,
        modal: true,
        buttons: {
            Ok: function() {
                if($(this).find("#reload-at-ok").val() === "true"){
                    location.reload(true);
                }
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
    
    $("#wait-dialog").dialog({
        autoOpen: false,
        dialogClass: "noTitleDialog",
        width: 100,
        height: 100,
        modal: true,
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
        showEventDetails(id);
    });

    $(document).on("click", ".open-sponsorship-entry", function(e) {
        e.preventDefault();
        var id = $("#sponsorship-id", this).val();
        showSponsorshipDetails(id);
    });

    $(document).on("click", ".sp-more-det", function(e) {
        e.preventDefault();
        var id = $(this).val();
//        $("#event-dialog").dialog("close");
        showSponsorshipDetails(id);
    });

    function showEventDetails(id) {
        $.ajax(
                {
                    url: "events.get.php",
                    type: "POST",
                    data: "event_id=" + id,
                    success: function(data, textStatus, jqXHR)
                    {
                        var event = JSON.parse(data);
                        setEventDialogContent(event, false);
                        $("#event-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        setEventDialogContent("", true);
                        $("#event-dialog").dialog("open");
                    }
                });
    }

    function showSponsorshipDetails(id) {
        $.ajax(
                {
                    url: "sponsorships.get.php",
                    type: "POST",
                    data: "sponsorship_id=" + id,
                    success: function(data, textStatus, jqXHR)
                    {
                        var sponsorship = JSON.parse(data);
                        $("#sponsorships-dialog").dialog('option', 'title', "Sponsorship Details");
                        $("#sponsorships-dialog").html(setSponsDialogContent(sponsorship, false));
                        $("#sponsorships-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $("#sponsorships-dialog").dialog('option', 'title', "Sponsorship Details");
                        $("#sponsorships-dialog").html(setSponsDialogContent("", true));
                        $("#sponsorships-dialog").dialog("open");
                    }
                });
    }

    function setEventDialogContent(event, isError) {

        var eventDetails = event[0];
        var sponsorships = event[1];

        if (isError) {
            $("#event-dialog-desc").html("An Error Occurred! :(");
            return;
        }

        var htmlContent = "";

        $("#event-dialog").dialog('option', 'title', eventDetails.title);

        if (eventDetails.description) {
            $("#event-dialog-desc").html(eventDetails.description);
        }
        else {
            $("#event-dialog-desc").html("");
        }

        $("#event-dialog-date").html(eventDetails.date);

        if (eventDetails.time) {
            $("#event-dialog-time-label").show();
            $("#event-dialog-time").html(eventDetails.time.substring(0, eventDetails.time.lastIndexOf(":")));
        }
        else {
            $("#event-dialog-time-label").hide();
            $("#event-dialog-time").html("");
        }

        if (eventDetails.venue) {
            $("#event-dialog-venue-label").show();
            $("#event-dialog-venue").html(eventDetails.venue);
        }
        else {
            $("#event-dialog-venue-label").hide();
            $("#event-dialog-venue").html("");
        }

        if (eventDetails.url) {
            $("#event-dialog-url-label").show();
            $("#event-dialog-url").attr("href", eventDetails.url);
            $("#event-dialog-url").html(eventDetails.url);
        }
        else {
            $("#event-dialog-url-label").hide();
            $("#event-dialog-url").attr("href", "#");
            $("#event-dialog-url").html("");
        }

        if (sponsorships.length > 0) {
            $("#event-dialog-sp-label").show();
            $("#event-dialog-sp").html(getSponsorshipDetails(sponsorships, ((new Date(eventDetails.date)) <= (new Date()))));
        }
        else {
            $("#event-dialog-sp-label").hide();
        }
//        $("#event-dialog").html(htmlContent);
    }

    function getSponsorshipDetails(sponsorships, isPastEvent) {
        var htmlContent = "";

        for (var i = 0; i < sponsorships.length; i++) {

            sponsorship = sponsorships[i][0];
            company = sponsorships[i][1];

            htmlContent += "<li>";
            htmlContent += "<p>" + sponsorship.name + " (Rs. " + sponsorship.amount + ")</p>";

            if (sponsorship.taken_by !== "") {
                htmlContent += "<p>" + company.name + "</p>";
            }
            else if (!isPastEvent) {
                htmlContent += "<p>";
                htmlContent += "<b>Sponsorship is open to take</b>  ";
                htmlContent += "<button class='sp-more-det' value='" + sponsorship.id + "'>More details...</button>";
                htmlContent += "</p>";
            }
            htmlContent += "</li>";
        }

        return htmlContent;
    }

    function setSponsDialogContent(sponsorship, isError) {

        if (isError) {
            $("#sponsorships-dialog").dialog('option', 'title', "An Error Occurred! :(");
            return;
        }

        $("#sp-dialog-id").val(sponsorship.id);
        $("#sponsorships-dialog").dialog('option', 'title', sponsorship.name);
        $("#sp-dialog-name").html(sponsorship.name);
        $("#sp-dialog-amount").html(sponsorship.amount);

        if (sponsorship.description) {
            $("#sp-dialog-desc").html(sponsorship.description);
        }
    }

    function showTakeSposorshipDialog(id, access_level) {
        if (access_level < 3) {
            //$("#reload-at-ok").val(false);
            //$("#message-dialog").dialog('option', 'title', 'Sorry');
            //$("#message-dialog-content").html("Only Basic and Premium Partners can apply for sponsorships...");
            //$("#message-dialog").dialog("open");
            premiumFeature();
        }
        else {
            $("#sp-apply-form").find("#sp-id").val(id);
            $("#error-message").hide();
            $("#sp-confirm-dialog").dialog("open");
        }
    }

    function takeSponsorship() {
        var dataObj = $("#sp-apply-form").serializeArray();

        for (var i = 0; i < dataObj.length; i++) {
            if (dataObj[i]['value'] === "") {
                $("#error-message").show();
                return;
            }
        }

        var dataString = $("#sp-apply-form").serialize();

        $.ajax(
                {
                    url: "sponsorships.take.php",
                    type: "POST",
                    data: dataString,
                    beforeSend: function() {
                        $("#sp-confirm-dialog").dialog("close");
                        $("#event-dialog").dialog("close");
                        $("#wait-dialog").dialog("open");
                    },
                    success: function(data, textStatus, jqXHR)
                    {
                        $("#wait-dialog").dialog("close");
                        if (JSON.parse(data)) {
                            $("#reload-at-ok").val(true);
                            $("#message-dialog-content").html("Operation Successful. Thank You!");
                            $("#message-dialog").dialog("open");
                        }
                        else {
                            $("#message-dialog-content").html("Some error occured. Please try again.");
                            $("#message-dialog").dialog("open");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $("#wait-dialog").dialog("close");
                        $("#message-dialog-content").html("Some error occured. Please try again.");
                        $("#message-dialog").dialog("open");
                    }
                });
    }
});
