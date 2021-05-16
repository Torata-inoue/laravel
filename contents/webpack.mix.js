const mix = require('laravel-mix');

const glob = require('glob');

const public_path = 'public';
const assets_path = './resources/assets';
mix.setPublicPath(public_path);

/**
 * sassのコンパイル用パス自動マッピング
 */
glob.sync(assets_path + '/scss/**/*.scss',
    {ignore: assets_path + '/scss/**/_*.scss'}
).map(function(file) {
    const index = file.indexOf('/scss');

    const dir         = file.slice(index + 1);
    const dir_path = dir.split("/").reverse().slice(1).reverse().join("/");
    const css_path = dir_path.replace('scss', 'css');

    mix.sass(file, public_path + '/' + css_path).version();
});

/**
 * javascriptのバージョン付け用パス自動マッピング
 */
glob.sync(assets_path + '/js/**/*.js').map(function (file) {
    const index = file.indexOf('/js');

    const dir         = file.slice(index + 1);
    const dir_path = dir.split("/").reverse().slice(1).reverse().join("/");

    mix.js(file, public_path + '/' + dir_path).version();
});

/**
 * reactコンパイル
 */
glob.sync(assets_path + '/react/public/**/*.js').map(function (file) {
    const index = file.indexOf('/react');

    const dir　= file.slice(index + 1);
    const dir_path = dir.split("/").reverse().slice(1).reverse().join("/");
    const react_path = dir_path.replace('/public', '');

    mix.js(file, public_path + '/' + react_path).react().version();
});
