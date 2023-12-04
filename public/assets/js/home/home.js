console.log("Le fichier home.js est bien test.");

document.addEventListener('DOMContentLoaded', () => {
    animatePage(); // Call the main function
});

function animatePage() {
    animateText();
    setupImageCarousel();
}

function animateText() {
    const textElement = document.getElementById('animated-text');
    const phrases = [
        "Bonjour!",
        "Hello!",
        "¡Hola!",
        "Ciao!",
        "Hallo!",
        "Olá!",
        "여보세요!",
        "你好！",
        "مرحبًا!",
        "Привет!",
        "Hej!"
    ];

    let phraseIndex = 0;
    let letterIndex = 0;
    const typingSpeed = 100; // Delay in milliseconds between each letter
    const spaceSpeed = 5000; // Delay in milliseconds between each phrase

    function typeNextLetter() {
        const currentPhrase = phrases[phraseIndex];

        if (letterIndex < currentPhrase.length) {
            // Add the current letter to the text
            textElement.innerText += currentPhrase[letterIndex];
            letterIndex++;

            // Schedule the addition of the next letter
            setTimeout(typeNextLetter, typingSpeed);
        } else {
            // All letters have been written, move to the next phrase
            setTimeout(() => {
                // Clear the current text
                textElement.textContent = '';
                letterIndex = 0;
                phraseIndex = (phraseIndex + 1) % phrases.length;
                // Start writing the next phrase
                setTimeout(typeNextLetter, typingSpeed);
            }, spaceSpeed); // Wait a bit before moving to the next phrase
        }
    }

    // Start the animation with the first phrase
    typeNextLetter();
}

function setupImageCarousel() {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dotsContainer = document.getElementById('carousel-dots');

    function showSlide(index) {
        slides.forEach((slide) => {
            slide.style.display = 'none';
        });

        slides[index].style.display = 'block';
        updateDots(index);
        currentSlide = index;
    }

    function updateDots(index) {
        const dots = dotsContainer.querySelectorAll('.carousel-dot');
        dots.forEach((dot, dotIndex) => {
            dot.classList.toggle('active-dot', dotIndex === index);
        });
    }

    function changeImage(direction) {
        currentSlide = (currentSlide + direction + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function createDots() {
        slides.forEach((_, index) => {
            const dot = document.createElement('div');
            dot.className = 'carousel-dot';
            dot.onclick = () => showSlide(index);
            dotsContainer.appendChild(dot);
        });
    }

    createDots();
    showSlide(currentSlide);

    // Automatic scrolling
    setInterval(() => {
        changeImage(1);
    }, 3000); // Adjust the interval as needed (in milliseconds)
}
