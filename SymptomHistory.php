<?php
// Alexander Fulleringer 40005290
// Takes a medicare number and outputs their symptom history
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
$host = "127.0.0.1:3307";
$database = "kfc353_4";
$username = "kfc353_4";
$password = "Al3xB3st";

// create connection

$mysqli = new mysqli($host, $username, $password, $database);
echo $mysqli->host_info . "\n";

$medicareNumber = $_POST['medicareNum'];

$query = "SELECT personMedicareNum,date,unspecifiedSymptom,nausea,cough,fever,difficultyBreathing,smellLoss,stomachAches,vomit,headache,musclePain,diarrhea,soreThroat FROM SymptomHistory WHERE personMedicareNum = '$medicareNumber';";
$result = $mysqli-> query($query);


if ($result->num_rows == 0){
    exit("No Symptom History associated with this medicare number.");
}
// Printing out the column headers
echo "<table><tr>";
for($i = 0; $i < mysqli_num_fields($result); $i++) {
    $columnName= mysqli_fetch_field($result);
    echo "<th>{$columnName->name}</th>";
}
// Print the data rows
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $data) {
        echo "<td>{$data}</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>

