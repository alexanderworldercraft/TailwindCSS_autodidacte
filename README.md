# TailwindCSS en autodidacte

![TailwindCSS](./asset/img/tailwindcss.webp)

*Image illustrant TailwindCSS.*

## Sommaire :

- [**🌟 Introduction**](#introduction)
  - [Qu'est-ce que TailwindCSS ?](#quest-ce-que-tailwindcss)
  - [Points forts de TailwindCSS](#points-forts-de-tailwindcss)
    - Flexibilité
    - Gain de temps
    - Personnalisable
  - [Extension VScode](#extension-vscode)
- [**🚀 Initialisation d'un projet viteJS avec TailwindCSS**](#initialisation-dun-projet-vitejs-avec-tailwindcss)
  - [Prérequis](#prérequis)
  - [Création du projet](#création-du-projet)
    - Créer un projet avec viteJS
    - Installer TailwindCSS avec le Framework viteJS
    - Configurez les chemins d'accès à vos modèles
    - Supprimer ce que l'on n'a pas besoin dans le projet
    - Ajoutez les directives Tailwind à votre CSS
    - Ajouter le `link:css` dans l'`index.html`
    - Démarrer le processus de build
    - utiliser les classe de tailwindCSS pour designer la page web
  - [Structure du projet](#structure-du-projet)
  - [Lancement du serveur de développement](#lancement-du-serveur-de-développement)
- [**🏁 Conclusion**](#conclusion)
- [**🥇 Contribution**](#contribution)
  - [Contribueur](#contribueur)
- [**Licence**](#licence)

---

## Introduction

### Qu'est-ce que TailwindCSS ?
TailwindCSS est un framework CSS utilitaire qui permet de concevoir des interfaces utilisateurs rapidement et de manière flexible. Contrairement aux autres frameworks comme Bootstrap, Tailwind n'impose pas de styles prédéfinis pour les composants (boutons, cartes, etc.), mais fournit plutôt une série de classes CSS utilitaires que tu peux combiner directement dans ton HTML pour créer tes propres designs. Cela te permet d'avoir un contrôle total sur l'apparence de ton site tout en écrivant moins de CSS personnalisé.

Par exemple, pour créer un bouton avec TailwindCSS, tu utiliserais des classes comme celles-ci dans ton HTML :
```
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
  Mon bouton
</button>
```
Chaque classe (`bg-blue-500`, `hover:bg-blue-700`, `py-2`, etc.) correspond à un style spécifique (couleur de fond, effet au survol, marges, etc.), ce qui permet d'éviter d'écrire des règles CSS dans un fichier séparé.

### Points forts de TailwindCSS :
- **Flexibilité** : Tu n'es pas limité par des composants préconstruits, tu crées exactement ce que tu veux.

- **Gain de temps** : Pas besoin de repasser par du CSS personnalisé pour des détails, tout peut être géré avec des classes utilitaires.

- **Personnalisable** : Tu peux configurer Tailwind pour qu'il génère exactement les styles dont tu as besoin, réduisant ainsi la taille des fichiers CSS en production.

C'est particulièrement apprécié pour des projets où tu veux un contrôle précis sur le design, sans avoir à te soucier de la surcharge de styles imposée par des frameworks plus traditionnels.

### Extension VScode

Dans visuel studio code l'extension [`Tailwind CSS IntelliSense`](https://marketplace.visualstudio.com/items?itemName=bradlc.vscode-tailwindcss) améliore l'expérience de développement de Tailwind en offrant aux utilisateurs de Visual Studio Code des fonctionnalités avancées telles que l'autocomplétion, la coloration syntaxique et le linting.

---

## Initialisation d'un projet viteJS avec TailwindCSS

### Prérequis

- **Installer** [`nodeJS`](https://nodejs.org/fr/download/package-manager) (version 18+ ou 20+) sur sont ordinateur.

- Utiliser [`vite.JS`](https://vitejs.dev/guide/#scaffolding-your-first-vite-project) dans cette exemple.

- Avoir un terminal.

- avoir un dossier de travail :p

### Création du projet

1. **Créer un projet avec viteJS** : Dans le terminal déplacer vous dans votre dossier de travail et executé la commande
```
npm create vite@latest
```
Il vous demandera le `nom du projet`, le `nom du package`, le `framework` et sa `variante`. Pour cet exemple, nous allons nommer le projet et le package `TailwindCSS_viteJS`. Nous n'allons pas prendre de framework et choisir `Vanilla` avec sa variante `TypeScript`.

Cela va alors créer un dossier avec le nom du projet, ici `TailwindCSS_viteJS`, et créer tous les éléments de ViteJS pour son bon fonctionnement.

---
2. **Installer TailwindCSS avec le Framework viteJS** dans sont dossier de projet et l'initialiser avec les commande suivante :
```
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```
---
3. **Configurez les chemins d'accès à vos modèles**
Ajoutez les chemins d'accès à tous vos fichiers modèles dans votre fichier `tailwind.config.js`.

```
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

```
@tailwind base;
@tailwind components;
@tailwind utilities;
```
---
6. **Ajouter le `link:css` dans l'`index.html`**
qui devrait resembler à cela.

```
<link rel="stylesheet" href="src/style.css">
```
---
7. **Démarrer le processus de build**

Lancez votre processus de build dans le terminal avec la commande

```
npm run dev
```
---
8. **utiliser les classe de tailwindCSS pour designer la page web**

```
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
```
npm run dev
```

## Conclusion
---

## Contribution

Les contributions à ce repository sont les bienvenues ! Si vous souhaitez corriger une erreur ou améliorer le contenu existant, n'hésitez pas à m'en faire part.

### Contribueur

- [**👨‍💻🥇 Alexander worldercraft**](https://github.com/alexanderworldercraft)

## Licence

Ce contenu est sous licence [GNU GPLv3](LICENSE.txt). Vous êtes libre de l'utiliser, le modifier et le distribuer selon les termes de cette licence.

---

Bonne apprentissage et bon développement !