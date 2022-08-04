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
            input: "resources/js/app.js",
        },
    },
});
