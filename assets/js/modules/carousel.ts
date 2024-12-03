export function initCarousel(): void {
  const carousels = document.querySelectorAll<HTMLElement>('.carousel');

  carousels.forEach((carousel) => {
    const slidesContainer = carousel.querySelector<HTMLElement>('.carousel__slides');
    const slides = carousel.querySelectorAll<HTMLElement>('.carousel__slide');
    const prevButton = carousel.querySelector<HTMLElement>('.carousel__prev');
    const nextButton = carousel.querySelector<HTMLElement>('.carousel__next');

    if (!slidesContainer || slides.length === 0) return;

    let currentIndex = 0;

    const updateCarousel = () => {
      const offset = -(currentIndex * 100);
      slidesContainer.style.transform = `translateX(${offset}%)`;
    };

    prevButton?.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateCarousel();
    });

    nextButton?.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateCarousel();
    });

    // Auto-scroll (optionnel)
    setInterval(() => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateCarousel();
    }, 5000); // Change de slide toutes les 5 secondes
  });
}