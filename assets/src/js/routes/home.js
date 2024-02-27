import video from "../utils/video";
import swiper from "../utils/swiper";
import swiperTicker from "../utils/swiper-ticker";

export default {
	init() {
		swiperTicker();
		swiper();
	},
	finalize() {
		// console.log('Homepage loaded');
	},
};
