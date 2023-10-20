var base_url = $("#base_url").val();
$(document).ready(function () {
	// list notes lead module  default call function page click
	listNotes();
	// regex validation
	let email_regax =
		/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	// save notes lead module
	$("#submit").click(function () {
		title_validation = $("#title").val();
		title_str = title_validation.replace(/ /g, "").length;
		if (title_str == 0) {
			alert("Please Fill Notes");
			return false;
		} else if (title_str > 2000) {
			alert("Notes Must Be 2000 Word Limit");
			return false;
		} else {
			$("#submit").attr('disabled',true);	
			let module_id = $("#module_id").val();
			let user_id = $("#user_id").val();
			let module_type = $("#module_type").val();
			let title = $("#title").val();
			let module_name = $("#module_name").val();
			let created_date = $("#created_date").val();
			$.ajax({
				type: "POST",
				// cache:false,
				url: base_url + "Lead/addNotes",
				data: {
					module_id: module_id,
					user_id: user_id,
					module_type: module_type,
					title: title,
					module_name: module_name,
					created_date: created_date,
				},
				success: function (data) {
					$("#title").val("");
					listNotes();
					$("#submit").removeAttr('disabled',true);	

					// window.location.reload();
				},
			});
		}
	});
	// list notes lead module
	let showAll = 0;
	function listNotes(showAll) {
		let module_id = $("#module_id").val();
		let module_type = $("#module_type").val();
		let first_name = $("#first_name").val();
		let user_name = $("#user_name").text();
		let first_letter = $("#user_name").text();
		var header = first_letter.charAt(0);
		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			url: base_url + "Lead/listNotes",
			data: {
				module_id: module_id,
				module_type: module_type,
			},
			success: function (data) {
				let html = "";
				let numEntries = showAll ? data.length : 3;
				if (numEntries == 3) {
					if (data.length == 1) {
						numEntries = 1;
					} else if (data.length == 2) {
						numEntries = 2;
					}
				}
				//Loop on confition for 3 and all
				for (let i = 0; i < numEntries; i++) {
					html += '<div class="user-notes d-flex mb-4">';
					html += '<div class="user-name">';
					html += "<p>" + header + "</p>";
					html += "</div>";
					html += '<div class="user-notes-detail ms-3">';
					html += '<div class="d-flex justify-content-between">';
					html += "<p class='show-read-more'>" + data[i].title + "</p>";
					html += '<div class="add-trash-btn">';
					html +=
						'<a  href="javascript:void(0)" class="me-3 getNoteMessage"  data-bs-toggle="modal" data-bs-target="#exampleModal2" data-title="' +
						data[i].title +
						'" data-id="' +
						data[i].id +
						'" ><i class="fa-solid fa-pencil"></i></a>';
					html +=
						'<a href="javascript:void(0)"  class="getNoteId" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' +
						data[i].id +
						'"><i class="fa-solid fa-trash"></i></a>';
					html += "</div>";
					html += "</div>";
					html +=
						'<div class="lead-notes" style="margin-top: -8px;"><span style="color: #616E88; font-size: 12px;"> ' +
						data[i].module_name +
						' - </span> <a href="javascript:void(0)" style="font-weight: 500; color: #2196F3;font-size: 12px;"> ' +
						first_name +
						'</a><span style="font-weight: 800; color: #616E88; font-size: 24px; padding: 15px;">.</span><a class="edit-notes" style="font-weight: 500;font-size: 14px; color:#616E88" href="javascript:void(0)">Add Note</a> <span style="font-weight: 800; color: #6d6b6b; font-size: 24px; padding: 15px;">.</span><a data-bs-toggle="tooltip" data-bs-placement="bottom" title="' +
						data[i].created_date +
						'"><i class="fa-solid fa-clock"></i></a><span style="color: #6d6b6b; font-size: 12px; padding: 10px;">' +
						data[i].created_date +
						' by <b style="color:#313949;">' +
						user_name +
						" </b> </span>";
					html += "</div>";
					html += "</div>";
					html += "</div>";
				}
				//Bydefault - 3 notes
				if (numEntries == 3 && data.length > 3) {
					html +=
						'<button id="viewPreviousBtn" class="view_notes">View Previous Notes</button>';
				}
				// Show Data if exist
				if (html == "") {
					$("#listnotes").attr("style", "height:0px !important;");
				} else {
					$("#listnotes").removeAttr("style", "height:0px !important;");
				}
				//show in div
				$("#listnotes").html(html);
				// Click handler for the "View Previous" button
				$(document).on("click", "#viewPreviousBtn", function () {
					showAll = true;
					listNotes(showAll);
				});
			},
		});
	}

	// get delete notes module lead
	jQuery(document).on("click", ".getNoteId", function () {
		let id = $(this).data("id");
		$(".deleteIdSet").html(id);
	});
	// delete notes module lead
	$(".deleteNotes").click(function () {
		let id = $(".deleteIdSet").text();
		$.ajax({
			type: "POST",
			url: base_url + "Lead/deleteNotes",
			data: {
				id: id,
			},
			success: function (data) {
				listNotes();
				// window.location.reload();
			},
		});
	});
	// get edit notes module lead
	jQuery(document).on("click", ".getNoteMessage", function () {
		$("#update_note_id").val($(this).data("id"));
		$("#update_note_message").val($(this).data("title"));
	});
	// edit notes module lead
	$(".EditNotes").click(function () {
		title_validation = $("#update_note_message").val();
		title_str = title_validation.replace(/ /g, "").length;
		if (title_str == 0) {
			alert("Please Fill Notes");
			return false;
		}

		let id = $("#update_note_id").val();
		let message = $("#update_note_message").val();
		let module_name = $("#module_name").val();
		let updated_date = $("#updated_date").val();
		if (message == "") {
			alert("Please Fill Note");
		} else {
			$.ajax({
				type: "POST",
				url: base_url + "Lead/editNotes",
				data: {
					id: id,
					message: message,
					module_name: module_name,
					updated_date: updated_date,
				},
				success: function () {
					listNotes();
					// window.location.reload();
				},
			});
		}
	});
	// lead module detail page data edit
	$(".check-input-check").click(function () {
		first_name = $("#first_name").val();
		last_name = $("#last_name").val();
		mobile_1 = $("#mobile_1").val();
		mobile_2 = $("#mobile_2").val();
		email = $("#email").val();
		lead_status = $("#lead_status").val();
		description = $("#description").val();
		hidden_id = $("#hidden_id").val();
		var get_data = "";
		if (first_name == "") {
			$("#message").text("First Name Is Required");
			get_value($("#hidden_id").val(), "first_name");
			return false;
		} else if (last_name == "") {
			$("#message").text("Last Name Is Required");
			get_value($("#hidden_id").val(), "last_name");
			return false;
		} else if (mobile_1 == "") {
			$("#message").text("Mobile Number Is Required");
			get_value($("#hidden_id").val(), "mobile_1");
			return false;
		} else if ($("#mobile_1").val().length != 10) {
			$("#message").text("Phone number must be 10 digits");
			get_value($("#hidden_id").val(), "mobile_1");
			return false;
		} else if (
			$("#mobile_2").val() != "" &&
			$("#mobile_2").val().length > 0 &&
			$("#mobile_2").val().length != 10
		) {
			$("#message").text("Alt Phone number must be 10 digits");
			get_value($("#hidden_id").val(), "mobile_2");
			return false;
		} else if ($("#mobile_1").val() == $("#mobile_2").val()) {
			alert("Phone number 2 should not be same as phone number 1");
			$("#mobile_2").css("border", "1px solid red");
			$("#mobile_2").focus();
			return false;
		} else if (email == "") {
			$("#message").text("Email Address Is Required");
			get_value($("#hidden_id").val(), "email");
			return false;
		} else if (!email_regax.test(email)) {
			$("#message").text("Please Enter Valid Email Address");
			get_value($("#hidden_id").val(), "email");
			return false;
		} else if (lead_status == "") {
			$("#message").text("Lead Status Is Required");
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url + "Lead/detailPageedit",
				data: {
					first_name: first_name,
					last_name: last_name,
					mobile_1: mobile_1,
					mobile_2: mobile_2,
					email: email,
					lead_status: lead_status,
					hidden_id: hidden_id,
					description: description,
				},
				success: function (data) {
					if (data == 2) {
						alert("Lead Sale Successfully");
						window.location = base_url + "list-contact";
					}
					$("#message").text(data);
				},
			});
		}
	});
});

