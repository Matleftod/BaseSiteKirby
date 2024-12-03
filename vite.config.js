import { defineConfig } from 'vite';

export default defineConfig({
  root: 'assets',
  build: {
    outDir: '../dist',
    rollupOptions: {
      input: './js/main.ts', // Modifie le point d'entrée pour TypeScript
    },
  },
  server: {
    port: 3000,
    open: true,
  },
});