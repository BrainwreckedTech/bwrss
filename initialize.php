<?php

require 'settings.php';

$crt_dtbs="CREATE DATABASE $mysql_dtbs;";

$crt_tbfd="CREATE TABLE `$mysql_dtbs`.`feed` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";

$crt_tbit="CREATE TABLE `$mysql_dtbs`.`item` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` tinytext NOT NULL,
  `title` tinytext NOT NULL,
  `author` tinytext NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

$crt_usr_qry="CREATE USER '$mysql_user_query'@'$mysql_host' IDENTIFIED BY '$mysql_pass_query';";

$crt_usr_ins="CREATE USER '$mysql_user_insert'@'$mysql_host' IDENTIFIED BY '$mysql_pass_insert';";

$grt_usr_qry="GRANT SELECT ON `$mysql_dtbs`.* TO '$mysql_user_query'@'$mysql_host';";

$grt_usr_ins="GRANT INSERT ON `$mysql_dtbs`.* TO '$mysql_user_insert'@'$mysql_host';";

$shw_dbs="SHOW DATABASES;";

$shw_tbl="SHOW TABLES FROM `$mysql_dtbs`;";

$shw_usr="SELECT user,host,password FROM mysql.user;";

echo "$crt_dtbs\n$crt_tbfd\n$crt_tbit\n$crt_usr_qry\n$crt_usr_ins\n$grt_usr_qry\n$grt_usr_ins\n$shw_dbs\n$shw_tbl\n$shw_usr\n"

?>
