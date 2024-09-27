# viteJS avec TailwindCSS

![viteJS](../asset/img/vite-logo.png)

*Image illustrant viteJS.*

## Sommaire :

- [**🚅 Initialisation d'un projet viteJS avec TailwindCSS**](#)
  - [Prérequis](#prérequis)
  - [Création du projet](#création-du-projet)
  - [Structure du projet](#structure-du-projet)
  - [Lancement du serveur de développement](#lancement-du-serveur-de-développement)
  
  - [**🏁 Conclusion**](#conclusion)

### Prérequis

- **Installer** [`nodeJS`](https://nodejs.org/fr/download/package-manager) (version 18+ ou 20+) sur sont ordinateur.

- Utiliser [`vite.JS`](https://vitejs.dev/guide/#scaffolding-your-first-vite-project) dans cette exemple.

- Avoir un terminal.

- avoir un dossier de travail :p

### Création du projet

1. **Créer un projet avec viteJS** : Dans le terminal déplacer vous dans votre dossier de travail et executé la commande
```bash
npm create vite@latest
```
Il vous demandera le `nom du projet`, le `nom du package`, le `framework` et sa `variante`. Pour cet exemple, nous allons nommer le projet et le package `TailwindCSS_viteJS`. Nous n'allons pas prendre de framework et choisir `Vanilla` avec sa variante `TypeScript`.

Cela va alors créer un dossier avec le nom du projet, ici `TailwindCSS_viteJS`, et créer tous les éléments de ViteJS pour son bon fonctionnement.

---
2. **Installer TailwindCSS avec le Framework viteJS** dans sont dossier de projet et l'initialiser avec les commande suivante :
```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```
---
3. **Configurez les chemins d'accès à vos modèles**
Ajoutez les chemins d'accès à tous vos fichiers modèles dans votre fichier `tailwind.config.js`.

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}
```
---
4. **Supprimer ce que l'on n'a pas besoin dans le projet**

- Dans le dossier `/src/`, nous allons supprimer les fichiers `counter.ts` et `main.js`.

- Supprimer ces deux ligne `<div id="app"></div>` et `<script type="module" src="/src/main.ts"></script>` dans l'`index.html` car nous n'on auront pas besoin.

- Supprimer le contenu du fichier `style.css`.
---
5. **Ajoutez les directives Tailwind à votre CSS**
Ajoutez les directives @tailwind pour chacune des couches de Tailwind à votre fichier `./src/style.css`.

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```
---
6. **Ajouter le `link:css` dans l'`index.html`**
qui devrait resembler à cela.

```html
<link rel="stylesheet" href="src/style.css">
```
---
7. **Démarrer le processus de build**

Lancez votre processus de build dans le terminal avec la commande

```bash
npm run dev
```
---
8. **utiliser les classe de tailwindCSS pour designer la page web**

```html
<div class="bg-red-950 p-10 text-cyan-300 text-center font-bold">salut</div>
```

Se code doit vous afficher le texte `salut` au centre de l'élément `<div>` avec comme couleur du cyan sur du rouge foncé.

### Structure du projet

Voici à quoi ressemble la structure de votre projet après son initialisation avec Vite :

```
TailwindCSS_viteJS/
  ├── node_modules/           # Dépendances du projet
  ├── public/                 # Fichiers publics (favicon, index.html)
  ├── src/                    # Code source de l'application
  │   ├── style.css           # Styles du composant App
  │   ├── counter.ts          # Composant principal
  │   ├── main.js             # Point d'entrée de l'application
  │   └── ...
  ├── index.html              # Point d’entrée HTML
  └── package.json            # Informations sur le projet
```

Et voici à quoi ressemble la structure de votre projet après l'ajout de tailwindcss et des modification que l'on a effectuer :

```
TailwindCSS_viteJS/
  ├── node_modules/           # Dépendances du projet
  ├── public/                 # Fichiers publics (favicon, index.html)
  ├── src/                    # Code source de l'application
  │   ├── style.css           # Styles du composant App
  │   └── ...
  ├── index.html              # Point d’entrée HTML
  ├── tailwind.config         # Informations sur tailwindCSS
  ├── package.json            # Informations sur le projet
  └── ...
```

### Lancement du serveur de développement
Utiliser la command suivante dans le terminal en étant préalablement déplacer dans le dossier du projet ici `TailwindCSS_viteJS` :
```bash
npm run dev
```

# Conclusion

Cela est plus facile à utiliser qu'il n'y paraît. ViteJS apporte une solution facile et rapide pour la création d'un projet.

---

# [**🔙 Retour**](/README.md)