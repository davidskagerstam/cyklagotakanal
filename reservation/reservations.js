// START initial state of common vars
var processStage = "open";
var reservationId = "open";
// END initial state of common vars






/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(

  /* This is the function that will get executed after the DOM is fully loaded */
  
  //**** Start hÃ¤mta datum frÃ¥n datepicker och skapa table rows finns i dateProcess.php

function () {
    $( ".datepicker" ).datepicker({ 
    dateFormat: 'yy/mm/dd', 
    minDate: new Date(2016, 6 - 1, 01), 
    maxDate: new Date (2016, 8 - 1, 31),
    firstDay: 1,
    altField: "#alternate",
    showOn: "button",
                buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
                buttonImageOnly: true,
    
    
    onSelect: function(dateText, inst){
        var date = $(this).val();
        var d = new Date(date);
        var n = (d.getMonth() + 1);
        $('input[name="datepicker"]').attr('value', n);
    }       
    });
    
   
    $( ".selector" ).datepicker({ defaultDate: null });
    $(".numBikes").trigger("click");
  
            
  });



//**** START get buttons for available bikes(((( ...på valt datum...)))
function showBikes(date){
	// If they have unfinished reservation, cancel it	
	if (processStage == "closed"){
		cancelReserve(reservationId);
	}

	// date gives us -> tbid_3
	// We only need the (3) part so we split it
	var a = date.split("_");
	// Add placeholder text to bikeBtns div
	document.getElementById("returnData").innerHTML = 'Double Checking Availability ...';
	
	$('.availablesadel').css("visibility", "visible");
	$('.numBikes').css("visibility", "hidden");
	$('#wrapper').transition({y: '-230px'});
	$('#back_to_top').transition({y: '230px'});
	
	
    
    	
	
	// For in depth of following code
	// visit http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
	// PHP processing script url
	var url = "auction.php";
	hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			// Send bike buttons to div id bikeBtns
			document.getElementById("returnData").innerHTML = return_data;
	    }
    }
	// Send getBikeBtns=3 to PHP processing script
    hr.send("getBikeBtns="+a[1]);
    var processStage = "open";
    
 $('#back_to_top').click(function() {
        	$('#back_to_top').transition({y: '0px'});
        	$('#wrapper').transition({y: '0px'});
    	});
    	
    	
   

}
//**** END get buttons for availble bikes


    	   


//**** START get buttons for available bikes(((( ...på valt datum...)))
function showBsadel(date){
	// If they have unfinished reservation, cancel it	
	//if (processStage == "closed"){
	//	cancelReserve(reservationId);
	//}

	// date gives us -> tbid_3
	// We only need the (3) part so we split it
	var a = date.split("_");
	// Add placeholder text to bikeBtns div
	document.getElementById("returnData2").innerHTML = 'Double Checking Availability ...';
	 	$('.availablesadel').css("visibility", "hidden");
	// For in depth of following code
	// visit http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
	// PHP processing script url
	var url = "auction.php";
	hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			// Send bike buttons to div id bikeBtns
			document.getElementById("returnData2").innerHTML = return_data;
	    }
    }
	// Send getBikeBtns=3 to PHP processing script
    hr.send("getBsadelBtns="+a[1]);
    
   
}
//**** END get buttons for availble bikes



//**** START reserve number of bikes
function reserveBikes(numbikes){
	processStage = "closed";
	// numbikes gives us -> tbid_2_3
	// 2 is the id of the table(id not table name)
	// 3 is the number of bikes they want
	// Split our data at the _
	var a = numbikes.split("_");
	// Add text while request processes to buyNow div
	$('#confirmbtnb').css("display", "none");
	$('#confirmbtn').css("display", "inline");
	$('#wrapper').transition({y: '-230px'});
	$('#back_to_top').transition({y: '230px'});
	// For in depth of following code
	// visit http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
	// PHP processing script url
	var url = "auction.php";
	hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText.split("|");
			reservationId = return_data[1];
			// Return data sent to buyNow div
			document.getElementById("returnData").innerHTML = return_data[0];
	    }
    }
	// Send reserve=2&num=3 to PHP processing script
    hr.send("reserve="+a[1]+"&num="+a[2]);
}
//**** END reserve number of bikes






//**** START reserve number of bikes
function reserveBsadel(numbsadel){
	processStage = "closed";
	// numbikes gives us -> tbid_2_3
	// 2 is the id of the table(id not table name)
	// 3 is the number of bikes they want
	// Split our data at the _
	var a = numbsadel.split("_");
	// Add text while request processes to buyNow div
	$('#confirmbtnb').css("display", "inline");
	$('#confirmbtn').css("display", "none");
	$('#wrapper').transition({y: '-250px'});
	$('#back_to_top').transition({y: '250px'});
	
	// For in depth of following code
	// visit http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
	// PHP processing script url
	var url = "auction.php";
	hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText.split("|");
			reservationId = return_data[1];
			// Return data sent to buyNow div
			document.getElementById("returnData2").innerHTML = return_data[0];
	    }
    }
	// Send reserve=2&num=3 to PHP processing script
    hr.send("reserveb="+a[1]+"&num="+a[2]);
}
//**** END reserve number of bikes




