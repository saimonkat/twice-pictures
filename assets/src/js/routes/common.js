import menu from "../utils/menu";
import subscribeForm from "../utils/subscribeForm";
import video from "../utils/video";
import preloader from "../utils/preloader";

export default {
	init() {
		preloader();
		menu();
		subscribeForm();
		video();

		const sound = document.querySelector(".js-banner-sound");

		sound &&
			sound.addEventListener("click", function (e) {
				e.preventDefault();

				if (this.contains(e.target)) {
					const video = this.previousElementSibling;
					video.muted = !video.muted;
					[...sound.children].forEach((svg) => {
						svg.classList.toggle("active");
					});
				}
			});
	},
	finalize() {},
};
