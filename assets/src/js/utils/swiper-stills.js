import Swiper, { Autoplay } from "swiper";
Swiper.use([Autoplay]);

export default function () {
	const stillsSlider = document.querySelectorAll(".stills-slider");

	stillsSlider &&
		stillsSlider.forEach((slider) => {
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
						speed: 20000,
						spaceBetween: 60,
					},
				},
			});
		});
}
