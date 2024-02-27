import Swiper, { Autoplay } from "swiper";
Swiper.use([Autoplay]);

export default function () {
	const moviesSlider = document.querySelectorAll(".movies-slider");

	moviesSlider &&
		moviesSlider.forEach((slider) => {
			new Swiper(slider, {
				slidesPerView: "auto",
				spaceBetween: 12,
				loop: true,
				centeredSlides: true,
				speed: 15000,
				autoplay: {
					delay: 0,
					disableOnInteraction: false,
				},
				breakpoints: {
					768: {
						spaceBetween: 60,
						speed: 20000,
					},
				},
			});
		});
}
