import './videos';
import Swiper from 'swiper';
import { Navigation, Pagination, A11y, Autoplay, EffectFade, Keyboard } from 'swiper/modules';
const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
const carousel = new Swiper('.d2-hero-swiper', {
    modules: [Navigation, Pagination, A11y, Autoplay, EffectFade, Keyboard],
    loop: true, effect: 'fade', fadeEffect: { crossFade: true }, speed: motion.matches ? 0 : 800,
    autoplay: motion.matches ? false : { delay: 5500, disableOnInteraction: false, pauseOnMouseEnter: true },
    navigation: { prevEl: '.d2-hero-prev', nextEl: '.d2-hero-next' },
    pagination: { el: '.d2-hero-pagination', clickable: true },
    keyboard: { enabled: true, onlyInViewport: true },
});
const toggle = document.querySelector('.d2-hero-autoplay');
const update = () => { toggle.setAttribute('aria-label', carousel.autoplay.running ? 'Pause slideshow' : 'Play slideshow'); toggle.innerHTML = carousel.autoplay.running ? '<span aria-hidden="true">Ⅱ</span>' : '<span aria-hidden="true">▶</span>'; };
toggle.addEventListener('click', () => { if (carousel.autoplay.running) carousel.autoplay.stop(); else carousel.autoplay.start(); update(); });
motion.addEventListener('change', () => { carousel.params.speed = motion.matches ? 0 : 800; if (motion.matches) carousel.autoplay.stop(); update(); });
update();
