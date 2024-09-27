# Initialisation sans framework avec TailwindCSS

## Prérequis

- **Installer** [`nodeJS`](https://nodejs.org/fr/download/package-manager) (version 18+ ou 20+) sur sont ordinateur.

- Avoir un terminal.

- avoir un dossier de travail :p

## Création du projet

### **1. Dans le répertoire de ton projet, exécute les commandes suivantes pour initialiser un projet npm :**

```bash
npm init -y
```

Cela va créer un fichier `package.json`.

### **2. Installer TailwindCSS**

Installe TailwindCSS ainsi que son CLI en exécutant :

```bash
npm install tailwindcss
```

Puis, génère un fichier de configuration Tailwind :

```bash
npx tailwindcss init
```
Cela créera un fichier `tailwind.config.js` que tu peux personnaliser selon tes besoins.

```json
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}","./public/**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

### **3. Créer le fichier CSS de Tailwind**

Dans ton dossier projet, crée un fichier CSS, par exemple `src/style.css`, avec le contenu suivant :Dans ton dossier projet, crée un fichier CSS, par exemple src/style.css, avec le contenu suivant :

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

### **4. Compiler le CSS avec Tailwind**

Pour compiler le CSS de Tailwind, ajoute une commande dans ton fichier `package.json` sous `"scripts"` :

```json
"scripts": {
  "build:css": "npx tailwindcss -i ./src/style.css -o ./public/output.css --watch"
}
```

Cette commande prend le fichier `src/style.css` et génère le fichier compilé `public/output.css`.

### **5. Exécuter Tailwind**

Lance la commande suivante pour que Tailwind compile ton CSS et surveille les changements dans ton projet :

```bash
npm run build:css
```

Cette commande continuera à surveiller les modifications de ton fichier style.css et générera automatiquement un fichier CSS optimisé.

### **6. Intégrer TailwindCSS dans tes pages web (HTML,PHP ...)**

Inclue le fichier CSS généré (`output.css`) dans tes fichiers PHP. Par exemple, dans ton fichier `index.html` :

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
    <link rel="stylesheet" href="/public/output.css">
</head>
<body class="bg-gray-100 text-center">
    <h1 class="text-3xl font-bold text-blue-600">Hello, TailwindCSS avec HTML !</h1>
</body>
</html>
```

Cela va te permettre d'utiliser les classes utilitaires de Tailwind dans tes fichiers HTML sans framework.

### **Bonus : Minification et Production**

Quand tu es prêt pour la production, tu peux utiliser cette commande pour générer un fichier CSS optimisé et minifié :

```bash
npx tailwindcss -i ./src/style.css -o ./public/output.css --minify
```

Cette version du fichier CSS sera beaucoup plus légère, idéale pour la production.

## Structure du projet

```
mon_projet/
  ├── node_modules/           # Dépendances du projet
  ├── public/                 # Fichiers publics (favicon, index.html, output.css)
  │   ├── output.css           # Styles du composant App
  │   ├── index.html           # Styles du composant App
  │   └── ...
  ├── src/                    # Code source de l'application
  │   ├── style.css           # Styles du composant App
  │   └── ...
  ├── tailwind.config         # Informations sur tailwindCSS
  ├── package.json            # Informations sur le projet
  ├── package-lock.json            # Informations sur le projet
  └── ...
```

## mettre à jour le fichier CSS de TailwindCSS

```bash
npm run build:css
```

# Conclusion