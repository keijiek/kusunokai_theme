import path from "path";
import autoprefixer from "autoprefixer";

export default {
  root: path.resolve(__dirname, "assets", "src"),
  build: {
    outDir: "../dist",
    emptyOutDir: true,
    minify: false,
    rollupOptions: {
      input: {
        index: path.resolve(__dirname, "assets", "src", "main.ts"),
      },
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`,
      },
    },
  },
  server: {
    port: 8080,
  },
  css: {
    postcss: {
      plugins: [autoprefixer],
    },
  },
  resolve: {
    alias: {
      // bootstrap 用のエイリアス. pathを書く時、`@bootstrap/scss/*`のように書く
      "@bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
      "@imgs": path.resolve(__dirname, "assets", "imgs"),
    },
  },
};
