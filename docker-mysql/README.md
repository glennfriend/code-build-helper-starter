# docker mysql

## feature
- mysql 8

## 檢查 port 的占用情況
- docker ps
- netstat -antp | grep LISTEN

## first time
```
docker build -t mysql_8 . --no-cache
docker-compose up
```

## rebuild container
docker images
docker-compose rm db
docker rmi mysql_8 111111111111 222222222222

## first time and execute Dockerfile
```
docker build -t mysql:8 .
docker-compose up
```

## run and status
```
docker-compose up

docker-compose ps
docker exec -it mysql_8 /bin/bash
```

## about volumes
```
volumes 是用連結的方式, 讓 system and docker container 達到溝通與內容一致
但是當兩邊的環境不同, 可能會有 permission 的問題 (root, ubuntu, www-data ...)
你可以用 Dockerfile 將外面的檔案 copy 進去, 來解決
```

## 常用的 volumes 速記
```
    - ./storage/db/data:/var/lib/mysql
    - ./storage/db/mysql-docker.cnf:/etc/mysql/conf.d/mysql-docker.cnf:rw
    - ./docker-config/apache2/sites-available/000-default.conf:/etc/apache2/sites-available/000-default.conf
    - ./docker-config/apache2/sites-enabled/000-default.conf:/etc/apache2/sites-enabled/000-default.conf
    - ./docker-config/apache2/apache2.conf:/etc/apache2/apache2.conf
    - ./docker-config/php/php.ini:/usr/local/etc/php/php.ini
    - /etc/localtime:/etc/localtime:ro \
    - /etc/timezone:/etc/timezone:ro \
    - ../../shared/storage:/var/www/html/storage
    - ../../shared/.env:/var/www/html/.env
```

## check command
```
docker exec -it mysql_8 mysql -uroot -proot -e "SHOW databases"
docker exec -it mysql_8 mysql -uroot -proot -e "SHOW VARIABLES WHERE Variable_name LIKE 'character\_set\_%' OR Variable_name LIKE 'collation%'"
docker exec -it mysql_8 mysql -uroot -proot -e "SELECT @@global.time_zone, @@session.time_zone"
docker exec -it mysql_8 cat /tmp/info.txt
```