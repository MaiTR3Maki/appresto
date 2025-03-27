/**
 * @param none
 * Fonction qui permet de faire apparaître ou de cacher l'élément Accueil-texte
 * lorsque l'on passe sur le lien Accueil
 * @return void
 * @author Lucas
 */
function Accueil() {
    //on déclare une variable x et on met dedans l'id de l'element Accueil-texte
    var x = document.getElementById("Accueil-texte");
    //condition pour déterminer si l'élément est visible ou non 
    //En utilisant l'id que l'ont a recupérée(x) et en regardant le style pour la propriété display
    if (x.style.display === "none") {
        //si l'élément est invisible on le met en visible
        x.style.display = "block";
    } else {
        //si l'élement est visible on le cache
        x.style.display = "none";
    }
}

/**
 * @param none
 * Fonction qui permet de faire apparaître ou de cacher l'élément Inscription-texte
 * lorsque l'on passe sur le lien Inscription
 * @return void
 * @author Lucas
 */

function Inscription() {
    var x = document.getElementById("Inscription-texte");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
 }
/**
 * @param none
 * Fonction qui permet de faire apparaître ou de cacher l'élément Connexion-texte
 * lorsque l'on passe sur le lien Connexion
 * @return void
 * @author Lucas
 */
 function Connexion() {
    var x = document.getElementById("Connexion-texte");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
 }

 /**
  * @param none 
  * Fonction qui permet de faire apparaître ou de cacher l'élément Deconnexion-texte
  * lorsque l'on passe sur le lien Deconnexion
  * @return void
  * @author Lucas
  */
 function Deconnexion() {
    var x = document.getElementById("Deconnexion-texte");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
 }




  