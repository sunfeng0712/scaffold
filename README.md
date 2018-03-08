# scaffold

## 介绍
scaffold是一个基于Yii2高级模版工程化实现的脚手架。

更多文档指南：[docs/](https://github.com/yiiplus/scaffold/tree/master/docs)

## 应用主体
### app
APP 数据接口层，提供统一的RESTful API，访问REST开发指南：[docs/RESTfulAPI.md](https://github.com/yiiplus/scaffold/blob/master/docs/RESTfulAPI.md)，了解更多
### admin
网站管理后台项目，提供AdminLTE模版，及RBAC权限控制，关于相关配置访问：[docs/AdminLTE_RBAC.md](https://github.com/yiiplus/scaffold/blob/master/docs/AdminLTE_RBAC.md)
### pc/h5
PC/H5端，关于yii2与FIS3工程化结合，请访问：[docs/FIS3ENGINEER.md](https://github.com/yiiplus/scaffold/blob/master/docs/FIS3ENGINEER.md)
### console
CLI端

## 安装
> 从GitHub下载源码

	git clone https://github.com/yiiplus/scaffold.git

> 下载依赖包

	composer install

> 选择数据库后，可以先创建用户表

	./yii migrate/to m130524_201442_init

> 初始化

	php init
或执行`php init --env=Development  --overwrite=y`无需交互

> 配置Nginx

配置LNMP环境，导入[Nginx配置](https://github.com/yiiplus/scaffold/blob/master/confs/nginx_confs/scaffold.local.conf)。

## 日志报警
>不管你用什么编程语言，都会面临如何处理错误日志的问题。如果对错误日志放任自流，出现故障将追悔莫及。这里我们推荐使用Sentry来做日志报警。

Sentry 是一个错误记录和聚合的平台。

关于如何安装 Sentry，[官方文档](https://docs.sentry.io/server/installation/)里已经给出了详细的说明，建议大家仔细阅读。

TODO