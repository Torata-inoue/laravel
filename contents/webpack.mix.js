const mix = require('laravel-mix');

const glob = require('glob');

/**
* sassのコンパイル用パス自動マッピング
*/
glob.sync('./resources/assets/scss/**/*.scss').map(function(file) {
  const index = file.indexOf('/scss');

  const dir         = file.slice(index + 1);
  const dir_path = dir.split("/").reverse().slice(1).reverse().join("/");
  const css_path = dir_path.replace('scss', 'css');

  mix.sass(file, 'public/' + css_path);
});
