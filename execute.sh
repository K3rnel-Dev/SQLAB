#!/bin/bash

apt install mysql
apt install apache2
service mysql start
service apache2 start
cp index.php /var/www/html/ 
mysql -u root < setup.sql
clear
echo "[+] Done!, enabled apache2 server and got-test sqlInj!"
echo "[+] http://localhost"

