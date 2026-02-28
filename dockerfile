FROM php:8.2-apache

# Copy all files to the container
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional, for clean URLs)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Expose port 80
EXPOSE 80