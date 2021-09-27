
let mix = require('laravel-mix');

mix
    .setPublicPath( './assets/dist' )
    .browserSync( localhost.wordpress ); // Change domain to the domain for the current project.
mix
    .sass( 'assets/src/scss/main.scss', 'css' );
mix
    .js('assets/src/js/main.js', 'js');
