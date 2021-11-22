
server {
    listen      80 default_server;
    listen [::]:80 default_server;

    server_name www.laravel.com;
    if ($host = www.laravel.com) {
        return 301 https://$host$request_uri;
    }
}

server {
    listen 443 ssl;
    server_name www.laravel.com;
    index index.php index.html index.htm;
    access_log /var/log/nginx/www.laravel.com.access.log;
    error_log  /var/log/nginx/www.laravel.com.error.log;

    # setting
    include /home/config/nginx/server-v1.conf;

    # SSL by Certbot letsencrypt
    include /home/config/nginx/ssl.conf;

    # cache (??)
    location ~* \.(?:ico|cur)\$ {
        expires 1d;
        access_log off;
        add_header Cache-Control "public";
    }

    # 
    # laravel
    #
    root /var/www/www.laravel.com/public;
    try_files $uri $uri/ /index.php;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
        include /home/config/nginx/php74.conf;
        include /home/config/nginx/site-201903a.conf;
    }

    location /html {
        alias /var/www/html;
        index index.html index.php index.htm;
        include /home/config/nginx/php74.conf;
        include /home/config/nginx/site-201903a.conf;
    }

    #
    # phpmyadmin
    #
    location /your-phpmyadmin-url {
        alias /var/www/phpmyadmin;
        include /home/config/nginx/php72.conf;
        include /home/config/nginx/site-201903a.conf;
    }

}