function get_value(get_id, get_column_name) {
	let id = get_id;
	let column_name = get_column_name;
	// alert(column_name);
	// return false;
	$.ajax({
		type: "POST",
		url: base_url + "Lead/getValue",
		data: {
			id: id,
			column_name: column_name,
		},
		success: function (data) {
			$("#" + get_column_name).val(data);
		},
	});
}
//email id and mobile number validate lead module detail page
//  lead module delete leads
$("#Delete").click(function () {
	if (confirm("Are You Sure Delete This Row")) {
		var val = [];
		$(".deletes_id:checkbox:checked").each(function (i) {
			val[i] = $(this).val();
			leadIds = val[i];

			$.ajax({
				type: "POST",
				url: base_url + "Lead/deleteLead",
				data: {
					leadIds: leadIds,
				},
				success: function (data) {
					// alert("Lead Deleted Successfully");
					window.location.reload();
				},
			});
		});
	}
});
// filters
function SelectOption() {
	let date = $("#SelectdValue option:selected").val();
	if (!$("#SelectdValue option:selected").val() == "") {
		$(".getpreoption").hide();
	} else {
		$(".getpreoption").show();
	}
}
// detail page filled
$("input").click(function () {
	$(".check-close a").show();
});
$(".check-input-check").click(function () {
	$(".check-close a").hide();
});
// booking module name select
function bookingsName() {
	let name = $(".bookings_name option:selected").val();
	$.ajax({
		type: "POST",
		url: base_url + "Bookings/getBooking",
		dataType: "JSON",
		data: {
			name: name,
		},
		success: function (data) {
			$("#mobile_1").val(data[0].mobile_1);
			$("#mobile_2").val(data[0].mobile_2);
			$("#email").val(data[0].email);
			$("#last_name").val(data[0].last_name);

			// console.log(data[0].mobile_1);
		},
	});
}
function taXable(id) {
	let ids = id;
	if (ids == 1) {
		$(".taxable-input").removeClass("d-none");
		// $(".taxable-one").removeAttr('checked');
	} else {
		$(".taxable-input").addClass("d-none");
		// $(".taxable-one").removeAttr('checked');
	}
}
$("#transferLead").click(function () {
	var val = [];
	var tech_user = $(".tech_user").val();
	if (tech_user == "") {
		alert("Please Select Tech User");
		return false;
	}
	var leadID = 0;
	var leadID = $(".deletes_id:checkbox:checked").length;
	if (leadID == 0) {
		alert("Please Select Lead");
		return false;
	} else {
		if (confirm("Are You Sure Transfer Lead")) {
			var leadIds = [];
			$(".deletes_id:checkbox:checked").each(function (i) {
				val[i] = $(this).val();
				leadIds.push(val[i]);
			});
			$.ajax({
				type: "POST",
				url: base_url + "lead/transferLead",
				data: {
					leadIds: leadIds,
					tech_user: tech_user,
				},
				success: function (data) {
					if (data == 1) {
						alert("Lead Transfered Successfully");
						window.location.reload();
					} else {
						return false;
					}
				},
			});
		}
	}
});
$(".tech_lead_status").change(function () {
	var lead_status = $(this).val();
	if (lead_status == 2) {
		$(".tech_lead_notes").removeClass("d-none");
	} else {
		$(".tech_lead_notes").addClass("d-none");
	}
});

