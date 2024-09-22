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