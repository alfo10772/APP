function validateForm() {
 var x = document.forms["myForm"]["password"].value;
 var y = document.forms["myForm"]["confirmed_password"].value;
 if (x !== y) {
	// document.getElementById("mail").innerHTML= "mdp invalide";
 alert("Pas de correspondances entre mdp");
 return false;
 }
}
