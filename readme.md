1 . Clone https://github.com/wifang/apria.git

2 - Clone Laradock inside your alaravel project:

git clone https://github.com/Laradock/laradock.git


3 - Enter the laradock folder and rename env-example to .env.

cp env-example .env

4 - Run your containers:

docker-compose up -d nginx mysql redis 

5 - Open your project’s .env file and set the following:

DB_HOST=mysql

6. make change to .env file

MYSQL_VERSION=8.0
MYSQL_DATABASE=alaravel
MYSQL_USER=root
MYSQL_PASSWORD=root


7. create database name alaravel in MySQL

8. Run php artisian migrate

9 - Open your browser and visit localhost: http://192.168.99.100.

