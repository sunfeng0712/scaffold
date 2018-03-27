/**
 * Database schema required by scaffold.
 */


/************ RBAC ***************/
drop table if exists `auth_assignment`;
drop table if exists `auth_item_child`;
drop table if exists `auth_item`;
drop table if exists `auth_rule`;


/* 表注释 */
CREATE TABLE `auth_rule`
(
   `name`                 varchar(64) not null,
   `data`                 blob,
   `created_at`           integer,
   `updated_at`           integer,
    primary key (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* 表注释 */
CREATE TABLE `auth_item`
(
   `name`                 varchar(64) not null,
   `type`                 smallint not null,
   `description`          text,
   `rule_name`            varchar(64),
   `data`                 blob,
   `created_at`           integer,
   `updated_at`           integer,
   primary key (`name`),
   foreign key (`rule_name`) references `auth_rule` (`name`) on delete set null on update cascade,
   key `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* 表注释 */
CREATE TABLE `auth_item_child`
(
   `parent`               varchar(64) not null,
   `child`                varchar(64) not null,
   primary key (`parent`, `child`),
   foreign key (`parent`) references `auth_item` (`name`) on delete cascade on update cascade,
   foreign key (`child`) references `auth_item` (`name`) on delete cascade on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* 表注释 */
CREATE TABLE `auth_assignment`
(
   `item_name`            varchar(64) not null,
   `user_id`              varchar(64) not null,
   `created_at`           integer,
   primary key (`item_name`, `user_id`),
   foreign key (`item_name`) references `auth_item` (`name`) on delete cascade on update cascade,
   key `auth_assignment_user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/************ AdminLTE ***************/
drop table if exists `admin_user`;
drop table if exists `admin_menu`;

/* 表注释 */
CREATE TABLE `admin_user` (
  `id`                   int(11) NOT NULL AUTO_INCREMENT,
  `username`             varchar(255) NOT NULL,
  `auth_key`             varchar(32) NOT NULL,
  `password_hash`        varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email`                varchar(255) NOT NULL,
  `status`               smallint(6) NOT NULL DEFAULT '10',
  `created_at`           int(11) NOT NULL,
  `updated_at`           int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* 表注释 */
CREATE TABLE `admin_menu` (
 `id`                    int(11) NOT NULL AUTO_INCREMENT,
 `name`                  varchar(128) NOT NULL,
 `parent`                int(11) DEFAULT NULL,
 `route`                 varchar(256) DEFAULT NULL,
 `order`                 int(11) DEFAULT NULL,
 `data`                  text,
 PRIMARY KEY (`id`),
 KEY `parent` (`parent`),
 CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

