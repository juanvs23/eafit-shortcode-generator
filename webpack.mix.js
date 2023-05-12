let mix = require("laravel-mix");

mix
  .js("src/js/index.js", "admin/js/index.js")

  .sass("src/scss/index.scss", "admin/css/index.css")

  ///.react()
  .setPublicPath("assets")
  .sourceMaps()
  .version();
