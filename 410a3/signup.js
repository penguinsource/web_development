
function validateForm() {

	// validate name
	var name = document.forms["register"]["Name"].value;
	if (name == null || name == ""){
		alert("Your name must be filled out !");
		document.getElementById("Name").focus();
		return false;
	}
	var address = document.forms["register"]["Address"].value;
	var city = document.forms["register"]["City"].value;
	// validate email
	var email = document.forms["register"]["Email"].value;
	if (email == null || email == ""){
		alert("Your email must be filled out !");
		document.getElementById("Email").focus();
		return false;
	}
	var emailRegex = /^([a-zA-Z0-9])([a-zA-Z0-9\._-])*@(([a-zA-Z0-9])+(\.))+([a-zA-Z]{2,4})+$/;
	if (email.search(emailRegex) == -1) {
		alert("Invalid email entered !");
		document.getElementById("Email").focus();
		return false;
	}
	// validate postal code
	var postalCode = document.forms["register"]["PostalCode"].value;
	if ( postalCode != "" ){	// if a postal code is entered, validate it
		var postalRegex = /[a-zA-Z][0-9][a-zA-Z](-| |)[0-9][a-zA-Z][0-9]/;
		if ( (postalCode.length != 6) || (!(postalRegex.test(postalCode))) ){
			alert("Invalid Postal Code entered !");
			document.getElementById("PostalCode").focus();
			return false;
		}
	}
	// validate birth date
	var BirthDate = document.forms["register"]["BirthDate"].value;
	if ( BirthDate != "" ) {	// if a birth date is entered, validate it
		//var BirthDateRegex = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
		var BirthDateRegex = /^(19|20)\d{2}[\-](0?[1-9]|1[0-2])[\-](0?[1-9]|[12][0-9]|3[01])$/;
		if ( !BirthDateRegex.test(BirthDate) ) {
			alert("Invalid Birth Date entered !");
			document.getElementById("BirthDate").focus();
			return false;
		}
	}
	
	var exdate = new Date();
	exdate.setDate(exdate.getDate() + 1);
	//alert("exdate is " + ((exdays==null) ? "" : "; expires="+exdate.toUTCString()));
	document.cookie = "name=" + name + "; email=" + email +
	( (address == null) ? "" : ("; address=" + escape(address)) ) +
	( (city == null) ? "" : ("; city=" + escape(city)) ) +
	( (postalCode == null) ? "" : ("; postalcode=" + escape(postalCode)) ) +
	( (email == null) ? "" : ("; email=" + escape(email)) ) +
	( (BirthDate == null) ? "" : ("; birthdate=" + escape(BirthDate)) );
	
	//alert("Cookie saved: " + document.cookie);
	return true;
}

function clearCookies(){
	var mydate = new Date();
	mydate.setTime(mydate.getTime() - 1);
	document.cookie = "name=; expires=" + mydate.toGMTString();
}
