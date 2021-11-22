# server data
- 通常作為第一次建置的 server config

## nginx
```
sudo mkdir -p            /home/config/nginx/
sudo chown ubuntu.ubuntu /home/config/

SERVER="ubuntu@REMOTE_SERVER"
jcp nginx/* ${SERVER}:/home/config/nginx/
```

```
sudo vi /etc/nginx/sites-available/www.laravel.com

# google it to enable/disable site
sudo nginx_modsite
ls -la /etc/nginx/sites-enabled

sudo nginx -t && sudo systemctl restart nginx
```