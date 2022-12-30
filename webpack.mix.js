const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");

//Folder that contains our un-compliled CSS
mix.sass("./src/css/theme.sass", "./style.css")
.js("./src/js/theme.js", "./public/js/theme.js")
.copyDirectory("./src/imgs/", "./public/imgs/")
.options({
	processCssUrls: false,
	postCss: [tailwindcss("./tailwind.config.js")]
});