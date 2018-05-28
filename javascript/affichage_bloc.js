function toggle_div(bouton, id) { 
  	var div = document.getElementById(id); // on recupère le div grace à son id 
 	if(div.style.display=="none") {  // s'il est caché, on l'affiche
   		div.style.display = "block"; 
  	} 
 	else { 
 		div.style.display = "none"; 
 	}
}