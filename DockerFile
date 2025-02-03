# Usa la imagen PHP con Apache
FROM php:7.4-apache

# Copiar los archivos del proyecto a la carpeta de Apache
COPY . /var/www/html/

# Exponer el puerto 80 (o el puerto que Render te asigne)
EXPOSE 80

# El comando para iniciar Apache
CMD ["apache2-foreground"]
