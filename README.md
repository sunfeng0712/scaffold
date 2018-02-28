# scaffold

## Introduction
scaffold是一个基于Yii2高级模版所实现的工程化脚手架项目。

## Applications
### app
APP 数据接口层，提供统一的RESTful API
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

> 选择数据库后，可以先创建用户表

	yii merge/create

> 初始化

	php init
或执行`php init --env=Development  --overwrite=y`无需交互

> 配置Nginx

	server {
	    charset utf-8;
	    client_max_body_size 128M;
	
	    listen 80; ## listen for ipv4
	    #listen [::]:80 default_server ipv6only=on; ## listen for ipv6
	
	    server_name ApplicationName.local;
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

