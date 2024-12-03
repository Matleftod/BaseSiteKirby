import { defineConfig } from 'vite';

export default defineConfig({
  root: 'assets', // Dossier source pour Vite
  build: {
    outDir: '../dist', // Dossier de sortie
    assetsDir: 'js', // Sous-dossier pour les assets JS/CSS
    rollupOptions: {
      input: './js/main.js', // Point d'entrée principal
    },
  },
  server: {
    port: 3000,
    open: true, // Ouvre le navigateur automatiquement
  },
});
