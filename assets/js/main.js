// "use strict";
// Profile information form jQuery code

$('#user_info_btn').click(function () {
    $('.user_info').fadeIn()
});

$('.close_btn').click(function () {
    $('.user_info').fadeOut()
});


$('.accordion-body .form-check-input').click(function() {
    $(this).siblings('.user-system').toggleClass('d-none');
})

$('.clear_check').click(function(){
    if ($(".form-check-input").prop('checked', $(this).prop("checked"))) {
        var numberNotCheck = $('.form-check-input:not(":checked")').length;
        if (numberNotCheck) {
            $(".user-system").addClass('d-none');
            $(".form-check-input").prop('checked', false);
         
        } else {
          
        }
    } else {
    }
})

$(".down-checkbox").change(function() {
var numberNotChecked = $('.down-checkbox:checked').length;
if(numberNotChecked)
{
    $(".delete-btn").removeClass('d-none');
}
else
{  
    $(".delete-btn").addClass('d-none');
}
}).triggerHandler('click');


$('.all-select').click(function() {
var total_record = $('#total_record').val();
if(total_record>0)
{
$(".down-checkbox").prop('checked', $(this).prop("checked"));
var numberNotChecked = $('.down-checkbox:not(":checked")').length;
if(numberNotChecked)
{  
    $(".delete-btn").addClass('d-none');
}
else
{     
    $(".delete-btn").removeClass('d-none');
}
}
});


/* $('.edit-notes').click(function(){
    // $('.textarea-style').css({"border-color": "#b41e45;" , "box-shadow" : "0px 0px 5px 0px #b41e45;"})
    $('.textarea-style').focus();
}) */
