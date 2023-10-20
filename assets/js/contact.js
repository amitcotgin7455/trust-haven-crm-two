var base_url = $("#base_url").val();
$(document).ready(function () {
	let email_regax =
		/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	// lead module detail page data edit
	$(".check-input-check-contacts").click(function () {
		hidden_id = $("#hidden_id").val();
		first_name = $("#first_name").val();
		last_name = $("#last_name").val();
		mobile_1 = $("#mobile_1").val();
		mobile_2 = $("#mobile_2").val();
		email = $("#email").val();
		customer_id = $("#customer_id").val();
		if ($("#email_opt_out").is(":checked")) {
			email_opt_out = $("#email_opt_out").val();
		} else {
			email_opt_out = 0;
		}
		plan_status = $("#plan_status").val();
		plan = $("#plan").val();
		amount = $("#amount").val();
		remote_id = $("#remote_id").val();
		sale_id = $("#sale_id").val();
		worked_id = $("#worked_id").val();
		work_status = $("#work_status").val();
		if ($("#courtesy").is(":checked")) {
			courtesy = $("#courtesy").val();
		} else {
			courtesy = 1;
		}
		if ($("#bbb").is(":checked")) {
			bbb = $("#bbb").val();
		} else {
			bbb = 0;
		}
		if ($("#ha").is(":checked")) {
			ha = $("#ha").val();
		} else {
			ha = 0;
		}
		if ($("#fb").is(":checked")) {
			fb = $("#fb").val();
		} else {
			fb = 0;
		}
		if ($("#google").is(":checked")) {
			google = $("#google").val();
		} else {
			google = 0;
		}
		if ($("#service").is(":checked")) {
			service = $("#service").val();
		} else {
			service = 0;
		}
		description = $("#description").val();
		sale_date = $("#txtDate").val();
		expiry_date = $("#expiry_date").val();

		if (first_name == "") {
			$("#message").text("First Name Is Required");
			get_value_contact($("#hidden_id").val(), "first_name");
			return false;
		} else if (last_name == "") {
			$("#message").text("Last Name Is Required");
			get_value_contact($("#hidden_id").val(), "last_name");
			return false;
		} else if (mobile_1 == "") {
			$("#message").text("Mobile Number Is Required");
			get_value_contact($("#hidden_id").val(), "mobile_1");
			return false;
		} else if ($("#mobile_1").val().length != 10) {
			$("#message").text("Phone number must be 10 digits");
			get_value_contact($("#hidden_id").val(), "mobile_1");
			return false;
		} else if (
			$("#mobile_2").val() != "" &&
			$("#mobile_2").val().length > 0 &&
			$("#mobile_2").val().length != 10
		) {
			$("#message").text("Alt Phone number must be 10 digits");
			get_value_contact($("#hidden_id").val(), "mobile_2");
			return false;
		} else if ($("#mobile_1").val() == $("#mobile_2").val()) {
			alert("Phone number 2 should not be same as phone number 1");
			$("#mobile_2").css("border", "1px solid red");
			$("#mobile_2").focus();
			return false;
		} else if (email == "") {
			$("#message").text("Email Address Is Required");
			get_value_contact($("#hidden_id").val(), "email");
			return false;
		} else if (!email_regax.test(email)) {
			$("#message").text("Please Enter Valid Email Address");
			get_value_contact($("#hidden_id").val(), "email");
			return false;
		} else if (customer_id == "") {
			$("#message").text("Customer Id Is Required");
			get_value_contact($("#hidden_id").val(), "customer_id");
			return false;
		} else if ($("#customer_id").val().length != 8) {
			$("#message").text("Customer Id must be 8 Character");
			get_value_contact($("#hidden_id").val(), "customer_id");
			return false;
		}  else if (plan_status == "") {
			$("#message").text("Plan Status Is Required");
			get_value_contact($("#hidden_id").val(), "plan_status");
			return false;
		} else if (work_status == "") {
			$("#message").text("Work Status Is Required");
			get_value_contact($("#hidden_id").val(), "work_status");
			return false;
		} else if (sale_date == "") {
			$("#message").text("Sale Date Is Required");
			get_value_contact($("#hidden_id").val(), "sale_date");
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: base_url + "Contacts/detailPageedit",
				data: {
					first_name: first_name,
					last_name: last_name,
					mobile_1: mobile_1,
					mobile_2: mobile_2,
					email: email,
					customer_id: customer_id,
					email_opt_out: email_opt_out,
					plan_status: plan_status,
					plan: plan,
					amount: amount,
					remote_id: remote_id,
					sale_id: sale_id,
					worked_id: worked_id,
					work_status: work_status,
					courtesy: courtesy,
					bbb: bbb,
					ha: ha,
					fb: fb,
					google: google,
					service: service,
					sale_date: sale_date,
					expiry_date : expiry_date,
					description: description,
					hidden_id: hidden_id,
				},
				success: function (data) {
					$("#message").text('');
				},
			});
		}

		function get_value_contact(get_id, get_column_name) {
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

		//  lead module delete leads
		$("#DeleteContact").click(function () {
			if (confirm("Are You Sure Delete This Row")) {
				var val = [];
				$(".deletes_id:checkbox:checked").each(function (i) {
					val[i] = $(this).val();
					leadIds = val[i];
					$.ajax({
						type: "POST",
						url: base_url + "Contacts/deleteContacts",
						data: {
							leadIds: leadIds,
						},
						success: function (data) {
							// alert("Contact Deleted Successfully");
							window.location.reload();
						},
					});
				});
			}
		});
	});
});
