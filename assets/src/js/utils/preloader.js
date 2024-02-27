export default function () {
	function removeLoader() {
		if (!removedLoader && preloader) {
			document.body.style.overflow = "";
			preloader.remove();
			removedLoader = true;
		}
	}

	const preloader = document.querySelector(".preloader");
	let removedLoader = false;

	let timeout = setTimeout(() => {
		removeLoader();
	}, 1000);

	window.onload = function () {
		clearTimeout(timeout);
		removeLoader();
	};
}
