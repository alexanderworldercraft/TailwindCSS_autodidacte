// tailwind.config.js
module.exports = {
    content: [
      './src/**/*.{html,php}', // Couvre tous les fichiers HTML et PHP dans /src/
      './public/**/*.{html,php}', // Couvre aussi le dossier public, où index.php pourrait être présent
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  };