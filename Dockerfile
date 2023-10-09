# Utiliser l'image Debian officielle comme base
FROM debian:bullseye-slim

# Mettre à jour le système et installer les paquets nécessaires
RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    php-curl \
    php-pgsql \
    postgresql \
    nano \
    && rm -rf /var/lib/apt/lists/*

COPY . /var/www/html/

COPY init.sh /usr/local/bin/init.sh

# Exposer le port 80 pour Apache
EXPOSE 80

RUN chmod +x /usr/local/bin/init.sh

# Commande de démarrage pour exécuter Apache en mode démon
#CMD ["/usr/local/bin/init.sh"]
