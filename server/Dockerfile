FROM php:8.1-apache
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd
RUN addgroup --system serverapp && adduser --system --ingroup serverapp serverapp
USER serverapp
WORKDIR /var/www/html
COPY --chown=serverapp:serverapp . .
EXPOSE 80
CMD ["apache2-foreground"]