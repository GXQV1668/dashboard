document.addEventListener("DOMContentLoaded", function() {
    // Animation for the header
    anime({
        targets: '.header',
        opacity: 1,
        duration: 1500,
        easing: 'easeInOutQuad'
    });

    // Animation for the banner
    anime({
        targets: '.banner',
        translateY: [-50, 0],
        opacity: 1,
        duration: 1000,
        easing: 'easeInOutQuad'
    });

    // Animation for the footer icons
    anime({
        targets: '.contact-section span',
        opacity: 1,
        translateY: [20, 0],
        delay: anime.stagger(200),
        duration: 1000,
        easing: 'easeInOutQuad'
    });
});