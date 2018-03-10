# scaffold

## 介绍
scaffold是一个基于Yii2高级模版工程化实现的脚手架。

更多文档指南：[docs/](https://github.com/yiiplus/scaffold/tree/master/docs)

## 应用主体
### app
APP 数据接口层，提供统一的RESTful API，访问REST开发指南：[docs/RESTfulAPI.md](https://github.com/yiiplus/scaffold/blob/master/docs/RESTfulAPI.md)，了解更多
### admin
网站管理后台项目，提供AdminLTE模版，及RBAC权限控制，关于相关配置访问：[docs/AdminLTE_RBAC.md](https://github.com/yiiplus/scaffold/blob/master/docs/AdminLTE_RBAC.md)
### pc
PC端
### h5
H5端
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

配置LNMP环境，导入[Nginx配置](https://raw.githubusercontent.com/yiiplus/scaffold/master/confs/nginx_confs/scaffold.local.conf)

## 前端工程化
关于yii2与FIS3工程化结合，请访问：[docs/FIS3ENGINEER.md](https://github.com/yiiplus/scaffold/blob/master/docs/FIS3ENGINEER.md)

## #FIXME 错误日志聚合平台

程序运行的日志是一个必不可少的东西，传统程序日志文件过于分散、内容过于繁杂，很可能在程序刚开始运行起来的时候，我们会检查一下情况，看看日志是否正常。但是更多的时候我们根本不会想去看那些冗长的日志。过了一段时间，突然有人告诉我们问题出现了，便又怀着沉重的心情慌张地检查日志开始排查错误。

Sentry将日志汇集、聚合、主动报警还拥有漂亮的界面，真正提高了日志利用的效率。

我们可以使用[Docker搭建私有Sentry服务](https://juejin.im/post/5a992115f265da239f06d0d7)，使用方面[mito](mito.hu)开源的[yii2-sentry](https://github.com/hellowearemito/yii2-sentry)组件提供了YiiLogTarget方案。

## 容器化