# scaffold

scaffold是一个基于Yii2高级模版工程化实现的脚手架。

更多文档指南：[docs/](https://github.com/yiiplus/scaffold/tree/master/docs)

## 安装
> 从GitHub下载源码

	git clone https://github.com/yiiplus/scaffold.git

> 下载依赖包

	composer global require "fxp/composer-asset-plugin:^1.3.1"
	composer install

> 选择数据库后，可以先创建用户表

	./yii migrate/to m130524_201442_init

> 初始化

	php init
或执行`php init --env=Development  --overwrite=y`无需交互

> 配置Nginx

配置LNMP环境，导入[Nginx配置](https://raw.githubusercontent.com/yiiplus/scaffold/master/confs/nginx_confs/scaffold.local.conf)

##目录结构
```$xslt
common
    config/              包含common配置
    mail/                包含电子邮件的查看文件
    models/              包含在admin、app、h5和pc中使用的模型类
    tests/               包含常见类的测试   
console
    config/              包含console配置
    controllers/         包含console controllers (commands)
    migrations/          包含数据库迁移
    models/              包含特定于console的模型类
    runtime/             包含运行时生成的文件
app
    assets/              包含应用程序资源，如JavaScript和CSS
    config/              包含app配置
    modules/             包含app模块
        v1/              包含app的v1版本模块
    runtime/             包含运行时生成的文件
    tests/               包含app应用程序的测试
    web/                 包含app入口脚本和资源
admin
    assets/              包含应用程序资源，如JavaScript和CSS
    config/              包含admin配置
    controllers/         包含admin controllers (commands)
    models/              包含特定于admin的模型类
    runtime/             包含运行时生成的文件
    tests/               包含test应用程序的测试
    views/               包含admin应用程序的视图文件
    web/                 包含admin入口脚本和资源
h5
    assets/              包含应用程序资源，如JavaScript和CSS
    config/              包含h5配置
    controllers/         包含h5 controllers (commands)
    fis3/                包含h5Fis3前端模块
    models/              包含特定于h5的模型类
    runtime/             包含运行时生成的文件
    tests/               包含test应用程序的测试
    views/               包含h5应用程序的视图文件
    web/                 包含h5入口脚本和资源
pc
    assets/              包含应用程序资源，如JavaScript和CSS
    config/              包含pc配置
    controllers/         包含pc controllers (commands)
    fis3/                包含pcFis3前端模块
    models/              包含特定于pc的模型类
    runtime/             包含运行时生成的文件
    tests/               包含test应用程序的测试
    views/               包含pc应用程序的视图文件
    web/                 包含pc入口脚本和资源
vendor/                  包含相关的第三方软件包
environments/            包含基于环境的覆盖
DevOps
    v1/                  包含传统架构下使用Jenkins实现的CI\CD
    v2/                  包含云原生架构下，Jenkins配合Kubernetes实现在容器云下的CI\CD
```

## 前端工程化
关于yii2与FIS3工程化结合，请访问：[docs/FIS3ENGINEER.md](https://github.com/yiiplus/scaffold/blob/master/docs/FIS3ENGINEER.md)

## 错误日志聚合平台

程序运行的日志是一个必不可少的东西，传统程序日志文件过于分散、内容过于繁杂，很可能在程序刚开始运行起来的时候，我们会检查一下情况，看看日志是否正常。但是更多的时候我们根本不会想去看那些冗长的日志。过了一段时间，突然有人告诉我们问题出现了，便又怀着沉重的心情慌张地检查日志开始排查错误。

Sentry将日志汇集、聚合、主动报警还拥有漂亮的界面，真正提高了日志利用的效率。

我们可以使用[Docker搭建私有Sentry服务](https://juejin.im/post/5a992115f265da239f06d0d7)，使用方面[mito](mito.hu)开源的[yii2-sentry](https://github.com/hellowearemito/yii2-sentry)组件提供了YiiLogTarget方案。

## DevOps
### #TODO v1
传统架构下使用Jenkins实现的CI\CD
### #FIXME v2
云原生架构下，Jenkins配合Kubernetes实现在容器云下的CI\CD