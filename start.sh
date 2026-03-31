#!/bin/bash
a2dismod mpm_event
a2enmod mpm_prefork
service apache2 restart
apache2-foreground