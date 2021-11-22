## laravel supervisor

### install config file 
```
# create config link
ln -s /var/www/project_name/tools/supervisor/laravel_ubuntu_horizon.conf  /etc/supervisor/conf.d/laravel_ubuntu_horizon.conf

# enable supervisor
supervisord
sudo service supervisor restart
```

### restart every one
sudo service supervisor reload  &&  sleep 5  &&  sudo supervisorctl status all

### 定時重新 reload
sudo su -
crontab -e
```
    # 每小時01分 (每小時跑一次), about memory leaks
    01 * * * *  service supervisor reload
```