const mix = require('laravel-mix')


// 本番ビルド時にバージョニングしたい場合
if (mix.inProduction()) {
  mix.version()
}