import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/home.js",
                "resources/js/ready/index.js",
                "resources/js/contact-with-me/main.js",
                "resources/js/contact-with-me/text.js",
            ],
            refresh: true,
        }),
    ],
});
