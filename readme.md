1 . Clone https://github.com/wifang/apria.git

2. Edit .env for alaravel 
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=alaravel
DB_USERNAME=root
DB_PASSWORD=root

3 - Clone Laradock inside your alaravel project:

git clone https://github.com/Laradock/laradock.git


4 - Enter the laradock folder and rename env-example to .env.

cp env-example .env

5 - Run your containers:

docker-compose up -d nginx mysql redis 

6 - Open your project’s .env file and set the following:

DB_HOST=mysql

7. make change to .env file

MYSQL_VERSION=8.0
MYSQL_DATABASE=alaravel
MYSQL_USER=root
MYSQL_PASSWORD=root


8. create database name alaravel in MySQL

9. Run php artisian migrate

10 - Open your browser and visit localhost: http://192.168.99.100.

