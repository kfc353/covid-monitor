<div id="setAlertDiv" style="display: none;">

<?php
// Alexander Fulleringer 40005290
// create connection
$mysqli = MysqlConnection::getInstance()->getMysqli();

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

?>
</div>
