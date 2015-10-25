$(document).ready(function() {

    $('#usertable').dataTable();

    $('#event-dialog-date').datepicker(
        {dateFormat: 'yy-mm-dd'}
    );

    $('#event-dialog-time').timepicker({
        'minTime': '6:00am',
        'maxTime': '11:00pm',
        'timeFormat': 'H:i'
    });

    $("#delete-dialog").dialog({
        autoOpen: false,
        height: 200,
        width: 500,
        modal: true,
        buttons: {
            "Yes": function() {
                var event_id = $(this).find("#event_id").val();
                confirmDelete(event_id);
                $(this).dialog("close");
            },
            "No": function() {
                $(this).dialog("close");
            }
        }
    });

    $("#result-dialog").dialog({
        autoOpen: false,
        height: 200,
        width: 500,
        modal: true,
        buttons: {
            OK: function() {
                $(this).dialog("close");
                location.reload(true);
            }
        }
    });

    $("#event-dialog").dialog({
        autoOpen: false,
        width: 700,
        modal: true,
        buttons: {
            "Save": function() {
                saveEvent();
            },
            Cancel: function() {
                $(this).dialog("close");
            }
        }
    });

    $(document).on("click", "#edit-event", function(e) {
        var event_id = $(this).attr("ev_id");
        showEditDialog(event_id);
    });

    $(document).on("click", "#del-event", function(e) {
        var event_id = $(this).attr("ev_id");
        $("#delete-dialog").find("#event_id").val(event_id);
        $("#delete-dialog").dialog("open");
    });

    $(document).on("click", "#add-event", function(e) {
        showAddDialog();
    });

    function confirmDelete(id) {
        console.log("delete->" + id);
        $.ajax(
                {
                    url: "events.delete.php",
                    type: "POST",
                    data: "event_id=" + id,
                    success: function(data, textStatus, jqXHR)
                    {
                        var result = JSON.parse(data);
                        if (result) {
                            $("#result-dialog").find("#op-result").html("Event Deleted Successfully");
                        }
                        else {
                            $("#result-dialog").find("#op-result").html("Some error occured! :(");
                        }
                        $("#result-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $("#result-dialog").find("#op-result").html("Some error occured! :(");
                        $("#result-dialog").dialog("open");
                    }
                });
    }

    function showEditDialog(id) {
        $("#event-dialog").dialog("option", "title", "Edit Event");
        $.ajax(
                {
                    url: "events.get.php",
                    type: "POST",
                    data: "event_id=" + id,
                    success: function(data, textStatus, jqXHR)
                    {
                        var event = JSON.parse(data)[0];
                        $("#event-dialog").find("#event-id").val(id);
                        $("#event-dialog").find("#event-dialog-title").val(event["title"]);
                        $("#event-dialog").find("#event-dialog-description").html(event["description"]);
                        $("#event-dialog").find("#event-dialog-date").val(event["date"]);
                        if (event["date_confirmed"] == 1) {
                            $("#event-dialog").find("#event-dialog-date-conf").attr('checked', true);
                        }
                        else {
                            $("#event-dialog").find("#event-dialog-date-conf").attr('checked', false);
                        }
                        $("#event-dialog").find("#event-dialog-time").val(event["time"]);
                        $("#event-dialog").find("#event-dialog-venue").val(event["venue"]);
                        $("#event-dialog").find("#event-dialog-url").val(event["url"]);
                        $("#error-message").hide();
                        $("#event-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log("Error occurred");
                    }
                });

    }

    function showAddDialog() {
        $("#event-dialog").dialog("option", "title", "Add New Event");
        $("#event-dialog").find("#event-id").val("");
        $("#event-dialog").find("#event-dialog-title").val("");
        $("#event-dialog").find("#event-dialog-description").html("");
        $("#event-dialog").find("#event-dialog-date").val("");
        $("#event-dialog").find("#event-dialog-date-conf").attr('checked', false);
        $("#event-dialog").find("#event-dialog-time").val("");
        $("#event-dialog").find("#event-dialog-venue").val("");
        $("#event-dialog").find("#event-dialog-url").val("");
        $("#error-message").hide();
        $("#event-dialog").dialog("open");
    }

    function saveEvent() {
        var eventObj = $("#event-edit-form").serializeArray();
        if ((eventObj[1]['value'] === "") || (eventObj[3]['value'] === "")) {
            $("#error-message").show();
            return;
        }

        var eventString = $("#event-edit-form").serialize();

        $.ajax(
                {
                    url: "events.save.php",
                    type: "POST",
                    data: eventString,
                    beforeSend: function() {
                        $("#event-dialog").dialog("close");
                    },
                    success: function(data, textStatus, jqXHR)
                    {
                        console.log(data);
                        if (JSON.parse(data)) {
                            $("#result-dialog").find("#op-result").html("Event Saved Successfully");
                        }
                        else {
                            $("#result-dialog").find("#op-result").html("Some error occured! :(");
                        }
                        $("#result-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        $("#result-dialog").find("#op-result").html("Some error occured! :(");
                        $("#result-dialog").dialog("open");
                    }
                });
    }
});
