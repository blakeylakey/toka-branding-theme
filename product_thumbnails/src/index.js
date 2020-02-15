import React from "react";
import ReactDOM from "react-dom";

import App from "./components/App";

import "./css/bootstrap.min.css";

/* const params = {
    color_theme: document.getElementById('artificial-scarcity-root').dataset.color_theme,
    layout: document.getElementById('artificial-scarcity-root').dataset.layout.split(','),
    timeline: document.getElementById('artificial-scarcity-root').dataset.timeline
}; */


ReactDOM.render(<App />, document.getElementById('toka-branding-product-thumbnail'));