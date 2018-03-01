var elixir = require('laravel-elixir');

elixir(function(mix) {
    //mix.less('index.less');
    mix.browserify('app.js');
});