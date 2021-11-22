# docker mysql

## feature
- mysql 8

## 檢查 port 的占用情況
- docker ps
- netstat -antp | grep LISTEN

## port 使用策略 ?
```
mysql 5.7 -> port 3306 -> 33057
mysql 8.0 -> port 3306 -> 33080
```

## run and status
```
docker-compose up

docker-compose ps
docker exec -it mysql_8 /bin/bash
```

## 問題
- mysql data 應該放在原本 mysql 的目錄之中 ?
- 是否能吃到自己資料夾的一些檔案 ?