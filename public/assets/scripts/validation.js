$(document).ready(function () {
 $(document).on('click','#projectSubmit',function(){ 
    var flag = true;
    var countryArray = [];
    if ($('#region_id').val() == '') {
        $('#region_id-error').remove();
        $('#region_id').focus().after('<span id="region_id-error" style="color:red;font-size: 13px;font-weight:bold">Select Region.</span>').css({ "border": "1px solid red", "background-color": "rgb(255, 206, 206)", });
        flag = false;
    }
    else {
        $('#region_id').removeAttr('style');
        $('#region_id-error').remove();
    }

    if ($('#tool_id').val() == '') {
        $('#tool_id-error').remove();
        $('#tool_id').after('<span id="tool_id-error" style="color:red;font-size: 13px;font-weight:bold">Select Screening Tool Type.</span>').css({ "border": "1px solid red", "background-color": "rgb(255, 206, 206)", });
        flag = false;
    }
    else {
        $('#tool_id').removeAttr('style');
        $('#tool_id-error').remove();
    }

    $('.country_id').each(function(index){
        var errorId = 'country_id'+index+'-error';
        if ($(this).val() == '') {
            $('#'+errorId).remove();
            $(this).focus().after('<span id="'+errorId+'" style="color:red;font-size: 13px;font-weight:bold">Select Country.</span>').css({ "border": "1px solid red", "background-color": "rgb(255, 206, 206)", });
            flag = false;
        }else if(jQuery.inArray($(this).val(), countryArray) !== -1) {
            $('#'+errorId).remove();
            $(this).focus().after('<span id="'+errorId+'" style="color:red;font-size: 13px;font-weight:bold">This country is already taken.</span>').css({ "border": "1px solid red", "background-color": "rgb(255, 206, 206)", });
            flag = false;
        }
        else {
            $(this).removeAttr('style');
            $('#'+errorId).remove();
        }
        countryArray.push($(this).val());
    })
    //alert('flag='+flag);
    return flag;
 });
});
function onNext() {
    //var form = $('#projectForm').serializeArray();
    //form = objectifyForm(form);
    var flag = true;
    if ($('#name').val() == '') {
        $('#name-error').remove();
        $('#name').after('<span id="name-error" style="color:red;font-size: 13px;font-weight:bold">Enter project name.</span>').css({ "border": "1px solid red", "background-color": "rgb(255, 206, 206)", });
        flag = false;
    }
    else {
        $('#name').removeAttr('style');
        $('#name-error').remove();
    }

    if ($('#project_number').val() == '') {
        $('#project-number-error').remove();
        $('#project_number').after('<span id="project-number-error" style="color:red;font-size: 13px;font-weight:bold">Enter project number.</span>').css({ "border": "1px solid red", "background-color": "rgb(255, 206, 206)", });
        flag = false;
    }
    else {
        $('#project_number').removeAttr('style');
        $('#project-number-error').remove();
    }

    if ($('#assessment_completed_by').val() == '') {
        $('#assessment-completed-by-error').remove();
        $('#assessment_completed_by').after('<span id="assessment-completed-by-error" style="color:red;font-size: 13px;font-weight:bold">Enter assessment completed by.</span>').css({ "border": "1px solid red", "background-color": "rgb(255, 206, 206)", });
        flag = false;
    }
    else {
        $('#assessment_completed_by').removeAttr('style');
        $('#assessment-completed-by-error').remove();
    }

    if (flag) {
        $(".secondStep").show();
        $(".firstStep").hide();
    }
}
function onPrev() {
    $(".firstStep").show();
    $(".secondStep").hide();
}