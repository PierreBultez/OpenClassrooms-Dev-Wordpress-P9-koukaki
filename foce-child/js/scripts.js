// console.log("fichier pris en compte");

document.addEventListener('DOMContentLoaded', function() {
    const headings = document.querySelectorAll('.animated-heading .hidden-text');
    const burgerMenu = document.getElementById('burger-menu');
    const overlay = document.getElementById('menu');
    const menuLinks = document.querySelectorAll('#menu a'); // Sélectionne tous les liens du menu
    const menuHeadings = document.querySelectorAll('#menu .hidden-text');  // Titres du menu
    const logoContainer = document.querySelector('.logo-container');
    const videoContainer = document.querySelector('.video-container');
    const placeSection = document.getElementById('place');
    const bigCloud = document.querySelector('.big-cloud');
    const littleCloud = document.querySelector('.little-cloud');
    let isInView = false;

    // Fonction pour animer les lettres
    function animateLetters(textContainer) {
        textContainer.style.opacity = 1; // Rend le texte visible
        const characters = textContainer.textContent.split('');
        textContainer.textContent = ''; // Efface le texte original
        characters.forEach((char, index) => {
            const span = document.createElement('span');
            span.textContent = (char === ' ') ? '\u00A0' : char; // Gérer les espaces
            span.style.animationDelay = `${index * 0.1}s`; // Délai basé sur l'index du caractère
            span.style.animationName = 'animatedTitle';
            textContainer.appendChild(span);
        });
    }

    // Fonction pour vérifier la taille de l'écran
    function shouldAnimate() {
        return window.matchMedia('(min-width: 700px)').matches; // Animation uniquement sur les écrans plus larges que 700px
    }

    // Ajouter l'événement hover uniquement si l'écran est suffisamment large
    function setupHoverAnimation() {

        // Animation sur hover pour les headings
        headings.forEach(textContainer => {
            const animateOnHover = () => {
                animateLetters(textContainer);
                textContainer.removeEventListener('mouseover', animateOnHover);
            };
            if (shouldAnimate()) {
                // Ajouter l'événement si la condition de taille d'écran est respectée
                textContainer.addEventListener('mouseover', animateOnHover);
            }
            // Appel initial lors du chargement de la page
            window.addEventListener('DOMContentLoaded', setupHoverAnimation);

            // Réappliquer la configuration au redimensionnement de la fenêtre
            window.addEventListener('resize', setupHoverAnimation);
        });
    }

    // Fonction pour animer les titres du menu
    function animateMenuTitles() {
        if (shouldAnimate()) { // Empêcher l'animation sur les petits écrans
            menuHeadings.forEach((textContainer, index) => {
                setTimeout(() => animateLetters(textContainer), index * 1000);  // Délai entre chaque titre
            });
        }
    }

    // Réagir aux changements de taille d'écran
    window.addEventListener('resize', () => {
        if (!shouldAnimate()) {
            resetMenuTitles(); // Réinitialiser si on revient à un petit écran
        }
    });

    function resetMenuTitles() {
        if (shouldAnimate()) { // Empêcher la réinitialisation sur les petits écrans
            menuHeadings.forEach(textContainer => {
                textContainer.style.opacity = 0;
                const originalText = Array.from(textContainer.querySelectorAll('span')).map(span => span.textContent === '\u00A0' ? ' ' : span.textContent).join('');
                textContainer.textContent = originalText;
            });
        }
    }

    // Réagir aux changements de taille d'écran
    window.addEventListener('resize', () => {
        resetMenuTitles(); // Ne réinitialise que sur les grands écrans
    });

    // Réinitialisation après clic sur lien
    function resetMenuTitlesAfterClick() {
        if (shouldAnimate()) { // Empêcher la réinitialisation sur les petits écrans
            menuHeadings.forEach(textContainer => {
                textContainer.style.opacity = 0;
                const originalText = Array.from(textContainer.querySelectorAll('span')).map(span => span.textContent === '\u00A0' ? ' ' : span.textContent).join('');
                textContainer.textContent = originalText;
                textContainer.style.animation = 'none';
                void textContainer.offsetWidth; // Forcer le recalcul du layout pour réinitialiser l'animation
                textContainer.style.animation = ''; // Réinitialiser l'animation
            });
        }
    }

    // Ouvrir/fermer le menu burger
    if (burgerMenu) {
        burgerMenu.addEventListener('click', function (e) {
            e.preventDefault();
            this.classList.toggle("close");
            overlay.classList.toggle("overlay");

            if (overlay.classList.contains("overlay")) {
                animateMenuTitles();
            } else {
                resetMenuTitles();
            }
        });
    }

    // Fermeture du menu lors du clic sur un lien
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            burgerMenu.classList.remove("close");
            overlay.classList.remove("overlay");
            resetMenuTitlesAfterClick();
        });
    });

    // Fonction de parallaxe pour le logo et la vidéo
    function handleParallax() {
        const scrollPosition = window.scrollY;
        logoContainer.style.transform = `translateY(${scrollPosition * 0.4}px)`;
        videoContainer.style.transform = `translateY(${scrollPosition * 0.2}px)`;
    }

    window.addEventListener('scroll', handleParallax);

    // Fonction pour animer les nuages lors du scroll
    function animateClouds() {
        if (isInView) {
            const sectionTop = placeSection.getBoundingClientRect().top + window.scrollY;
            const sectionHeight = placeSection.offsetHeight;
            const scrollY = window.scrollY;
            const scrollPercentage = Math.min(Math.max((scrollY - sectionTop + window.innerHeight / 2) / sectionHeight, 0), 1);
            const cloudMovement = scrollPercentage * 300;
            bigCloud.style.transform = `translateX(-${cloudMovement}px)`;
            littleCloud.style.transform = `translateX(-${cloudMovement}px)`;
        }
    }

    // IntersectionObserver pour déclencher l'animation des nuages
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                isInView = true;
                window.addEventListener('scroll', animateClouds);
            } else {
                isInView = false;
                window.removeEventListener('scroll', animateClouds);
            }
        });
    }, { threshold: 0.1 });

    observer.observe(placeSection);

    // Activer l'animation au chargement si la section est déjà visible
    animateClouds();

    // SwiperJS configuration
    const swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
});
