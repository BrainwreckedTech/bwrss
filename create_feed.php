<?php

/* EXPECTED PARAMETERS
$argv[1] = short name of the feed to create
$argv[2] = title of the feed to create
$argv[3] = description of the feed to create */

require 'settings.php';

if ( defined('STDIN') && $createmode == 'cli' ) {

  $opt = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $mysql_char", ); 
  $pdo = new PDO("mysql:host=$mysql_host;dbname=$mysql_dtbs", "$mysql_user_insert", "$mysql_pass_insert", $opt);
  $ins = $pdo->prepare("INSERT INTO $mysql_dtbs.feed (`name`,`title`,`desc`) VALUES (?,?,?);");
  $ins->execute(array($argv[1],$argv[2],$argv[3])) or die(print_r($db->errorInfo(), true));

} else {

  echo "Not implemented yet.\n";

}

?>
