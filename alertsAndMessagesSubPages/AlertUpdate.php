<?php
// // Alexander Fulleringer 40005290
// //TODO
// //INcreases/decreases the alert of a region
// // had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
// $host = "127.0.0.1:3307";
// $database = "kfc353_4";
// $username = "kfc353_4";
// $password = "Al3xB3st";

// // create connection

// $mysqli = new mysqli($host, $username, $password, $database);
// //$result = $mysqli->query("SELECT * FROM AlertHistory");

// $region = 'Northshore';
// $delta = 1;

// $result = $mysqli->query("SELECT * FROM AlertHistory WHERE (region = " . $region . ");");

// //$result = $mysqli->query("SELECT * FROM AlertHistory");

// for ($i = 0; $i < $result->num_rows; $i++) {
//   $result->data_seek($i);
//   $row = $result->fetch_assoc();
//   echo "<br>";
//   echo " ID = " . $row['id'] . "\n";
//   echo " level = " . $row['level'] . "\n";
//   echo " alertDateTime = " . $row['alertDateTime'] . "\n";
//   echo " region = " . $row['region'] . "\n";

// }