$(".due_date_option").change(function () {
	var get_date = $(this).val();
	var date = new Date();

	output = date.setDate(date.getDate() + parseInt(get_date));

	var month = date.getMonth() + 1;
	var day = date.getDate();

	var output =
		date.getFullYear() +
		"-" +
		(month < 10 ? "0" : "") +
		month +
		"-" +
		(day < 10 ? "0" : "") +
		day;
	
		$("#due_date").val(output);
		let output_res = date.getFullYear() +
		"," +
		(month < 10 ? "0" : "") +
		month +
		"," +
		(day < 10 ? "0" : "") +
		day;
	$("#due_date").datepicker({  
		autoclose: true,  
		todayHighlight: true, 
	}).datepicker('update', new Date(output_res));
	
});
$('form').attr('autocomplete', 'off');
//    cancle notes button click blank textarea
$("#cancel").click(function () {
	if ($(".textarea-style").val() != "") {
		$(".textarea-style").val("");
	}
});


$(document).ready(function(){
	var maxLength = 300;
	$(".show-read-more").each(function(){
		var myStr = $(this).text();
		if($.trim(myStr).length > maxLength){
			var newStr = myStr.substring(0, maxLength);
			var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
			$(this).empty().html(newStr);
			$(this).append(' <a href="javascript:void(0);" class="read-more text-primary"> read more...</a>');
			$(this).append('<span class="more-text">' + removedStr + '</span>');
		}
	});
	$(".read-more").click(function(){
		$(this).siblings(".more-text").contents().unwrap();
		$(this).remove();
	});
});
