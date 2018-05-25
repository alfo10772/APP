 function validateForm(){
var x = document.forms["myForm"]["password"].value;
 var y = document.forms["myForm"]["confirmed_password"].value;
 if (x !== y) {
	 document.forms["myForm"]["confirmed_password"].focus();
	 document.getElementById("result").innerHTML= "Le mot de passe ne correspond pas";
 
 return false;
 }
 if (x===y){
	 if (x.length <8){
		 document.getElementById("results").innerHTML="Votre mot de passe doit contenir au moins 8 caracteres";
		 return false;
	 }
	 else{
		 return true;
	 }
 }
}


