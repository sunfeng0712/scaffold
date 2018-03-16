/**
 * Database schema required by \yii\rbac\DbManager.
 *
 * @author Xiankun Geng <ge2x3k2@gmail.com>
 */

drop table if exists `menu`;

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