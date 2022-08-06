import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel(["resources/css/app.css", "resources/**/*.{js,ts,vue}"]),
        {
            name: "blade",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".blade.php")) {
                    server.ws.send({
                        type: "full-reload",
                        path: "*",
                    });
                }
            },
        },
    ],
    build: {
        manifest: true,
        outDir: "public/build",
        rollupOptions: {
            input: [
                "resources/js/app.js",
                "resources/js/cart/add.js",
                "resources/js/cart/Cart.js",
                "resources/js/cart/checkout.js",
                "resources/js/cart/clearCart.js",
                "resources/js/cart/sidebar.js",
                "resources/js/orders/edit.js",
            ],
        },
    },
});
