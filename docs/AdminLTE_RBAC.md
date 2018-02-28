# AdminLTE+RBAC

## 数据库准备
### 创建user表
`yii merge/create `
### 创建rbac相关表
```sql
create table `auth_rule` (
`name` varchar(64) not null,
`data` text, `created_at` integer,
`updated_at` integer, primary key (`name`) 
) engine InnoDB  DEFAULT CHARSET=utf8;

create table `auth_item` (
 `name` varchar(64) not null,
 `type` integer not null,
 `description` text,
 `rule_name` varchar(64),
 `data` text,
 `created_at` integer,
 `updated_at` integer,
 primary key (`name`),
 foreign key (`rule_name`) references `auth_rule` (`name`) on delete set null on update cascade,
 key `type` (`type`) 
 ) engine InnoDB  DEFAULT CHARSET=utf8;

create table `auth_item_child` (
`parent` varchar(64) not null,
`child` varchar(64) not null,
primary key (`parent`, `child`),
foreign key (`parent`) references `auth_item` (`name`) on delete cascade on update cascade,
foreign key (`child`) references `auth_item` (`name`) on delete cascade on update cascade 
) engine InnoDB  DEFAULT CHARSET=utf8;

create table `auth_assignment` (
`item_name` varchar(64) not null,
`user_id` varchar(64) not null,
`created_at` integer,
primary key (`item_name`, `user_id`),
foreign key (`item_name`) references `auth_item` (`name`) on delete cascade on update cascade 
) engine InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE `menu` (  
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
