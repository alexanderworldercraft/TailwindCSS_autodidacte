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

- [**🚀 Initialisation d'un projet PHP/nodeJS avec TailwindCSS pour Docker**]()
  - [Prérequis](#prérequis-1)
  - [Création du projet](#création-du-projet-1)
  - [Structure du projet](#structure-du-projet-1)
  - [Lancement du serveur de développement](#lancement-du-serveur-de-développement-1)
- [**🏁 Conclusion**](#conclusion)
- [**🥇 Contribution**](#contribution)
  - [Contribueur](#contribueur)
- [**Licence**](#licence)

---

## Introduction

### Qu'est-ce que TailwindCSS ?
TailwindCSS est un framework CSS utilitaire qui permet de concevoir des interfaces utilisateurs rapidement et de manière flexible. Contrairement aux autres frameworks comme Bootstrap, Tailwind n'impose pas de styles prédéfinis pour les composants (boutons, cartes, etc.), mais fournit plutôt une série de classes CSS utilitaires que tu peux combiner directement dans ton HTML pour créer tes propres designs. Cela te permet d'avoir un contrôle total sur l'apparence de ton site tout en écrivant moins de CSS personnalisé.

Par exemple, pour créer un bouton avec TailwindCSS, tu utiliserais des classes comme celles-ci dans ton HTML :
```html
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
---

## Initialisation d'un projet PHP_nodeJS avec TailwindCSS

### Prérequis

- **Installer** [`nodeJS`](https://nodejs.org/fr/download/package-manager) (version 18+ ou 20+) sur sont ordinateur.

- **Installer** [`Docker`](https://www.docker.com/) sur sont ordinateur.

- **Installer** [`Docker desktop`](https://www.docker.com/products/docker-desktop/) sur sont ordinateur. *(bonus non obligatoire)*

- Avoir un terminal.

- avoir un dossier de travail :p

### Création du projet

Pour créer le projet, il faudra créer quelque fichiers et dossiers dans vôtre dossier de travail.

- un dossier `conf` dans lequel vous aller créer un fichier `default.conf`qui sera le nouveau fichier par default du projet avec le contenu suivant :

```
Racine_du_projet/
  └── conf/ 
      └── default.conf        # fichier de configuration par default
```

```
server {
    listen 80;
    index index.php index.html;
    server_name _;
    root /var/www/html/public;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
}
```

ensuite nous allons créer les fichiers `Dockerfile` et `yml` à la racine

```
Racine_du_projet/
  ├── default/
  │   └── default.conf
  │
  ├── docker-compose.yml      # Le gestionnaire des conteneurs
  ├── php.Dockerfile          # Dockerfile du conteneur PHP
  └── nginx.Dockerfile        # Dockerfile du conteneur nginX
```

1. nginx.Dockerfile
```Dockerfile
FROM nginx:stable-alpine

# On crée un utilisateur pour Nginx
RUN adduser -g coda -s /bin/sh -D coda

# sed (stream editor) est outil de modification de texte
RUN sed -i "s/user  nginx/user  coda/g" /etc/nginx/nginx.conf

# Créé notre dossier de code
RUN mkdir -p /var/www/html/public

# On envoie notre configuration pour le site par défaut
COPY conf/default.conf /etc/nginx/conf.d/default.conf
COPY src/index.php /var/www/html/public/index.php
COPY src/css/ /var/www/html/public/css/
COPY src/js/ /var/www/html/public/js/

# On expose le port 80 pour Nginx
EXPOSE 80
```

2. php.Dockerfile
```Dockerfile
# On part d'une image PHP 8.3.11, basée sur Alpine (une distribution Linux légère)
FROM php:8.3.11-fpm-alpine

# On définit les variables d'environnement pour PHP
ENV PHPUSER=coda
ENV PHPGROUP=coda

# On crée un utilisateur pour PHP
RUN adduser -g ${PHPGROUP} -s /bin/sh -D ${PHPUSER}

# On remplace l'utilisateur par défaut par notre utilisateur
RUN sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf

# Créé notre dossier de code dans le conteneur
RUN mkdir -p /var/www/html/public

# On installe les extensions pdo et pdo_mysql
RUN docker-php-ext-install pdo mysqli
RUN docker-php-ext-install pdo pdo_mysql

# On copie notre fichier index.php dans le dossier de code du conteneur
COPY src/index.php /var/www/html/public/index.php
COPY src/php/ /var/www/html/public/php

# Installation de TailwindCSS et ses dépendances
RUN npm install tailwindcss
RUN npx tailwindcss init

# On expose le port 9000 pour PHP-FPM
EXPOSE 9000

# On lance PHP-FPM
CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
```

3. docker-compose.yml
```yml
services:
  db:
    image: mariadb
    container_name: mariadb_ts
    environment:
      - MYSQL_ROOT_PASSWORD=root
      - MYSQL_DATABASE=Cadeaux
      - MYSQL_USER=patrick
      - MYSQL_PASSWORD=@ZeRtY123
    networks:
      - mariadb-php
      - mariadb-phpmyadmin
    
  nginx:
    build: 
      context: .
      dockerfile: nginx.Dockerfile
    ports:
      - "80:80"
    networks:
      - nginx-php
    depends_on:
      - php  # Nginx dépend de PHP

  php:
    build: 
      context: .
      dockerfile: php.Dockerfile
    ports:
      - "9000:9000"
    networks:
      - nginx-php
      - mariadb-php
    depends_on:
      - db  # PHP dépend de la base de données

  phpmyadmin:
    image: phpmyadmin:apache
    container_name: phpmyadmin
    ports:
      - "8080:80"
    networks:
      - mariadb-phpmyadmin
    depends_on:
      - db

networks:
  mariadb-php:
    driver: bridge
  mariadb-phpmyadmin:
    driver: bridge
  nginx-php:
    driver: bridge
```

Maintenant il nous faut faire la partie `src` 

```
Racine_du_projet/
  ├── default/
  │   └── default.conf
  │
  ├── docker-compose.yml  
  ├── package.json  
  ├── tailwing.config.js    
  ├── php.Dockerfile         
  │── nginx.Dockerfile  
  │     
  └── src/
      │── css/                # Dossier des fichiers CSS
      │   └── style.css       # Fichier de base CSS avec la configuration de tailwindCSS
      │── js/                # Dossier des fichiers JS
      │   └── ...
      │── php/                # Dossier des fichiers php
      │   └── ...
      └── index.php           # l'index soit page d'accueil de l'App 
```

1. style.css
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Bonus pour avoir la balise Main qui prend par default 
toute la place afin d'avoir le footer en base de page */
html,body {height: 100%;}
body {display: flex;flex-direction: column;}
main {flex-grow: 1;}
```

### Structure du projet

### Lancement du serveur de développement

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