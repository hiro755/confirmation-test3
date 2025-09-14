const mix = require('laravel-mix');

mix.setPublicPath('public'); // 生成先のルートを public/ に固定

mix.js('resources/js/app.js', 'js')
   .postCss('resources/css/app.css', 'css')
   .postCss('resources/css/pigly.css', 'css');

// 本番はバージョニングしたい場合のみ
if (mix.inProduction()) {
  mix.version();
}