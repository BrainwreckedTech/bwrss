<?php

require 'settings.php';

$atz = date('T'); 
$fdn = $_GET['f'];
$opt = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $mysql_char", ); 
$pdo = new PDO("mysql:host=$mysql_host;dbname=$mysql_dtbs", "$mysql_user_query", "$mysql_pass_query", $opt);
$efn = $pdo->quote($fdn);

$statement = $pdo->query("SELECT `title`,`desc` FROM feed WHERE name=$efn;");
$feedinfo = $statement->fetch(PDO::FETCH_ASSOC);

$statement = $pdo->query("SELECT DATE_FORMAT(`timestamp`,'%a, %d %b %Y %T') AS rfc822time,`title`,`author`,`text` FROM item WHERE name=$efn ORDER BY `timestamp` DESC;");
$feeditem = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-type: application/rss+xml');
?>
<?xml version="1.0" encoding="utf-8"?>
<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
<?php
$mylink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$mylogo = dirname($mylink) . "/$fdn.png";
?>
  <channel>
    <atom:link href="<?= $mylink ?>" rel="self" type="application/rss+xml" />
    <title><?= $feedinfo[title] ?></title>
    <link><?= $mylink ?></link>
    <description><?= $feedinfo[desc] ?></description>
    <image>
      <url><?= $mylogo ?></url>
      <title><?= $feedinfo[title] ?></title>
      <link><?= $mylink ?></link>
    </image>
    <lastBuildDate><?= $feeditem[0][rfc822time] . ' ' . $atz ?></lastBuildDate>
<?php foreach ($feeditem as $item) { ?>
    <item>
      <guid isPermaLink="false"><?= $item[rfc822time] . ' ' . $atz ?></guid>
      <title><?= $item[title] ?></title>
      <dc:creator xmlns:dc="http://purl.org/dc/elements/1.1/"><?= $item[author] ?></dc:creator>
      <pubDate><?= $item[rfc822time] . ' ' . $atz ?></pubDate>
      <description><?= $item[text] ?></description>
    </item>
<?php } ?>
  </channel>
</rss>
