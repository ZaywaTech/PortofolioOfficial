let currentSlide = 0;
const slides = document.querySelectorAll('.service-slide');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');

function showSlide(index) {
    if (index >= slides.length) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = slides.length - 1;
    }
    const offset = -currentSlide * 100;
    document.querySelector('.service-slider').style.transform = `translateX(${offset}%)`;
}

nextBtn.addEventListener('click', () => {
    currentSlide++;
    showSlide(currentSlide);
});

prevBtn.addEventListener('click', () => {
    currentSlide--;
    showSlide(currentSlide);
});

// Auto-slide every 5 seconds
setInterval(() => {
    currentSlide++;
    showSlide(currentSlide);
}, 5000);
