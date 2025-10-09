// vite.config.js
import { defineConfig } from "file:///C:/laragon/www/arbana/node_modules/vite/dist/node/index.js";
import laravel from "file:///C:/laragon/www/arbana/node_modules/laravel-vite-plugin/dist/index.js";
import tailwindcss from "file:///C:/laragon/www/arbana/node_modules/@tailwindcss/vite/dist/index.mjs";
var vite_config_default = defineConfig({
  plugins: [
    tailwindcss(),
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/js/animate.js"
      ],
      refresh: true
    })
  ]
});
export {
  vite_config_default as default
};