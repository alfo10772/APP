function toggle_div(bouton, id) { // On déclare la fonction toggle_div qui prend en param le bouton et un id
  	var div = document.getElementById(id); // On récupère le div ciblé grâce à l'id
 	if(div.style.display=="none") { // Si le div est masqué...
   		div.style.display = "block"; // ... on l'affiche...
   		bouton.innerHTML = "-"; // ... et on change le contenu du bouton.
  	} 
}