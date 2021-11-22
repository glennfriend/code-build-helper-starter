# docker

## feature
- php
- mysql
- redis
- phpmyadmin

## install
- docker-compose up

## web site
- http://127.0.0.1:8000/
- http://127.0.0.1:8081/

## other
- docker-compose -f docker-compose-local.yml up
- docker-compose ps

## vi .env
```
# cover laravel origin database setting
DB_HOST=172.23.0.1
DB_PORT=8800
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=root

# for docker
REDIS_HOST=redis
PHP_MYADMIN_PORT=8081
```

## problem and resolve

### login phpmyadmin fail
```
docker-compose exec 'db' mysql -uroot -proot
```

```sql
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
FLUSH PRIVILEGES;

select host,user,plugin,authentication_string from mysql.user;
```

### laravel-starter "2020_06_23_065529_create_permission_tables" migration error
- skip it
```sql
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (NULL, '2020_06_23_065529_create_permission_tables', '1');
```
