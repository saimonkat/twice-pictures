import Swiper, { Autoplay } from "swiper";
Swiper.use([Autoplay]);

export default function () {
	const tickerSlider = document.querySelectorAll(".ticker-slider");

	tickerSlider &&
		tickerSlider.forEach((slider) => {
			new Swiper(slider, {
				slidesPerView: "auto",
				spaceBetween: 10,
				loop: true,
				centeredSlides: true,
				speed: 20000,
				autoplay: {
					delay: 0,
					disableOnInteraction: false,
				},
			});
		});
}
