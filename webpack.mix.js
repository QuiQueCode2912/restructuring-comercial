const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .react()
   .postCss('resources/css/app.css', 'public/css', [
       require("tailwindcss"),
   ])
    .js('resources/js/core.js', 'public/js')
    .postCss('resources/css/email.css', 'public/css')
    .postCss('resources/css/responsive.css', 'public/css');