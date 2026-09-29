import './videos';
import Swiper from 'swiper';
import { Navigation, Pagination, A11y, Keyboard, Autoplay, EffectFade } from 'swiper/modules';

const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
const header = document.querySelector('.site-header');
const menuButton = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.nav-links');
const closeMenu = (restoreFocus = false) => {
    menuButton.setAttribute('aria-expanded', 'false');
    menuButton.setAttribute('aria-label', 'Open menu');
    navigation.classList.remove('is-open');
    if (restoreFocus) menuButton.focus();
};
menuButton.addEventListener('click', () => {
    const open = menuButton.getAttribute('aria-expanded') !== 'true';
    menuButton.setAttribute('aria-expanded', String(open));
    menuButton.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    navigation.classList.toggle('is-open', open);
});
navigation.querySelectorAll('a').forEach(link => link.addEventListener('click', () => closeMenu()));
document.addEventListener('keydown', event => {
    if (event.key === 'Escape' && menuButton.getAttribute('aria-expanded') === 'true') closeMenu(true);
});
document.addEventListener('click', event => { if (!header.contains(event.target)) closeMenu(); });
window.matchMedia('(min-width: 701px)').addEventListener('change', () => closeMenu());
const updateHeader = () => header.classList.toggle('scrolled', window.scrollY > 15);
window.addEventListener('scroll', updateHeader, { passive: true });
updateHeader();

if ('IntersectionObserver' in window) {
    if (!motion.matches) document.documentElement.classList.add('js-motion');
    document.querySelectorAll('.business-grid, .category-grid, .bundle-list, .retail-demo-grid, .shop-videos, .values').forEach(group => {
        group.querySelectorAll('.reveal').forEach((element, index) => element.style.setProperty('--reveal-delay', `${Math.min(index * 90, 360)}ms`));
    });
    document.querySelectorAll('.section-heading h2, .retail-copy h2, .bundle-story-copy h2, .about-layout h2, .contact-copy h2, .social-heading h2').forEach(heading => {
        heading.classList.add('reveal-title');
    });
    const revealObserver = new IntersectionObserver(entries => entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            revealObserver.unobserve(entry.target);
        }
    }), { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    document.querySelectorAll('.reveal').forEach(element => revealObserver.observe(element));
    const sectionObserver = new IntersectionObserver(entries => entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        navigation.querySelectorAll('a').forEach(link => {
            const active = link.hash === `#${entry.target.id}`;
            link.classList.toggle('active', active);
            if (active) link.setAttribute('aria-current', 'location');
            else link.removeAttribute('aria-current');
        });
    }), { rootMargin: '-15% 0px -60% 0px' });
    ['home', 'wholesale', 'bundles', 'retail', 'about'].forEach(id => sectionObserver.observe(document.getElementById(id)));
}

const parallaxMedia = [...document.querySelectorAll('.business-panel>img, .category-image img, .bundle-thumb img, .retail-visual>img, .retail-demo-image img, .video-frame video, .hero-swiper img')];
const updateParallax = () => {
    if (motion.matches || window.innerWidth < 701) {
        parallaxMedia.forEach(element => element.style.removeProperty('--scroll-lift'));
        return;
    }
    const viewport = window.innerHeight;
    parallaxMedia.forEach(element => {
        const rect = element.getBoundingClientRect();
        if (rect.bottom < -80 || rect.top > viewport + 80) return;
        const progress = ((rect.top + rect.height / 2) - viewport / 2) / viewport;
        element.style.setProperty('--scroll-lift', `${Math.max(-18, Math.min(18, progress * -28)).toFixed(2)}px`);
    });
};
let parallaxQueued = false;
const queueParallax = () => {
    if (parallaxQueued) return;
    parallaxQueued = true;
    requestAnimationFrame(() => {
        updateParallax();
        parallaxQueued = false;
    });
};
window.addEventListener('scroll', queueParallax, { passive: true });
window.addEventListener('resize', queueParallax);
queueParallax();

const heroCurrent = document.querySelector('.hero-current');
const hero = new Swiper('.hero-swiper', {
    modules: [Pagination, A11y, Autoplay, EffectFade],
    slidesPerView: 1,
    loop: true,
    speed: motion.matches ? 0 : 1000,
    effect: 'fade',
    fadeEffect: { crossFade: true },
    allowTouchMove: true,
    autoplay: motion.matches ? false : { delay: 3800, disableOnInteraction: false, pauseOnMouseEnter: true },
    pagination: { el: '.hero-pagination', clickable: true },
    a11y: { containerMessage: 'Featured Wear and Wow carousel', itemRoleDescriptionMessage: 'featured slide' },
    on: {
        slideChange(swiper) {
            if (heroCurrent) heroCurrent.textContent = String(swiper.realIndex + 1).padStart(2, '0');
        },
    },
});

const collection = new Swiper('.collection-swiper', {
    modules: [Navigation, Pagination, A11y, Keyboard, Autoplay],
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    grabCursor: true,
    speed: motion.matches ? 0 : 850,
    keyboard: { enabled: true, onlyInViewport: true },
    navigation: { nextEl: '.collection-next', prevEl: '.collection-prev' },
    pagination: { el: '.collection-pagination', clickable: true, renderBullet: (index, className) => `<button class="${className}" aria-label="Go to collection ${index + 1}"></button>` },
    autoplay: motion.matches ? false : { delay: 3000, disableOnInteraction: false, pauseOnMouseEnter: true },
    breakpoints: { 701: { slidesPerView: 2 }, 1024: { slidesPerView: 3 }, 1600: { slidesPerView: 3.5 } },
    a11y: { containerMessage: 'Wear and Wow collections', itemRoleDescriptionMessage: 'collection' },
});

motion.addEventListener('change', () => {
    if (motion.matches) { document.documentElement.classList.remove('js-motion'); }
    hero.params.speed = motion.matches ? 0 : 1000;
    collection.params.speed = motion.matches ? 0 : 850;
    [hero, collection].forEach(swiper => {
        if (motion.matches) swiper.autoplay?.stop();
        else swiper.autoplay?.start();
    });
});
