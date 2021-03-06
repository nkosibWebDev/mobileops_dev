// JavaScript Document

$(document).ready(function() {
	if (getCookie("mobileops_temp_login") == null) {
		if(getCookie("mobileops")){
			saveCookieToSession();
		}
	}
	
	getBookingDetails();
	
	$('#cancelBooking').click(function(event){
	    event.preventDefault();
	    cancelBooking();
});
	
	$('#addBookingNotes').click(function(event){
	    event.preventDefault();
	    addBookingCommentsByClient();
});
	
});


function intialiseDateTimePicker(bookignDate, bookingTime){
	$('#datetimepicker').datetimepicker({

		
		  //value:'19.10.2015 09:00',
		  defaultDate:bookignDate + ' 00:00',
		  defaultTime:bookingTime,
		  format:'d.m.Y H:i',
		  inline:true,
		  lang:'ru',
		  minDate:'0',

		  allowTimes:[

		              '07:00', '07:30', '08:00', '08:30','09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','13:00', '13:30',

		              '14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30','19:00', '19:30','20:00', '20:30',

		              '21:00',

		             ],
		             onSelectTime: function(dp, $input) {
			 			 sessionStorage.mobileops_seletedBookingTime = dp.dateFormat('H:i');
			 			$('#booking_time').val(dp.dateFormat('H:i'));
		            	 },

		  			onSelectDate: function(dp, $input) {
		            		 sessionStorage.mobileops_seletedBookingDate = dp.dateFormat('Y/m/d');
		            		 $('#booking_date').val(dp.dateFormat('Y/m/d'));
		 	            	 },

		            	 onGenerate: function(dp, $input) {
		 		            	 //alert(dp.dateFormat('Y/m/d'));
			            		 sessionStorage.mobileops_seletedBookingDate = dp.dateFormat('Y/m/d');
			            		 sessionStorage.mobileops_seletedBookingTime = dp.dateFormat('H:i');
			            		 $('#booking_time').val(dp.dateFormat('H:i'));
			            		 $('#booking_date').val(dp.dateFormat('Y/m/d'));
			 	            	 },

		});
}


function addBookingCommentsByClient(){
	if(input_booking_notes.value.length < 1){
		$('#lbl_message').text("Special notes field is empty");
		$('#lbl_message').removeClass( "display-none alert-success" ).addClass( "alert-danger" );
		$("html, body").animate({ scrollTop: $(".invoice-box").offset().top}, "slow");
		return;
	}
	
	$('#tr_buttons').after("<img src='web/images/ajax-loader.gif' alt='loading' class='loading'/>").fadeIn();  
	
	$.ajax({
		type : 'POST',
		url : 'src/AppBundle/Controller/controller_booking.php',
		 data: {"updateBookingComments" : getUrlParameter("bookingdetails"),
			 "booking_notes":input_booking_notes.value,
		
	},
		 dataType : "json",
		success : function(response) {
			$('.loading').remove();
			var message = response.message;
			if(message.indexOf("Successfully ") > -1){
				var myDate = new Date();
				var formateddate = myDate.getFullYear() + "-" +
				('0' + (myDate.getMonth()+1)).slice(-2) + "-" +
				('0' + myDate.getDate()).slice(-2) + " " +
				myDate.getHours() + ":" + myDate.getMinutes() + " - ";
				
				var element = document.getElementById("bookingnotes");
				var neuB = document.createElement("b");
				neuB.appendChild(document.createTextNode(formateddate));
				element.appendChild(neuB);
				element.appendChild(document.createTextNode(input_booking_notes.value));
				element.appendChild(document.createElement("HR"));
				input_booking_notes.value = "";
				$('#lbl_message').text(message);
				$('#lbl_message').removeClass( "display-none alert-danger" ).addClass( "alert-success" );
				
				
			}else{
				$('#lbl_message').text(message);
				$('#lbl_message').removeClass( "display-none alert-success" ).addClass( "alert-danger" );
			}
			$("html, body").animate({ scrollTop: $(".invoice-box").offset().top}, "slow");
	},
	});
}



