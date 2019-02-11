jQuery(document).ready(function($) {
 $(".dt_rating_button li").click(function() {
    $(".dt_rating_button li").removeClass('active');
    $(this).addClass('active');
    });

   $('.tooltip_dt').tooltipster({
    contentCloning: true,
    contentAsHTML: true,
    maxWidth: 450,
    distance: 0,
    interactive : true,
  });
  $('.tooltip_matrix').tooltipster({
    contentCloning: true,
    contentAsHTML: true,
    maxWidth: 500,
    distance: 0,
    interactive : true,
  });
  $('.tooltip_impact').tooltipster({
     contentCloning: true,
     contentAsHTML: true,
     maxWidth: 500,
     interactive : true,
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

  $('#edit-matrix-step3-ques1 input.form-checkbox').on('change', function() { // for non phy Ques1
    $('#edit-matrix-step3-ques1 input.form-checkbox').not(this).prop('checked', false); 
  });

  $('#edit-matrix-step3-ques2 input.form-checkbox').on('change', function() { // for non phy Ques2
    $('#edit-matrix-step3-ques2 input.form-checkbox').not(this).prop('checked', false);  
  });
  
  $('#edit-matrix-step3-ques3 input.form-checkbox').on('change', function() { // for non phy Ques3
    $('#edit-matrix-step3-ques3 input.form-checkbox').not(this).prop('checked', false);  
  });

  $('#edit-matrix-step3-ws-ques1 input.form-checkbox').on('change', function() { // for water sector Ques1
    $('#edit-matrix-step3-ws-ques1 input.form-checkbox').not(this).prop('checked', false);  
  });

  $('#edit-matrix-step3-sep-ques1 input.form-checkbox').on('change', function() { // for social Ques1
    $('#edit-matrix-step3-sep-ques1 input.form-checkbox').not(this).prop('checked', false);  
  });

jQuery(document).on('click','#edit-water-checkbox',function(){
 if (jQuery('#edit-water-checkbox').is(':checked')){
  jQuery('.checkbox-subsector .form-checkbox').attr('disabled','true');
 }
 else {
    jQuery('.checkbox-subsector .form-checkbox').removeAttr('disabled');
 }
});


 $('.geo-check').change(function() {
    var id = $(this).attr('id');
    if ($(this).is(':checked')){
      if(id == 'edit-hazard-other'){
        $('#others-title-txt').css('display','block');
        $('#others-title-txt-error').show();
      }

      $('.'+id).removeClass('hide');
    }
    else {
      if(id == 'edit-hazard-other'){
        $('#others-title-txt').css('display','none');
        $('#others-title-txt-error').hide();
      }
      $('.'+id).addClass('hide');
    }
  });


});

var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select1");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);


function goBack() {
    window.history.back();
}