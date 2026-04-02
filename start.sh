#!/bin/bash
a2dismod mpm_event
a2enmod mpm_prefork
sed -i "s/Listen 80/Listen ${PORT:-8080}/g" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT:-8080}/g" /etc/apache2/sites-available/000-default.conf
service apache2 restart
apache2-foreground