# AdminLTE+RBAC

## 数据库准备
### 创建user表
`./yii migrate/to m130524_201442_init`
### 创建rbac相关表
执行.sql 文件：vendor/yiisoft/yii2/rbac/migrations/schema-mysql.sql

### 创建菜单表
```sql
CREATE TABLE `admin_menu` (  
 `id` int(11) NOT NULL AUTO_INCREMENT,  
 `name` varchar(128) NOT NULL,  
 `parent` int(11) DEFAULT NULL,  
 `route` varchar(256) DEFAULT NULL,  
 `order` int(11) DEFAULT NULL,  
 `data` text,  
 PRIMARY KEY (`id`),  
 KEY `parent` (`parent`),  
 CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

## 配置目录
TODO
