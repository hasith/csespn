var technologies = new Array();

function showForm() {
    $('#projectApplicationWrapper').css('left', 0);
}

function hideForm() {
    $('#projectApplicationWrapper').css('left', -99999);
}

$(document).ready(function() {

    //submit sort form
    $('input[name=sort]').change(function() {
        $("#sorterHiddenInput").val($('input[name=sort]:radio:checked').val());
        $("#techFilterHiddenInput").val($('#technoFilterCombo').find(":selected").val());
        $('#sortForm').submit();
    });

    $('#technoFilterCombo').change(function() {
        $("#sorterHiddenInput").val($('input[name=sort]:radio:checked').val());
        $("#techFilterHiddenInput").val($('#technoFilterCombo').find(":selected").val());
        $('#sortForm').submit();
    });



//displaing the form on request
    $("#addProject").click(function() {
        showForm();
    });

//hiding the form on request(background click)
    $('#projectApplicationWrapper').click(function(evt) {
        if ($(evt.target).attr('id') === $(this).attr('id')) {
            hideForm();
        }
    });

//auto suggest technologies
    $("#technologyTxt").bind("keydown", function(event) {
        if (event.keyCode === $.ui.keyCode.TAB &&
                $(this).data("ui-autocomplete").menu.active) {
            event.preventDefault();
        }
    }).autocomplete({
        minLength: 0,
        source: function(request, response) {
// delegate back to autocomplete, but extract the last term
            response($.ui.autocomplete.filter(
                    technologies, extractLast(request.term)));
        },
        focus: function(event, ui) {
            //$("#technologyTxt").val(ui.item.label);
            return false;
        },
        select: function(event, ui) {
            var terms = split(this.value);
            techValField = $('#technologyVals');
            var valTerms = split(techValField.val());
// remove the current input
            terms.pop();
            valTerms.pop();
// add the selected item
            terms.push(ui.item.label);
            valTerms.push(ui.item.value);
// add placeholder to get the comma-and-space at the end
            terms.push("");
            valTerms.push("");
            this.value = terms.join(", ");
            techValField.val(valTerms.join(","));
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item) {

        return $("<li>")
                .append("<a>" + item.label + "</a>")
                .appendTo(ul);
    };


});

/*
 * Highlight elements which fails vaildation
 * @param {type} elementId
 * @returns {undefined}
 */
function highlightElement(element, color) {
    element.css('border', '1px solid ' + color);
}

/*
 * calls when user submit
 * @returns {undefined}
 */
function submit() {
    if (validate()) {
        title = $("#titleTxt").val();
        estimation = $("#estimatedTimeTxt").val();
        technologiesVal = $("#technologyVals").val();
        partner = $('#partnerCombo').find(":selected").val();
        lead = $('#leadCombo').find(":selected").val();
        description = $('#descriptionTxt').val();
        category = $('#categoryCombo').find(":selected").val();
        sendRequest(title, partner, estimation, lead, technologiesVal, description, category);
        hideForm();
        location.reload();
    }

}

/*
 * validate the user inputs
 * @returns {undefined}
 */
function validate() {
    estimationInput = $("#estimatedTimeTxt");
    technologiesInput = $("#technologyTxt");
    technologiesValInput = $("#technologyVals");
    partnerInput = $('#partnerCombo');
    leadInput = $('#leadCombo');
    descriptionInput = $('#descriptionTxt');
    titleInput = $("#titleTxt");

    var validated = true;

    highlightElement(partnerInput, 'green');
    highlightElement(leadInput, 'green');

    //title
    if (titleInput.val() === '') {
        highlightElement(titleInput, 'red');
        validated = false;
    } else {
        highlightElement(titleInput, 'green');
    }

    //estimated time
    if (estimationInput.val() === "") {
        highlightElement(estimationInput, 'red');
        validated = false;
    } else if (isNaN(estimationInput.val())) {
        highlightElement(estimationInput, 'red');
        validated = false;
    } else {
        highlightElement(estimationInput, 'green');
    }

    //description
    if (descriptionInput.val() === '') {
        highlightElement(descriptionInput, 'red');
        validated = false;
    } else {
        highlightElement(descriptionInput, 'green');
    }

    //technologies
    if (split(technologiesInput.val()).length !== split(technologiesValInput.val()).length) {
        highlightElement(technologiesInput, 'red');
        technologiesInput.val('');
        technologiesValInput.val('');
        validated = false;
    } else if (technologiesInput.val() === '') {
        highlightElement(technologiesInput, 'red');
        validated = false;
    } else {
        highlightElement(technologiesInput, 'green');
    }

    return validated;
}

/**
 * spits by commas 
 * @param val string to split
 */
function split(val) {
    return val.split(/,\s*/);
}


function extractLast(term) {
    return split(term).pop();
}


//accordian UI of the projects
$(function() {

    $("#example-two").organicTabs({
        "speed": 200
    });


    $("#accordion").accordion({
        autoHeight: false,
        navigation: true
    });
    $("#accordion2").accordion({
        autoHeight: false,
        navigation: true
    });

});


//send post request
function sendRequest(title, partner, estimation, lead, technos, description, category) {
    $.ajax({
        url: "./research.php",
        type: 'POST',
        data: {valid: true, title: title, partner: partner, estimation: estimation, lead: lead, technologies: technos, description: description, category: category},
        success: function(data) {
            if (data === 'true') {
                return true;
            } else {
                return false;
            }
        }
    });
}




