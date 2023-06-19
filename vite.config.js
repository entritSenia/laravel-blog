import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/bootstrap.min.css",
                "resources/css/plugins/owl-carousel/owl.carousel.css",
                "resources/css/style.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
