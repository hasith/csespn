  
  $(document).ready(function() {
  
   $('#usertable').dataTable();
   
   
    $("#delete-dialog").dialog({
        autoOpen: false,
        height: 200,
        width: 500,
        modal: true,
        buttons: {
            "Yes": function() {
                var batch_id = $(this).find("#batch_id").val();
                confirmDelete(batch_id);
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
   
   
   $("#batch-dialog").dialog({
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
	
	 $(document).on("click", "#edit-batch", function(e) {
        var batch_id = $(this).attr("bt_id");
        showEditDialog(batch_id);
    });

	
	$(document).on("click", "#del-batch", function(e) {
        var batch_id = $(this).attr("bt_id");
        $("#delete-dialog").find("#batch_id").val(batch_id);
        $("#delete-dialog").dialog("open");
    });
	
	
	$(document).on("click", "#add-batches", function(e) {
        showAddDialog();
    });
	
	
	function confirmDelete(id) {
        console.log("delete->" + id);
        $.ajax(
                {
                    url: "admin.batches.delete.php",
                    type: "POST",
                    data: "id=" + id,
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
        $("#batch-dialog").dialog("option", "title", "Edit Batch");
        $.ajax(
                {
                    url: "admin.batches.get.php",
                    type: "POST",
                    data: "id=" + id,
                    success: function(data, textStatus, jqXHR)
                    {
                        var batch = JSON.parse(data)[0];
                        $("#batch-dialog").find("#batch-id").val(id);
                        $("#batch-dialog").find("#batches-dialog-name").val(batch["display_name"]);
                        $("#batch-dialog").find("#batches-dialog-course").val(batch["course"]);
                        $("#batch-dialog").find("#batches-dialog-year").val(batch["year"]);
                        $("#error-message").hide();
                        $("#batch-dialog").dialog("open");
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log("Error occurred");
                    }
                });

    }
	
	function showAddDialog() {
        $("#batch-dialog").dialog("option", "title", "Add New Batches");
        $("#batch-dialog").find("#batch-id").val(-1);
        $("#batch-dialog").find("#batches-dialog-name").html("");
        $("#batch-dialog").find("#batches-dialog-course").html("");
        $("#batch-dialog").find("#batches-dialog-year").html("");
		$("#error-message").hide();
        $("#batch-dialog").dialog("open");
		}
		
		function saveEvent() {
        var eventObj = $("#batch-add-form").serializeArray();
        if ((eventObj[1]['value'] === "") || (eventObj[2]['value'] === "")) {
            $("#error-message").show();
            return;
        }

        var eventString = $("#batch-add-form").serialize();

        $.ajax(
                {
                    url: "admin.batches.save.php",
                    type: "POST",
                    data: eventString,
                    beforeSend: function() {
                        $("#batch-dialog").dialog("close");
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
		
		
		