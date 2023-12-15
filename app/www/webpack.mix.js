const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css').version();

// mix.babelConfig({
//     presets: [
//         ['@babel/preset-env', { targets: 'defaults' }]
//     ],
//     sourceType: 'unambiguous'
// });
mix.js('resources/js/app.js', 'public/js');
