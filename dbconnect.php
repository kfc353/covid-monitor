<?php
// TODO: should set $host based on environment
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
$host = "127.0.0.1:3307";
$database = "kfc353_4";
$username = "kfc353_4";
$password = "Al3xB3st";

// create connection

$mysqli = new mysqli($host, $username, $password, $database);
echo $mysqli->host_info . "\n";
$result = $mysqli->query("SELECT * FROM Person");

for ($i = 0; $i < $result->num_rows; $i++) {
  $result->data_seek($i);
  $row = $result->fetch_assoc();
  echo " medicareNum = " . $row['medicareNum'] . "\n";
}