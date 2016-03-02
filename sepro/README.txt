for running 1st iteration of code

1. Requires a dbms such as mysql to be installed.
2. Unzip the folder and copy it to some directory such as   var/www/html
3. Launch terminal: service mysqld start or mysql -u USERNAME -p PASSWORD
Type in the following commands.
4. Create database portal;
5. use portal;
6. source var/www/html/potal/db.sql;
7. Now the database gets created. Please note that the above steps are needed because the database is in the localhost. Once we move it to the servers it won't be needed anymore.
8. Now open your Web browser and type the following into the address bar.
9.localhost/portal/login1.php
10. Use the 
username: 102
password : astro