//**** START register/buy bikes
function confirmBikes(){
	// Get form values
	var name = document.getElementById("name").value;
	var lname = document.getElementById("lname").value;
	var tel = document.getElementById("tel").value;
	var epost = document.getElementById("epost").value;
	var info = document.getElementById("info").value;
	var tnum = document.getElementById("tableNumber").value;
	var nbikes = document.getElementById("numBikes").value;
	var vego = document.getElementById("vego").value;
	var fisk = document.getElementById("fisk").value;
	var kott = document.getElementById("kott").value;
	var rid = document.getElementById("reserveID").value;
	if(name == "" || lname == "" || tel == "" || epost == "" || tnum == "" || nbikes == "" || rid == ""){
	
		return false;
		alert ("Fält med asterix måste fyllas i!");
	}
	//if(isNaN(tel)){
	//alert ("Telefonnummer får bara innehålla siffror utan mellanslag! ex 0000112233");
	//return false;
 	//}
	// Compile our data from form to send to processing
	var confData = "confirm="+rid+"&n="+name+"&l="+lname+"&t="+tel+"&e="+epost+"&i="+info+"&tn="+tnum+"&ns="+nbikes+"&v="+vego+"&f="+fisk+"&k="+kott;
	
	// For in depth of following code
	// visit http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
	// PHP processing script url
	var url = "auction.php";
	hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText.split("|");
			// They farted around too long and someone else got the bikes
			if (return_data[0] == "false"){
				// Display fail message
				document.getElementById("returnData").innerHTML = return_data[1];
				var processStage = "open";
				var reservationId = "open";
			} else {
				// They got the bikes succesfully
				var processStage = "open";
				var reservationId = "open";
				// Alert the success message
				alert ("Du har nu genomfört din bokning. En bokningsbekräftelse kommer skickas till din angivna epost. Välkommen!");
				// Reload the page
				window.location = 'auction.php';
				
				
			}
	    }
    }
	// Send our compiled data
    hr.send(confData);
}
//**** END register/buy bikes



function confirmBsadel(){
	// Get form values
	var name = document.getElementById("name").value;
	var lname = document.getElementById("lname").value;
	var tel = document.getElementById("tel").value;
	var epost = document.getElementById("epost").value;
	var info = document.getElementById("info").value;
	var tnum = document.getElementById("tableNumber").value;
	var nbikes = document.getElementById("numBikes").value;
	var nbsadel = document.getElementById("numBsadel").value;
	var vego = document.getElementById("vego").value;
	var fisk = document.getElementById("fisk").value;
	var kott = document.getElementById("kott").value;
	
	
	var rid = document.getElementById("reserveID").value;
	if(name == "" || lname == "" || tel == "" || epost == "" || tnum == "" || nbikes == "" || rid == ""){
	
		return false;
		alert ("Fält med asterix måste fyllas i!");
	}
	//if(isNaN(tel)){
	//alert ("Telefonnummer får bara innehålla siffror utan mellanslag! ex 0000112233");
	//return false;
 	//}
	// Compile our data from form to send to processing
	var confData2 = "confirmb="+rid+"&n="+name+"&l="+lname+"&t="+tel+"&e="+epost+"&i="+info+"&tn="+tnum+"&nb="+nbsadel+"&ns="+nbikes+"v="+vego+"&f="+fisk+"&k="+kott;
	
	// For in depth of following code
	// visit http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
	// PHP processing script url
	var url = "auction.php";
	hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText.split("|");
			// They farted around too long and someone else got the bikes
			if (return_data[0] == "false"){
				// Display fail message
				document.getElementById("returnData2").innerHTML = return_data[0];
				var processStage = "open";
				var reservationId = "open";
			} else {
				// They got the bikes succesfully
				var processStage = "open";
				var reservationId = "open";
				// Alert the success message
				alert ("Du har nu genomfört din bokning. En bokningsbekräftelse kommer skickas till din angivna epost. Välkommen!");
				// Reload the page
				window.location = 'auction.php';
				
				
			}
	    }
    }
	// Send our compiled data
    hr.send(confData2);
}
//**** END register/buy bikes








// START cancel reservation button
function cancelReserve(resId){
	// For in depth of following code
	// visit http://www.developphp.com/view.php?tid=1185
    var hr = new XMLHttpRequest();
	// PHP processing script url
	var url = "auction.php";
	hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// Send reservation id
    hr.send("clearRes="+resId);
	window.location = 'auction.php';	
	
}
// END cancel reservation button