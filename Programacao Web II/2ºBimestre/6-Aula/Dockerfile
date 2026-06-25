FROM php:8.2-apache


RUN a2enmod headers
RUN echo 'Header set Cache-Control "no-cache, no-store, must-revalidate"' >> /etc/apache2/conf-enabled/charset.conf