function cancelBooking(){
	var r = confirm("Are you sure you want to cancel this booking?");
	if (r == false) {
	    return;
	} 
	
	$('#tr_buttons').after("<img src='web/images/ajax-loader.gif' alt='loading' class='loading'/>").fadeIn(); 
	
	$.ajax({
		type : 'POST',
		url : 'src/AppBundle/Controller/controller_booking.php',
		 data: {"cancelBooking" : getUrlParameter("bookingdetails"), "uuid":getUrlParameter("uuid")}, 
		 dataType : "json",
		success : function(response) {
			$('.loading').remove();
			var message = response.message;
			if(response.status ==  1){
				$('#lbl_message').text(message);
				$('#lbl_message').removeClass( "display-none alert-danger" ).addClass( "alert-success" );
				
				$("#lbl_status" ).empty();
				var element = document.getElementById("lbl_status");
				element.appendChild(document.createTextNode("Cancelled"));
				
				$('#tr_buttons').addClass('display-none')
				
			}else{
				$('#lbl_message').text(message);
				$('#lbl_message').removeClass( "display-none alert-success" ).addClass( "alert-danger" );
			}
			$("html, body").animate({ scrollTop: $(".invoice-box").offset().top}, "slow");
	},
	});
}


function addServicesRows(services){
	$('.serviceRow').remove();
	var pricesString = "";
	var totalPrice = 0;
	var rowNum = 3;
	var table = document.getElementById("invoice_table");
	
	for (i = 0; i < services.length; i++){
		var row = table.insertRow(rowNum);
		row.className = "serviceRow";
		rowNum += 1;
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		
		cell1.innerHTML = services[i][2] + " - " + services[i][0];
		cell2.innerHTML = "R" + parseFloat(Math.round(services[i][1] * 100) / 100).toFixed(2);
		
		//pricesString = pricesString + response.message[i][0] + ": R" + parseFloat(Math.round(response.message[i][1] * 100) / 100).toFixed(2) + "<br/>";
		totalPrice = totalPrice + parseInt(services[i][1]);
	}
	//$("#totalAmountDueDiv").html(pricesString + "<br/>Tatal : R" + parseFloat(Math.round(totalPrice * 100) / 100).toFixed(2));
	var row = table.insertRow(rowNum);
	row.className = "serviceRow";
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	
	cell1.innerHTML = "";
	cell2.innerHTML = "Total: R" + parseFloat(Math.round(totalPrice * 100) / 100).toFixed(2);
}



