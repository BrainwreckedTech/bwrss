<?php

/* EXPECTED PARAMETERS
$argv[1] = feed short name
$argv[2] = article title
$argv[3] = artitle author
$argv[4] = article text
$argv[5] = article date -- must be YYYY-MM-DD HH:MM:SS or NULL */

require 'settings.php';
$argv[5] = ( $argv[5] == 'NULL' ? null : $argv[5]);

if ( defined('STDIN') && $createmode == 'cli' ) {

  $opt = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $mysql_char", ); 
  $pdo = new PDO("mysql:host=$mysql_host;dbname=$mysql_dtbs", "$mysql_user_insert", "$mysql_pass_insert", $opt);
  $ins = $pdo->prepare("INSERT INTO $mysql_dtbs.item (`name`,`title`,`author`,`text`,`timestamp`) VALUES (?,?,?,?,?);");
  $ins->execute(array($argv[1],$argv[2],$argv[3],$argv[4],$argv[5])) or die(print_r($db->errorInfo(), true));

} else {

  echo "Not implemented yet.\n";

}

?>
