#!/bin/bash
a2dismod mpm_event
a2enmod mpm_prefork
sed -i 's/Listen 80/Listen 8080/g' /etc/apache2/ports.conf
sed -i 's/:80/:8080/g' /etc/apache2/sites-available/000-default.conf
apache2-foreground