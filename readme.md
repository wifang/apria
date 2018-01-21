1 - Clone Laradock inside your alaravel project:

git clone https://github.com/Laradock/laradock.git


2 - Enter the laradock folder and rename env-example to .env.

cp env-example .env

3 - Run your containers:

docker-compose up -d nginx mysql redis 

4 - Open your project’s .env file and set the following:

DB_HOST=mysql

5. make change to .env file

### MYSQL ##############################################################################################################

MYSQL_VERSION=8.0
MYSQL_DATABASE=alaravel
MYSQL_USER=root
MYSQL_PASSWORD=root
MYSQL_PORT=3306
MYSQL_ROOT_PASSWORD=root
MYSQL_ENTRYPOINT_INITDB=./mysql/docker-entrypoint-initdb.d

6 - Open your browser and visit localhost: http://192.168.99.100.

