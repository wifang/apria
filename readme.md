1 - Clone Laradock inside your alaravel project:

git clone https://github.com/Laradock/laradock.git
2 - Enter the laradock folder and rename env-example to .env.

cp env-example .env
3 - Run your containers:

docker-compose up -d nginx mysql redis 
4 - Open your project’s .env file and set the following:

DB_HOST=mysql
REDIS_HOST=redis
QUEUE_HOST=beanstalkd
5 - Open your browser and visit localhost: http://192.168.99.100.

