export default function () {
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.menu');
    const body = document.querySelector('body');

    if (menu) {
        window.addEventListener('load', () => {
            menu.classList.add('menu');
        });

        document.addEventListener('click', e => {
            if (hamburger.contains(e.target)) {
                hamburger.classList.toggle('active');
                menu.classList.toggle('open');
                body.classList.toggle('overflow');
            }

            if (!hamburger.contains(e.target) && !menu.contains(e.target)) {
                hamburger.classList.remove('active');
                menu.classList.remove('open');
                body.classList.remove('overflow');
            }
        }, false);

        window.addEventListener('scroll', e => {
            if (window.scrollY > 0) {
                !hamburger.classList.contains('fixed') && hamburger.classList.add('fixed');
            } else {
                hamburger.classList.contains('fixed') && hamburger.classList.remove('fixed');
            }
        });
    }
}