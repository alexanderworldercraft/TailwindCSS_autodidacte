# Docker avec TailwindCSS

![Docker](../asset/img/Docker_logo.webp)

*Image illustrant Docker.*

## Sommaire :

- [**📦 Initialisation d'un projet PHP/nodeJS avec TailwindCSS pour Docker**](#)
  - [Prérequis](#prérequis)
  - [Création du projet](#création-du-projet)
  - [Lancement du serveur de développement](#lancement-du-serveur-de-développement)
  - [mettre à jour le fichier CSS de TailwindCSS](#mettre-à-jour-le-fichier-css-de-tailwindcss)

- [**🏁 Conclusion**](#conclusion)

## Prérequis

- **Installer** [`nodeJS`](https://nodejs.org/fr/download/package-manager) (version 18+ ou 20+) sur sont ordinateur.

- **Installer** [`Docker`](https://www.docker.com/) sur sont ordinateur.

- **Installer** [`Docker desktop`](https://www.docker.com/products/docker-desktop/) sur sont ordinateur. *(bonus non obligatoire)*

- Avoir un terminal.

- avoir un dossier de travail :p

## Création du projet

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
    server_name localhost;

    root /var/www/html/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
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

### **1. nginx.Dockerfile**
```Dockerfile
# nginx.Dockerfile
FROM nginx:stable-alpine

# Configurer Nginx
COPY conf/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
```

### **2. php.Dockerfile**
```Dockerfile
# php.Dockerfile
FROM php:8.3.11-fpm-alpine

# Installer Node.js et npm
RUN apk add --no-cache nodejs npm

# Copier les fichiers source pour Tailwind et PHP
COPY src/ /var/www/html/src/
COPY public/ /var/www/html/public/

# Copier le package.json et installer les dépendances
COPY package.json /var/www/html/package.json
WORKDIR /var/www/html
RUN npm install

# Compiler TailwindCSS
RUN npm run build:css

# Exposer le port pour PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
```

### **3. docker-compose.yml**
```yml
services:
  db:
    image: mariadb
    container_name: mariadb_ts
    environment:
      - MYSQL_ROOT_PASSWORD=root
      - MYSQL_DATABASE=php_nodeJS_ts
      - MYSQL_USER=alex
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
      - php
    volumes:
      - ./public:/var/www/html/public

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
      - db
    volumes:
      - ./public:/var/www/html/public

  phpmyadmin:
    image: phpmyadmin:apache
    container_name: phpmyadmin_php_nodeJS
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

Maintenant il nous faut faire la partie `public` 

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
  └── public/
      │── css/                # Dossier des fichiers CSS
      │   └── style.css       # Fichier de base CSS avec la configuration de tailwindCSS
      │── js/                # Dossier des fichiers JS
      │   └── ...
      │── php/                # Dossier des fichiers php
      │   └── ...
      └── index.php           # l'index soit page d'accueil de l'App 
```

### **4. style.css**
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

## Lancement du serveur de développement

```bash
docker compose up --build
```

## mettre à jour le fichier CSS de TailwindCSS

```bash
npm run build:css
```

# Conclusion

L'utilisation de Docker complique la tâche, mais cela apporte une plus-value non négligeable à un projet web.

---

# [**🔙 Retour**](/README.md)