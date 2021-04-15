<?php require_once "./dbconnect.php" ?>
<?php
echo "<div id='recommendationTable' style='display: none'>";

$result = $mysqli->query("SELECT * FROM Recommendation");
echo "<table>";

// displays the latest recommendation
$result->data_seek(0);
$row = $result->fetch_assoc();
echo "<tr><td>" . $row['recommendation'] . "</td></tr>";

echo "</table>";
echo "</div>";
