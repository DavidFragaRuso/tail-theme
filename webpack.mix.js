const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");


mix.sass("./src/css/theme.sass", "./style.css")
.js("./src/js/theme.js", "./public/js/theme.js")
.js("./src/js/customizer.js", "./public/js/customizer.js")
.js("./src/js/navigation.js", "./public/js/navigation.js")
.copyDirectory("./src/imgs/", "./public/imgs/")
.copyDirectory("./src/fonts/", "./public/fonts/")
.options({
	processCssUrls: false,
	postCss: [tailwindcss("./tailwind.config.js")]
});