function getBookingDetails(){
	
	$.ajax({
		type : 'GET',
		url : 'src/AppBundle/Controller/controller_booking.php?getBookingDetails=' + getUrlParameter("bookingdetails") + "&uuid=" + getUrlParameter("uuid"),
		data : 'bookingId=' + getUrlParameter("bookingdetails"),
		dataType : "json",
		success : function(data) {
			//check if booking id found
			
			if(data.status == 2){
				$('#lbl_message').text(data.message);
				$('#lbl_message').removeClass( "display-none alert-success" ).addClass( "alert-danger" );
				$('#invoice_table').addClass('display-none')
				return;
			}
			//initialise calandar
			var dateTimeParts = data['booking_date'].split(" ");
			var dateOnlyParts = dateTimeParts[0].split("-");
			var d = new Date();
			var dateHolder = dateOnlyParts[2] + '.' + dateOnlyParts[1] + '.' + dateOnlyParts[0];
			intialiseDateTimePicker(dateHolder.toString(), dateTimeParts[1]);
			
			
			$('#name').val(data['name']);
			$( "#personalDetails" ).empty();
			
			var element = document.getElementById("personalDetails");
			
			var h = document.createElement("H3")                // Create a <h1> element
			var t = document.createTextNode("CLIENT DETAILS"); 
			h.appendChild(t);      
			
			
			element.appendChild(h);
			element.appendChild(document.createElement("br"));
			
			element.appendChild(document.createTextNode(data['client_name']));
	
			element.appendChild(document.createTextNode(' ' + data['client_surname']));
			element.appendChild(document.createElement("br"));
			
			element.appendChild(document.createTextNode(data['client_email_address']));
			element.appendChild(document.createElement("br"));
			
			element.appendChild(document.createTextNode(data['client_mobile_number']));
			element.appendChild(document.createElement("br"));
			
			h = document.createElement("H3")
			t = document.createTextNode("SERVICE PROVIDER DETAILS"); 
			h.appendChild(t);      
			element.appendChild(h);      
			var a = document.createElement("a");
			a.setAttribute("target","_blank");
			a.href= 'http://mobileops.co.za/index.php?aboutpartner=' + data['provider_id'];
			var linkText = document.createTextNode(data['provider_name']);
			a.appendChild(linkText);
			
			element.appendChild(document.createTextNode("Your service provider name is "));
			
			
			
			
			element.appendChild(a);
			
			h = document.createElement("H3")
			t = document.createTextNode("APPOINTMENT ADDRESS"); 
			h.appendChild(t);      
			element.appendChild(h);
			
			element.appendChild(document.createTextNode(data['booking_complex']));
			element.appendChild(document.createElement("br"));
			element.appendChild(document.createTextNode(data['booking_address']));
			element.appendChild(document.createElement("br"));
			
			
			
			$("#booking_ref_label" ).empty();
			var element = document.getElementById("booking_ref_label");
			element.appendChild(document.createTextNode(data['booking_ref']));
			
			//selected date
			$( "#lbl_date" ).empty();
			var element = document.getElementById("lbl_date");
			element.appendChild(document.createTextNode(data['booking_date']));
			element.appendChild(document.createElement("br"));
			
			var bookingStatus = "";
			switch(data['booking_status']) {
		    case "BOOKING_ACTIVE":
		    	bookingStatus = "Active";
		        break;
		    case "BOOKING_CANCELLED":
		    	bookingStatus = "Cancelled";
		    	$('#tr_buttons').addClass('display-none')
		    	$('#bookingnotes').addClass('display-none')
		        break;
		    case "BOOKING_AWAITING_PARTNER_CONFIRMATION":
		    	bookingStatus = "Awaiting Partner Confirmation";
		        break;
		    case "BOOKING_AWAITING_CLIENT_CONFIRMATION":
		    	bookingStatus = "Awaiting Client Confirmation";
		        break;
		    case "BOOKING_COMPLETED":
		    	bookingStatus = "Complete";
		    	$('#tr_buttons').addClass('display-none')
		    	$('#bookingnotes').addClass('display-none')
		        break;
		    default:
		    	bookingStatus =  "Error";
		    	$('#tr_buttons').addClass('display-none')
		    	$('#bookingnotes').addClass('display-none')
			}
			
			//remove the buttons for partner
			if (getCookie("mobileops_temp_login")) {
				if(getValueInCookie('mobileops_temp_login', 'user_role').localeCompare("PARTNER") == 0 ){
					$('#cancelBooking').addClass('display-none');
				}
			}else{
				//user can add notes and cancel booking when not logged in, the uuid will act as a security measure
				//$('#tr_buttons').addClass('display-none');
			}
			
			
			$("#lbl_status" ).empty();
			var element = document.getElementById("lbl_status");
			element.appendChild(document.createTextNode(bookingStatus));
			
			
			//selected services
			var servicesArray = data['booking_services'];
			addServicesRows(servicesArray);
			
			//notes
			$( "#bookingnotes" ).empty();
			var element = document.getElementById("bookingnotes");
			
			var bookingNotes = data['booking_notes'];
			for (i = 0; i < bookingNotes.length; i++){
				var neuB = document.createElement("b");
				neuB.appendChild(document.createTextNode(bookingNotes[i][1] + ' - '));
				element.appendChild(neuB);
				element.appendChild(document.createTextNode(bookingNotes[i][0]));
				element.appendChild(document.createElement("br"));
				element.appendChild(document.createElement("HR"));
			}
			
			var element = document.getElementById("addBookingnotes");
			var input_booking_comments= document.createElement("textarea");
			input_booking_comments.type = "text";
			input_booking_comments.id = "input_booking_notes";
			element.appendChild(input_booking_comments);
		
			$("#input_booking_notes").attr('maxlength','500');
			$("#input_booking_notes").attr('placeholder','e.g. Please change appointment time to Friday 13:00');
			
			$( "#bookingref" ).text("REF: " + data['booking_ref']);
			$( "#bookingstatus" ).text("STATUS: " + data['booking_status']);
			
	},
	});
	
	
}