// FIXES
import "./fixes";

import Router from "./utils/Router";
import common from "./routes/common";
import home from "./routes/home";
import project from "./routes/project";

/** Populate Router instance with DOM routes */
const routes = new Router({
	common,
	home,
	project,
});

window.addEventListener("DOMContentLoaded", () => {
	routes.loadEvents();
});
