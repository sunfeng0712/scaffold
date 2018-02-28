# scaffold
Yii2脚手架

## Applications
### app
APP 数据接口层，提供统一RESTful 调用
### admin
网站管理后台项目，提供AdminLTE模版，及RBAC权限控制
### pc/h5
PC/H5端
### console
CLI端

## Installation
> 从GitHub下载源码

	git clone https://github.com/yiiplus/scaffold.git
	
> 下载依赖包

	composer install
> 配置Nginx

	server {
	    charset utf-8;
	    client_max_body_size 128M;
	
	    listen 80; ## listen for ipv4
	    #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
	
	    server_name application.mysite.local;
	    root        /path/to/scaffold/ApplicationName/web;
	    index       index.php;
	
	    access_log  /path/to/basic/log/access.log;
	    error_log   /path/to/basic/log/error.log;
	
	    location / {
	        # Redirect everything that isn't a real file to index.php
	        try_files $uri $uri/ /index.php$is_args$args;
	    }
	
	    # uncomment to avoid processing of calls to non-existing static files by Yii
	    #location ~ \.(js|css|png|jpg|gif|swf|ico|pdf|mov|fla|zip|rar)$ {
	    #    try_files $uri =404;
	    #}
	    #error_page 404 /404.html;
	
	    location ~ \.php$ {
	        include fastcgi_params;
	        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
	        fastcgi_pass 127.0.0.1:9000;
	        #fastcgi_pass unix:/var/run/php5-fpm.sock;
	        try_files $uri =404;
	    }
	
	    location ~* /\. {
	        deny all;
	    }
	}


