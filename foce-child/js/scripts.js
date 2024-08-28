console.log("fichier pris en compte");

document.addEventListener('DOMContentLoaded', function() {
    const headings = document.querySelectorAll('.animated-heading .hidden-text');

    headings.forEach(textContainer => {
        function animateOnHover() {
            textContainer.style.opacity = 1; // Rend le texte prêt pour l'animation

            const characters = textContainer.textContent.split('');
            textContainer.textContent = ''; // Efface le texte original
            characters.forEach((char, index) => {
                const span = document.createElement('span');
                if (char === ' ') {
                    span.innerHTML = '&nbsp;'; // Utilise un espace insécable pour les espaces
                } else {
                    span.textContent = char;
                }
                span.style.animationDelay = `${index * 0.1}s`; // Délai basé sur l'index du caractère
                span.style.animationName = 'animatedTitle';
                textContainer.appendChild(span);
            });

            // Retire l'écouteur après la première activation pour éviter que l'animation se rejoue
            textContainer.removeEventListener('mouseover', animateOnHover);
        }

        // Ajoute l'écouteur d'événements sur le premier survol
        textContainer.addEventListener('mouseover', animateOnHover);
    });
});

