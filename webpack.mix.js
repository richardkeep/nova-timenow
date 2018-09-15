let mix = require('laravel-mix')

mix.setPublicPath('dist')

mix.js('resources/js/card.js', 'dist/js')
   .sass('resources/sass/card.scss', 'dist/css')
