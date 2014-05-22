$(document).ready(function() {

    $('#usertable').dataTable();



    $("#delete-dialog").dialog({
        autoOpen: false,
        height: 200,
        width: 500,
        modal: true,
        buttons: {
            "Yes": function() {
                var company_id = $(this).find("#company_id").val();
                confirmDelete(company_id);

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

    $("#company-dialog").dialog({
    autoOpen: false,
            width: 700,
            modal: true,
            buttons: {
            "Save": function() {
                
                //alert("This is a save button");
                saveCompany();
            },
                    Cancel: function() {
                    $(this).dialog("close");
                    }
            }
});

$(document).on("click", "#edit-company", function(e) {

    
    var company_id = $(this).attr("co_id");
    showEditDialog(company_id);
    
});


$(document).on("click", "#del-company", function(e) {
    var company_id = $(this).attr("co_id");
    $("#delete-dialog").find("#company_id").val(company_id);
    $("#delete-dialog").dialog("open");
});

$(document).on("click", "#add-company", function(e) {

    //alert("add company");
    showAddDialog();
});

function confirmDelete(id) {
    console.log("delete->" + id);
    $.ajax(
            {
                url: "company.delete.php",
                type: "POST",
                data: "company_id=" + id,
                success: function(data, textStatus, jqXHR)
                {
                    var result = JSON.parse(data);
                    if (result) {
                        $("#result-dialog").find("#op-result").html("Company Deleted Successfully");
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
    $("#company-dialog").dialog("option", "name", "Edit Company");
    $.ajax(
            {
                url: "company.get.php",
                type: "POST",
                data: "company_id=" + id,
                success: function(data, textStatus, jqXHR)
                {
                    var company = JSON.parse(data)[0];
                    $("#company-dialog").find("#company-id").val(id);
                    $("#company-dialog").find("#company-dialog-name").val(company["name"]);
                    $("#company-dialog").find("#company-dialog-accesslevel").val(company["accesslevel"]);
                    $("#error-message").hide();
                    $("#company-dialog").dialog("open");
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    console.log("Error occurred");
                }
            });

}

function showAddDialog() {
    $("#comapny-dialog").dialog("option", "name", "Add New Company");
    $("#Company-dialog").find("#company-id").val(-1);
    $("#company-dialog").find("#company-dialog-name").html("");
    $("#company-dialog").find("#company-dialog-accesslevel").html("");


    $("#error-message").hide();
    $("#company-dialog").dialog("open");
}

function saveCompany() {
    var companyObj = $("#company-edit-form").serializeArray();
    if ((companyObj[1]['value'] === "") || (companyObj[2]['value'] === "")) {
        $("#error-message").show();
        return;
    }

    var companyString = $("#company-edit-form").serialize();

    $.ajax(
    {
    url: "company.save.php",
            type: "POST",
            data: companyString,
            beforeSend: function() {
                $("#company-dialog").dialog("close");
            },
            success: function(data, textStatus, jqXHR)
            {
                console.log(data);
                if (JSON.parse(data)) {   
                   
                    $("#result-dialog").find("#op-result").html("Company Saved Successfully");
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
}
);
