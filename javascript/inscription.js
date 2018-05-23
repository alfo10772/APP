 function validateForm(){
var x = document.forms["myForm"]["password"].value;
 var y = document.forms["myForm"]["confirmed_password"].value;
 if (x !== y) {
	 document.forms["myForm"]["confirmed_password"].focus();
	 document.getElementById("result").innerHTML= "Le mot de passe ne correspond pas";
 
 return false;
 }
}

 
 /*function validateFor() {
		var a = validatePassword();
		if (a){
			return false;
		}
		else{
			return true;
		}
	}*/