# nginx.Dockerfile
FROM nginx:stable-alpine

# Configurer Nginx
COPY conf/default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80