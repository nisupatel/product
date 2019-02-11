jQuery(document).ready(function($) {

$('.tooltip_dt').tooltipster({
    contentCloning: true,
    contentAsHTML: true,
    interactive: true,
    maxWidth: 450,
    distance: 0,
  });

  $('.tooltip_matrix').tooltipster({
    contentCloning: true,
    contentAsHTML: true,
    maxWidth: 500,
    distance: 0,
    interactive : true,
  });

   $(".type_component_chk").click(function() {
    $(".type_component_chk").attr("checked", false); //uncheck all checkboxes
    $(this).attr("checked", true);  //check the clicked one
    if (this.value == "physical") {
      $("#type_soft_step1").hide();
      $("#type_physical_step1").show();
      $(".tree-box").removeClass("active_chk_container");
      $("#type_comp_physical").parent().parent().addClass("active_chk_container");
    }
    else if (this.value == "soft") {
      $("#type_physical_step1").hide();
      $("#type_soft_step1").show();
      $(".tree-box").removeClass("active_chk_container");
      $("#type_comp_soft").parent().parent().addClass("active_chk_container");
    }
  });

 $(".decision_tree:first .tree-box").click(function() {
    $(".type_component_chk").attr("checked", false); //uncheck all checkboxes
    $(this).children().children(".type_component_chk").attr("checked", true);
    var val = $(this).children().children(".type_component_chk").map(
      function(){
        return $(this).val();
    }).get();
    
    if (val == "physical") {
      $("#type_soft_step1").hide();
      $("#type_physical_step1").show();
      $(".tree-box").removeClass("active_chk_container");
      $("#type_comp_physical").parent().parent().addClass("active_chk_container");
    }
    else if (val == "soft") {
      $("#type_physical_step1").hide();
      $("#type_soft_step1").show();
      $(".tree-box").removeClass("active_chk_container");
      $("#type_comp_soft").parent().parent().addClass("active_chk_container");
    }
  });
var def_rating = {1:'#dt_rating_insufficient', 2:'#dt_rating_not_exposed', 4:'#dt_rating_moderate', 5:'#dt_rating_high'};
  if ($("#edit-dt-step1-rating")[0] && $("#edit-dt-step1-rating").val() != 0) {
    $(def_rating[$("#edit-dt-step1-rating").val()]).addClass('active');
  }
  if ($("#edit-dt-step2-rating")[0] && $("#edit-dt-step2-rating").val() != 0) {
    $(def_rating[$("#edit-dt-step2-rating").val()]).addClass('active');
  }
  if ($("#edit-dt-step4-rating")[0] && $("#edit-dt-step4-rating").val() != 0) {
    $(def_rating[$("#edit-dt-step4-rating").val()]).addClass('active');
  }
  
  $(".dt_rating_button li").click(function() {
    $(".dt_rating_button li").removeClass('active');
    $(this).addClass('active');
    
    var selected_item = $(this).html();
    
    $("#edit-dt-step1-rating option").filter(function() {
      return $(this).text() == selected_item; 
    }).prop('selected', true);
  });

   $(".dt_rating_button_step2 li").click(function() {
    $(".dt_rating_button_step2 li").removeClass('active');
    $(this).addClass('active');
    
    var selected_item = $(this).html();
    
    $("#edit-dt-step2-rating option").filter(function() {
      return $(this).text() == selected_item; 
    }).prop('selected', true);
  });
  
  $(".dt_rating_button_step4 li").click(function() {
    $(".dt_rating_button_step4 li").removeClass('active');
    $(this).addClass('active');
    
    var selected_item = $(this).html();
    
    $("#edit-dt-step4-rating option").filter(function() {
      return $(this).text() == selected_item; 
    }).prop('selected', true);
  });
  
  $('#edit-dt-step3-ques1 input.form-checkbox').on('change', function() {
    $('#edit-dt-step3-ques1 input.form-checkbox').not(this).prop('checked', false);  
  });
  
  $('#edit-dt-step3-ques2 input.form-checkbox').on('change', function() {
    $('#edit-dt-step3-ques2 input.form-checkbox').not(this).prop('checked', false);  
  });
  
  $('#edit-dt-step3-ques3 input.form-checkbox').on('change', function() {
    $('#edit-dt-step3-ques3 input.form-checkbox').not(this).prop('checked', false);  
  });
  
  $('#edit-dt-step4-ques1 input.form-checkbox').on('change', function() {
    $('#edit-dt-step4-ques1 input.form-checkbox').not(this).prop('checked', false);  
  });

  /* Physical infrastructure/assets and soft components form validation step1 */
  $('#step1PhysicalForm #step1PhysicalSubmit').on('click',function(){
    var flag = true;
    if (!$('#edit-dt-step1-hazards .form-checkbox').is(':checked')) {
      $('#edit-dt-step1-hazards-error').remove();
      $('#edit-dt-step1-hazards').after('<div id="edit-dt-step1-hazards-error" style="color:red;font-weight:bold">Select at least one climate and geophysical hazards</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#edit-dt-step1-hazards').removeAttr('style');
      $('#edit-dt-step1-hazards-error').remove();
    }
      
    if ($('#edit-dt-step1-rating').val() == '0'){
      $('#edit-dt-step1-rating-error').remove();
      $('#step1PhysicalForm .dt_rating_button').after('<div id="edit-dt-step1-rating-error" style="color:red;font-weight:bold">Select Exposure Rating</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#step1PhysicalForm .dt_rating_button').removeAttr('style');
      $('#edit-dt-step1-rating-error').remove();
    }
    return flag;
  });

/* Physical infrastructure/assets and soft components form validation step2*/
  $('#step2PhysicalForm #step2PhysicalSubmit').on('click',function(){
    var flag = true;

    if (!$('#edit-dt-step2-impacts .form-checkbox').is(':checked')){
      $('#edit-dt-step2-impacts-error').remove();
      $('#edit-dt-step2-impacts').after('<div id="edit-dt-step2-impacts-error" style="color:red;font-weight:bold">Select at least any one subsectors</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",});
      flag = false;
    }
    else {
      var checked = $('#step2PhysicalForm .form-checkbox:checked').length;
      var limit = $('#ss_limit').val();
      if(limit != 0 && checked > limit){
        flag = false;
        $('#edit-dt-step2-impacts-error').remove();
        $('#edit-dt-step2-impacts').after('<div id="edit-dt-step2-impacts-error" style="color:red;font-weight:bold">You can select up to '+limit+' subsector</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",});
      }
      else {
        $('#edit-dt-step2-impacts').removeAttr('style');
        $('#edit-dt-step2-impacts-error').remove();
      }
    }
    
    if ($('#edit-dt-step2-rating').val() == '0'){
      $('#edit-dt-step2-rating-error').remove();
      $('#step2PhysicalForm .dt_rating_button_step2').after('<div id="edit-dt-step2-rating-error" style="color:red;font-weight:bold">Select Impact Rating</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",});
      flag = false;
    }
    else {
      $('#step2PhysicalForm .dt_rating_button_step2').removeAttr('style');
      $('#edit-dt-step2-rating-error').remove();
    }

    return flag;
  });

 /* Physical infrastructure/assets and soft components form validation step3 */
  $('#step3aPhysicalForm #step3aPhysicalSubmit').on('click',function(){
    var flag = true;
    if (!$('#edit-dt-softcom-types .form-checkbox').is(':checked')){
      $('#edit-dt-softcom-types-error').remove();
      $('#edit-dt-softcom-types').after('<div id="edit-dt-softcom-types-error" style="color:red;font-weight:bold">Please select above field.</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#edit-dt-softcom-types').removeAttr('style');
      $('#edit-dt-softcom-types-error').remove();
    }

    if (!$('#edit-dt-step3-ques1 .form-checkbox').is(':checked')) {
      $('#edit-dt-step3-ques1-error').remove();
      $('#edit-dt-step3-ques1').after('<div id="edit-dt-step3-ques1-error" style="color:red;font-weight:bold">Please select above field.</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#edit-dt-step3-ques1').removeAttr('style');
      $('#edit-dt-step3-ques1-error').remove();
    }

    if (!$('#edit-dt-step3-ques2 .form-checkbox').is(':checked')) {
      $('#edit-dt-step3-ques2-error').remove();
      $('#edit-dt-step3-ques2').after('<div id="edit-dt-step3-ques2-error" style="color:red;font-weight:bold">Please select above field.</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#edit-dt-step3-ques2').removeAttr('style');
      $('#edit-dt-step3-ques2-error').remove();
    }

    if (!$('#edit-dt-step3-ques3 .form-checkbox').is(':checked')) {
      $('#edit-dt-step3-ques3-error').remove();
      $('#edit-dt-step3-ques3').after('<div id="edit-dt-step3-ques3-error" style="color:red;font-weight:bold">Please select above field.</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#edit-dt-step3-ques3').removeAttr('style');
      $('#edit-dt-step3-ques3-error').remove();
    }

    return flag;
  });

/* Physical infrastructure/assets and soft components form validation step4 */
  $('#step3bPhysicalForm #step3bPhysicalSubmit').on('click',function(){
    var flag = true;
    if (!$('#edit-dt-step4-ques1 .form-checkbox').is(':checked')){
      $('#edit-dt-step4-ques1-error').remove();
      $('#edit-dt-step4-ques1').after('<span id="edit-dt-step4-ques1-error" style="color:red;font-weight:bold">Please select above field.</span>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#edit-dt-step4-ques1').removeAttr('style');
      $('#edit-dt-step4-ques1-error').remove();
    }
    return flag;
  });

    /* Outcome rating form validation step1 */
  $('#step4PhysicalForm #step4PhysicalSubmit').on('click',function(){
    var flag = true;
    
    if ($('#edit-dt-step4-rating').val() == '0'){
      $('#edit-dt-step4-rating-error').remove();
      $('#step4PhysicalForm .dt_rating_button_step4').after('<div id="edit-dt-step4-rating-error" style="color:red;font-weight:bold">Select Outcome Rating</div>').css({"border": "1px solid red", "background-color": "rgb(255, 206, 206)",}).focus();
      flag = false;
    }
    else {
      $('#step4PhysicalForm .dt_rating_button_step4').removeAttr('style');
      $('#edit-dt-step4-rating-error').remove();
    }

    return flag;
  });

});