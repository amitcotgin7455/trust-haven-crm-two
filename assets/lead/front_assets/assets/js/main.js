

$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});

$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});



$(document).ready(function () {
  
    $('#example').DataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
    });
   
    
    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });


    $('.window-min').click(function(){
      $('.modal-content').draggable();
      $('.modal-content').toggleClass('active');
    })

});


    
  $(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.input-group #search_param').val(param);
     });
    });
var a = document.getElementByTagName('a').item(0);
$(a).on('keyup', function(evt){
console.log(evt);
if(evt.keycode === 13){

alert('search?');
} 
}); 
// search filter 
$(document).ready(function(e){
  $('.search-panel .dropdown-menu').find('a').click(function(e) {
  e.preventDefault();
  var param = $(this).attr("href").replace("#","");
  var concept = $(this).text();
  $('.search-panel span#search_concept').text(concept);
  $('.input-group #search_param').val(param);
   });
  });
var a = document.getElementByTagName('a').item(0);
$(a).on('keyup', function(evt){
console.log(evt);
if(evt.keycode === 13){

alert('search?');
} 
}); 
$( document ).ready(function() {
    
    var checkboxes = $("input[type='checkbox']"),
    actions = $("#actions");

    checkboxes.click(function() {
    
       actions.attr("hidden", !checkboxes.is(":checked"));
      
    });
      
});



$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
$('#time').datetimepicker({
    format: 'yyyy-mm-dd'
});



$('textarea#summernote').summernote({
    placeholder: 'Hello bootstrap 4',
    tabsize: 2,
    height: 100,
toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'italic', 'underline', 'clear']],
    // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    //['fontname', ['fontname']],
   // ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'hr']],
    //['view', ['fullscreen', 'codeview']],
    ['help', ['help']]
  ],
  });
 

  $(function(){
    $("#upload_link").on('click', function(e){
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
    });
    