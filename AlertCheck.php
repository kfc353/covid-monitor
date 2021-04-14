<?php
// Alexander Fulleringer 40005290
// Prints out complete Alert History.
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
$host = "127.0.0.1:3307";
$database = "kfc353_4";
$username = "kfc353_4";
$password = "Al3xB3st";

// create connection

$mysqli = new mysqli($host, $username, $password, $database);
echo $mysqli->host_info . "\n";

$result = $mysqli->query("SELECT * FROM AlertHistory");
for ($i = 0; $i < $result->num_rows; $i++) {
  $result->data_seek($i);
  $row = $result->fetch_assoc();
  echo "<br>";
  echo " ID = " . $row['id'] . "\n";
  echo " level = " . $row['level'] . "\n";
  echo " alertDateTime = " . $row['alertDateTime'] . "\n";
  echo " region = " . $row['region'] . "\n";

}