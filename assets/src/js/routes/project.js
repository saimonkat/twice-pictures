import swiperStills from "../utils/swiper-stills";
import swiperTicker from "../utils/swiper-ticker";

export default {
	init() {
		swiperTicker();
		swiperStills();
	},
	finalize() {
		// console.log('Homepage loaded');
	},
};
