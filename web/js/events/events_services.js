// JavaScript Document

$(document).ready(function() {
	if (getCookie("mobileops_temp_login") == null) {
		if(getCookie("mobileops") == null){
			window.location.href = "/index.php?logout";
		}else{
			saveCookieToSession();
		}
		
	}
	
	if(getValueInCookie('mobileops_temp_login', 'user_role').localeCompare("PARTNER") !== 0){
		window.location.href = "/index.php";
	}
	
	
	$("#cmd_updateServices").bind("click", saveServices);
	getAllServices();
});


function saveServices(){
	
	var checkedValues = $('.services_checkbox_item:checked').map(function() {
	    return this.value;
	}).get();
	
	var jsonString = JSON.stringify(checkedValues);
	
	$.ajax({
		type : 'POST',
		url : 'src/AppBundle/Controller/controller_services.php',
		data: {"saveServices" : jsonString}, 
		dataType : "json",
		success : function(data) {
			
			if(data.status == 1){
					$('#lbl_message').text(data.message);
					$('#lbl_message').removeClass( "display-none alert-danger" ).addClass( "alert-success" );
					sessionStorage["partnerServices"] = JSON.stringify(data.services);
				}
				
				else{
					$('#lbl_message').text(data.message);
					$('#lbl_message').removeClass( "display-none alert-success" ).addClass( "alert-danger" );
				}
			$("html, body").animate({ scrollTop: $(".container").offset().top}, "slow");
			
	},
	
	});
}


function getAllServices(){
	$.ajax({
		type : 'GET',
		url : 'src/AppBundle/Controller/controller_services.php',
		data : 'getAllServices=all',
		dataType : "json",
		success : function(response) {
		var data = response.message;
		var ServiceAccordian = document.getElementById("accordion");
		var partnerservices = JSON.parse(sessionStorage["partnerServices"]);
		
		for (i = 0; i < data.length; i++) { 
		    var arrayServices = data[i];
		    var test = "asas";
		    
		    var categoryDiv = document.createElement("div"); // <div>
		    
		    for (j = 0; j < arrayServices.length; j++) { 
		    	 var Service = arrayServices[j];
		    	 
		    	 if(j == 0){
		    		var h = document.createElement("H3")                // <h3>Hair</h3>
		 		    h.appendChild(document.createTextNode(Service)); 
		    		ServiceAccordian.appendChild(h);
		    		categoryDiv.id = "div_" +  Service;
		    		
		    	 }else{
    		 
		    		 var checkbox_div = document.createElement("div"); // <div
																		// class="checkbox
																		// ">
		    		 checkbox_div.className = "checkbox"
		    			 
		    		 // <input type="checkbox" class="services_checkbox_item"
						// id="inlineCheckbox1" value="option1">
		    	     var newCheckBox = document.createElement("input");	
		    		 newCheckBox.type = 'checkbox';
		    		 newCheckBox.className =  "services_checkbox_item";
		    		 newCheckBox.id =  "chk_" + Service;
		    		 newCheckBox.value =  Service;
		    		 
		    		 // check if partner has the service so it can be checked
		    		 for (k = 0; k < partnerservices.length; k++) { 
		    			 var partnerService = partnerservices[k];
		    			 if(partnerService.localeCompare(Service) == 0){
		    				 newCheckBox.checked = true;
		    			 }
		    		 }
		    		 
		    		 // <label for="inlineCheckbox1"> SIMPLE WASH </label>
		    		 var label = document.createElement("label");	
		    		label.htmlFor = "chk_" + Service; 
		    		label.innerHTML = Service;
		    		
		    		checkbox_div.appendChild(newCheckBox);
		    		checkbox_div.appendChild(label);
		    		
		    		categoryDiv.appendChild(checkbox_div);
		    	 }
		    }
		    
		    ServiceAccordian.appendChild(categoryDiv);
		}
		
		$( "#accordion" ).accordion();
		
		
	},
	});
}

