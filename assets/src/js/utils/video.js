import { gsap, ScrollTrigger } from "gsap/all";
import { Timeline } from "gsap/gsap-core";

gsap.registerPlugin(ScrollTrigger, Timeline);

export default function () {
	const videos = document.getElementsByClassName("video");
	const projectVideos = document.getElementsByClassName(
		"director-single__film"
	);
	const titles = document.querySelectorAll(".js-parallax-title");
	const mobileDevice =
		/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
			navigator.userAgent
		);

	function isInViewport(element) {
		const rect = element.getBoundingClientRect();
		return (
			rect.top >= 0 &&
			rect.bottom <=
				(window.innerHeight || document.documentElement.clientHeight)
		);
	}

	[
		"fullscreenchange",
		"mozfullscreenchange",
		"webkitfullscreenchange",
		"msfullscreenchange",
	].forEach((event) => {
		document.addEventListener(event, (e) => {
			if (document.fullscreenElement !== null) {
				document.body.style.cursor = "initial";
				e.target.classList.add("fullscreen");
			} else {
				document.body.style.cursor = "default";
				e.target.classList.remove("fullscreen");
			}
		});
	});

	videos &&
		[...videos].forEach((video) => {
			let isPlaying = false;
			video.pause();

			if (video.tagName === "VIDEO") {
				video.addEventListener("mouseenter", (e) => {
					setTimeout(() => {
						isPlaying = e.target.play();
					}, 100);
				});

				video.addEventListener("mouseleave", (e) => {
					setTimeout(() => {
						isPlaying.then(() => {
							e.target.pause();
						});
					}, 100);
				});
			}

			if (mobileDevice) {
				const videoOnScroll = () => {
					if (isInViewport(video) && !isPlaying) {
						setTimeout(() => {
							isPlaying = video.play();
						}, 300);
						return;
					}

					if (!isInViewport(video) && isPlaying) {
						setTimeout(() => {
							isPlaying.then(() => {
								video.pause();
								isPlaying = false;
							});
						}, 300);
						return;
					}
				};

				videoOnScroll();
				window.addEventListener("scroll", videoOnScroll);
			}
		});

	projectVideos &&
		[...projectVideos].forEach((videoParent) => {
			let isPlaying = false;
			let currentVid;
			let video = videoParent.querySelector(".video");
			let videoMeta = videoParent.querySelector(".director-single__film__meta");
			video.pause();

			if (video.tagName === "VIDEO") {
				videoMeta.addEventListener("mouseenter", (e) => {
					setTimeout(() => {
						isPlaying = e.target.nextElementSibling
							.querySelector(".video")
							.play();
					}, 100);
				});

				videoMeta.addEventListener("mouseleave", (e) => {
					setTimeout(() => {
						isPlaying.then(() => {
							currentVid = e.target.nextElementSibling.querySelector(".video");
							currentVid.pause();
							currentVid.currentTime = 0;
						});
					}, 100);
				});
			}
		});

	titles &&
		titles.forEach((title) => {
			gsap.to(title, {
				ease: "none",
				// y: "-100px",
				yPercent: -60,
				scrollTrigger: {
					trigger: title,
					scrub: true,
				},
			});
		});
}
