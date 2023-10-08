FROM php:apache

RUN apt-get update -y && apt-get install -y \
	postgresql-client \
	&& apt-get clean \
	&& rm -rf /var/lib/apt/lists/*

COPY . /var/www/html

RUN chmod -R 777 /var/www/html/uploads

ENV PGHOST=localhost
ENV PGPORT=5432
ENV PGUSER=postgres
ENV PGPASSWORD=postgres
ENV PGDATABASE=medical_site

COPY ./sql/database.sql /docker-entrypoint-initdb.d/

EXPOSE 80

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
