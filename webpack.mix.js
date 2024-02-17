let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'www/js')
    .sass('resources/sass/app.scss', 'www/css');
