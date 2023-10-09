#!/bin/bash

sed -i '/# Global configuration/,/^$/s/^$/ServerName 127.0.0.1/' /etc/apache2/apache2.conf
sed -i 's/;extension=curl/extension=curl/' /etc/php/7.4/apache2/php.ini
sed -i 's/;extension=pdo_pgsql/extension=pdo_pgsql/' /etc/php/7.4/apache2/php.ini
sed -i 's/local   all             all                                     peer/local   all             all                                     md5/' /etc/postgresql/13/main/pg_hba.conf
sed -i 's/local   all             postgres                                peer/local   all             postgres                                trust/' /etc/postgresql/13/main/pg_hba.conf

rm /var/www/html/index.html

service apache2 start

service postgresql start

su - postgres <<EOF
psql -c "ALTER USER postgres password 'postgres';"
psql -U postgres -f /var/www/html/sql/database.sql
EOF
exit

sed -i 's/local   all             postgres                                trust/local   all             postgres                                md5/' /etc/postgresql/13/main/pg_hba.conf

service postgresql restart
