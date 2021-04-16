<?php
// Alexander Fulleringer 40005290
//Takes all Regions and sets their alert to level 1, then read out the AlertHistory
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
$host = "127.0.0.1:3307";
$database = "kfc353_4";
$username = "kfc353_4";
$password = "Al3xB3st";

// create connection

$mysqli = MysqlConnection::getInstance()->getMysqli();
echo $mysqli->host_info . "\n";

// $regions = $mysqli->query("SELECT DISTINCT region FROM CityRegion");
$result = $mysqli->query("SELECT DISTINCT region FROM CityRegion");
for ($i = 0; $i < $result->num_rows; $i++) {
  $result->data_seek($i);
  $row = $result->fetch_assoc();
  $region = $row['region'];
  $mysqli->query("INSERT INTO AlertHistory (level, alertDateTime, region) VALUES (1, now(), " . $region ." );");

}


$result = $mysqli->query("SELECT * FROM AlertHistory");
for ($i = 0; $i < $result->num_rows; $i++) {
  $result->data_seek($i);
  $row = $result->fetch_assoc();
  echo "<br>";
  echo " level = " . $row['level'] . "\n";
  echo " alertDateTime = " . $row['alertDateTime'] . "\n";
  echo " region = " . $row['region'] . "\n";

}