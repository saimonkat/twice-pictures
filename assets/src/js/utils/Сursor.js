import gsap from "gsap";
import { TweenLite } from "gsap/gsap-core";

gsap.registerPlugin(TweenLite);

export default class Cursor {
	constructor() {
		this.cursor = document.querySelector(".cursor");
		this.inited = false;
	}

	isMobile() {
		return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
			navigator.userAgent
		);
	}

	init() {
		const cursor = this.cursor;
		let inited = this.inited;

		cursor.style.backgroundImage =
			"url('" +
			twice_pictures.site_url +
			"/assets/dist/images/icons/cursor.svg')";

		function chooseCursor() {
			cursor.classList.contains("play")
				? (cursor.style.backgroundImage =
						"url('" +
						twice_pictures.site_url +
						"/assets/dist/images/icons/cursor-play.svg')")
				: (cursor.style.backgroundImage =
						"url('" +
						twice_pictures.site_url +
						"/assets/dist/images/icons/cursor.svg')");
		}

		if (this.isMobile()) return;

		document.addEventListener("mouseover", function (e) {
			e.target.matches(".video") && cursor.classList.add("play");
			chooseCursor();
			e.target.closest("a, button") && cursor.classList.add("cursor--hovered");
		});

		document.addEventListener("mouseout", (e) => {
			e.target.matches(".video") && cursor.classList.remove("play");
			chooseCursor();
			e.target.closest("a, button") &&
				cursor.classList.remove("cursor--hovered");
		});

		window.onmousemove = function (e) {
			let mouseX = e.clientX;
			let mouseY = e.clientY;
			if (!inited) {
				cursor.style.opacity = 1;
				TweenLite.to(cursor, 0.3, {
					opacity: 1,
				});
				inited = true;
			}
			TweenLite.to(cursor, 0, {
				top: mouseY + "px",
				left: mouseX + "px",
			});
		};

		window.onmouseout = function (e) {
			cursor.style.opacity = 0;
			TweenLite.to(cursor, 0.3, {
				opacity: 0,
			});
			inited = false;
		};
	}
}
