var base_url = $("#base_url").val();
$(document).ready(function () {
	// list notes booking module  default call function page click
	listNotes_booking();
	let email_regax =
		/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	// booking module detail page data edit
	$(".check-input-check-booking").click(function () {
		hidden_id = $("#hidden_id").val();
		first_name = $("#first_name").val();
		last_name = $("#last_name").val();
		mobile_1 = $("#mobile_1").val();
		mobile_2 = $("#mobile_2").val();
		email = $("#email").val();
		date = $("#input_booking_date").val();
		time = $("#time").val();
		timezone = $("#timezone").val();
		booking_status = $("#booking_status").val();
		if (first_name == "") {
			$("#message").text("First Name Is Required");
			get_value_booking($("#hidden_id").val(), "first_name");
			return false;
		} else if (last_name == "") {
			$("#message").text("Last Name Is Required");
			get_value_booking($("#hidden_id").val(), "last_name");
			return false;
		} else if (mobile_1 == "") {
			$("#message").text("Mobile Number Is Required");
			get_value_booking($("#hidden_id").val(), "mobile_1");
			return false;
		} else if ($("#mobile_1").val().length != 10) {
			$("#message").text("Phone number must be 10 digits");
			get_value_booking($("#hidden_id").val(), "mobile_1");
			return false;
		} else if (
			$("#mobile_2").val() != "" &&
			$("#mobile_2").val().length > 0 &&
			$("#mobile_2").val().length != 10
		) {
			$("#message").text("Alt Phone number must be 10 digits");
			get_value_booking($("#hidden_id").val(), "mobile_2");
			return false;
		} else if ($("#mobile_1").val() == $("#mobile_2").val()) {
			alert("Phone number 2 should not be same as phone number 1");
			$("#mobile_2").css("border", "1px solid red");
			$("#mobile_2").focus();
			return false;
		} else if (email == "") {
			$("#message").text("Email Address Is Required");
			get_value_booking($("#hidden_id").val(), "email");
			return false;
		} else if (!email_regax.test(email)) {
			$("#message").text("Please Enter Valid Email Address");
			get_value_booking($("#hidden_id").val(), "email");
			return false;
		} else if (date == "") {
			$("#message").text("Date Is Required");
			get_value_booking($("#hidden_id").val(), "txtDate");
			return false;
		} else if (time == "") {
			$("#message").text("Time Is Required");
			get_value_booking($("#hidden_id").val(), "time");
			return false;
		} else if (timezone == "") {
			$("#message").text("Time Zone Is Required");
			get_value_booking($("#hidden_id").val(), "timezone");
			return false;
		} else if (booking_status == "") {
			$("#message").text("Booking Status Is Required");
			get_value_booking($("#hidden_id").val(), "booking_status");
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url + "Bookings/detailPageedit",
				data: {
					first_name: first_name,
					last_name: last_name,
					mobile_1: mobile_1,
					mobile_2: mobile_2,
					email: email,
					date: date,
					time: time,
					timezone: timezone,
					booking_status: booking_status,
					hidden_id: hidden_id,
				},
				success: function (data) {
					$("#message").text('');

				}
			});
		}
	});

	function get_value_booking(get_id, get_column_name) {
		let id = get_id;
		let column_name = get_column_name;
		// alert(column_name);
		// return false;
		$.ajax({
			type: "POST",
			url: base_url + "Bookings/getValuebooking",
			data: {
				id: id,
				column_name: column_name,
			},
			success: function (data) {
				$("#" + get_column_name).val(data);
			},
		});
	}

	//  booking module delete booking
	$("#DeleteBooking").click(function () {
		if (confirm("Are You Sure Delete This Row")) {
			var val = [];
			$(".deletes_id:checkbox:checked").each(function (i) {
				val[i] = $(this).val();
				leadIds = val[i];

				$.ajax({
					type: "POST",
					url: base_url + "Bookings/deleteBooking",
					data: {
						leadIds: leadIds,
					},
					success: function (data) {
						// alert("Booking Deleted Successfully");
						window.location.reload();
					},
				});
			});
		}
	});

	// save notes booking module
	$("#submit_booking").click(function () {
		title_validation = $("#title").val();
		title_str = title_validation.replace(/ /g, "").length;
		if (title_str == 0) {
			alert("Please Fill Notes");
			return false;
		} else if (title_str > 2000) {
			alert("Notes Must Be 2000 Word Limit");
			return false;
		} else {
			$("#submit_booking").attr('disabled',true);	
			let module_id = $("#module_id").val();
			let user_id = $("#user_id").val();
			let module_type = $("#module_type").val();
			let title = $("#title").val();
			let module_name = $("#module_name").val();
			let created_date = $("#created_date").val();
			$.ajax({
				type: "POST",
				// cache:false,
				url: base_url + "Bookings/addNotes",
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
					$("#submit_booking").removeAttr('disabled',true);	
					listNotes_booking();
					//.window.location.reload();
				},
			});
		}
	});

	// list notes booking module
	let showAll_booking = 0;
	function listNotes_booking(showAll_booking) {
		let module_id = $("#module_id").val();
		let module_type = $("#module_type").val();
		let first_name = $("#first_name").val();
		// alert(first_name);
		let get_booking_first_name = $("#get_booking_first_name").val();
		let user_name = $("#user_name").text();
		let first_letter = $("#user_name").text();
		var header = first_letter.charAt(0);

		$.ajax({
			type: "POST",
			async: false,
			dataType: "json",
			url: base_url + "Bookings/listNotes",
			data: {
				module_id: module_id,
				module_type: module_type,
				first_name: first_name,
			},
			success: function (data) {
				let html = "";
				let numEntries = showAll_booking ? data.length : 3;
				if (numEntries == 3) {
					if (data.length == 1) {
						numEntries = 1;
					} else if (data.length == 2) {
						numEntries = 2;
					}
				}
				for (let i = 0; i < numEntries; i++) {
					html += '<div class="user-notes d-flex mb-4">';
					html += '<div class="user-name">';
					html += "<p>" + header + "</p>";
					html += "</div>";
					html += '<div class="user-notes-detail ms-3">';
					html += '<div class="d-flex justify-content-between">';
					html += "<p>" + data[i].title + "</p>";
					html += '<div class="add-trash-btn">';
					html +=
						'<a  href="javascript:void(0)" class="me-3 getNoteMessage_booking"  data-bs-toggle="modal" data-bs-target="#exampleModal2" data-title="' +
						data[i].title +
						'" data-id="' +
						data[i].id +
						'" ><i class="fa-solid fa-pencil"></i></a>';

					html +=
						'<a href="javascript:void(0)"  class="getNoteId_booking" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' +
						data[i].id +
						'"><i class="fa-solid fa-trash"></i></a>';
					html += "</div>";
					html += "</div>";
					html += '<div  class="lead-notes">';

					html +=
						'<span style="color: #6d6b6b; font-size: 12px;"> ' +
						data[i].module_name +
						' - </span> <a href="javascript:void(0)" style="font-weight: 500; color: #2196F3; font-size: 12px; "> ' +
						get_booking_first_name +
						'</a><span style="font-weight: 800; color: #616E88; font-size: 24px; padding: 15px;">.</span><a class="edit-notes" style="font-weight: 500;font-size: 14px; color:#616E88" href="javascript:void(0)">Add Note</a> <span style="font-weight: 800; color: #6d6b6b; font-size: 24px; padding: 15px;">.</span><a data-bs-toggle="tooltip" data-bs-placement="bottom" title="' +
						data[i].created_date +
						'"><i class="fa-solid fa-clock"></i></a><span style="color: #6d6b6b; font-size: 12px; padding: 10px;">Now by <b style="color:#313949;">' +
						user_name +
						// "<br>" +
						data[i].created_date +
						" </b> </span>";
					// html += "</p>";
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
					$("#listnotes_booking").attr("style", "height:0px !important;");
				} else {
					$("#listnotes_booking").removeAttr("style", "height:0px !important;");
				}
				//show in div
				if (html == "") {
					$("#listnotes_booking").attr("style", "height:0px !important;");
				} else {
					$("#listnotes_booking").removeAttr("style", "height:0px !important;");
				}

				$("#listnotes_booking").html(html);
				// Click handler for the "View Previous" button
				$(document).on("click", "#viewPreviousBtn", function () {
					showAll_booking = true;
					listNotes_booking(showAll_booking);
				});
			},
		});
	}

	// get delete notes module booking
	jQuery(document).on("click", ".getNoteId_booking", function () {
		let id = $(this).data("id");
		$(".deleteIdSet_booking").html(id);
	});

	// delete notes module booking
	$(".deleteNotes_booking").click(function () {
		let id = $(".deleteIdSet_booking").text();
		$.ajax({
			type: "POST",
			url: base_url + "Bookings/deleteNotes",
			data: {
				id: id,
			},
			success: function (data) {
				listNotes_booking();
				//.window.location.reload();
			},
		});
	});

	// get edit notes module booking
	jQuery(document).on("click", ".getNoteMessage_booking", function () {
		$("#update_note_id").val($(this).data("id"));
		$("#update_note_message").val($(this).data("title"));
	});

	// edit notes module booking
	$(".EditNotes_booking").click(function () {
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
				url: base_url + "Bookings/editNotes",
				data: {
					id: id,
					message: message,
					module_name: module_name,
					updated_date: updated_date,
				},
				success: function () {
					listNotes_booking();
					//.window.location.reload();
				},
			});
		}
	});

	//    cancle notes button click blank textarea
	$("#cancel_booking").click(function () {
		if ($(".textarea-style").val() != "") {
			$(".textarea-style").val("");
		}
	});
});
