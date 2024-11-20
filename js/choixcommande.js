/**
 * Ce script gère les interactions de l'utilisateur avec les boutons "Sur Place" et "À Emporter".
 * Lors du survol de ces boutons, il modifie l'apparence de la page en affichant du texte et des images,
 * et change le fond de la page.
 *
 * @param none
 * @return void
 */
document.addEventListener('DOMContentLoaded', function() {
    // Récupère le bouton "Sur Place" par son ID
    const btnSurPlace = document.getElementById('btn-sur-place');
    // Toujours pareil...
    const btnAEmporter = document.getElementById('btn-a-emporter');
    const textSurPlace = document.getElementById('text-sur-place');
    const textAEmporter = document.getElementById('text-a-emporter');
    const imageSurPlace = document.getElementById('image-sur-place');
    const imageAEmporter = document.getElementById('image-a-emporter');
    const body = document.body;

    // Ajoute un événement lorsque la souris entre sur le bouton "Sur Place"
    btnSurPlace.addEventListener('mouseenter', function() {
        // Ajoute une classe au body pour changer le fond (défini dans le CSS)
        body.classList.add('sur-place-bg');
        // Affiche le texte associé en changeant son display à 'block'
        textSurPlace.style.display = 'block';
        // Affiche l'image associée
        imageSurPlace.style.display = 'block';
    });

    // Ajoute un événement lorsque la souris quitte le bouton "Sur Place"
    btnSurPlace.addEventListener('mouseleave', function() {
        // Supprime la classe du body pour rétablir le fond initial
        body.classList.remove('sur-place-bg');
        // Cache le texte associé en changeant son display à 'none'
        textSurPlace.style.display = 'none';
        // Cache l'image associée
        imageSurPlace.style.display = 'none';
    });

    // Pareil...
    btnAEmporter.addEventListener('mouseenter', function() { 
        body.classList.add('a-emporter-bg');
        textAEmporter.style.display = 'block';
        imageAEmporter.style.display = 'block';
    });

 
    btnAEmporter.addEventListener('mouseleave', function() {
        body.classList.remove('a-emporter-bg');
        textAEmporter.style.display = 'none';
        imageAEmporter.style.display = 'none';
    });
});
