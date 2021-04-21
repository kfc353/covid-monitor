<div id="createTablesDiv" style="display: none;">
<?php

$mysqli = MysqlConnection::getInstance()->getMysqli();

// create connection


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
?>
</div>
