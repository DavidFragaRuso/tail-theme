const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");

//Folder that contains our un-compliled CSS
mix.sass("./src/css/theme.sass", "./style.css")
.options({
	processCssUrls: false,
	postCss: [tailwindcss("./tailwind.config.js")]
});