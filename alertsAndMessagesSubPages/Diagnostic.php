<?php
//Author: A Fulleringer
//Performs SQL queries associated with the Diagnostic Form.
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
$host = "127.0.0.1:3307";
$database = "kfc353_4";
$username = "kfc353_4";
$password = "Al3xB3st";

// create connection

$mysqli = MysqlConnection::getInstance()->getMysqli();



if (
    isset( $_POST['personMedicareNum'] ) and isset( $_POST['healthWorkerMedicareNum']) and isset( $_POST['facilityName']) and isset( $_POST['testDate']) 
)
{
    echo 'Form is filled!' . '<br>';
    //print_r( $_POST['symptoms']);
}
else {
    exit('Form incomplete');
}
$personMedNum = $_POST['personMedicareNum'];
$healthMedNum = $_POST['healthWorkerMedicareNum'];
$healthFacility = $_POST['facilityName'];

$testTime = $_POST['testDate'];
$testTime = str_replace("T", " ", $testTime) .":00";
$testResult = $_POST['result'];
$result = $mysqli->query("SELECT address FROM HealthFacility WHERE name = '$healthFacility'");


if ($result->num_rows == 0){
    exit("Please input a valid Health Facility Name");
}
$row = $result->fetch_assoc();

$address = $row['address'];
$result2 = $mysqli->query("SELECT * FROM Person WHERE medicareNum = '$personMedNum'");
$result3 = $mysqli->query("SELECT * FROM HealthWorker WHERE medicareNum = '$healthMedNum'");

if ($result->num_rows == 0){
    exit("Please input a valid Patient Health Care Number");
}
if ($result->num_rows == 0){
    exit("Please input a valid HealthWorker Medicare Number");
}
$theQuery = "INSERT INTO Diagnostic(patientMedicareNum, dateOfPerform, healthWorkerMedicareNum, result, healthFacilityName, HealthFacilityAddress, dateOfResult) 
VALUES ('$personMedNum', '$testTime','$healthMedNum', '$testResult', '$healthFacility', '$address', now());";
//print($theQuery . '<br>');




if ($mysqli->query($theQuery) === TRUE){
    echo "New record created successfully";
} else {
  echo "Error " . "<br>" ;
}
//echo "<br>hi ";
//echo $testResult;
if ($testResult == "positive"){
    //echo "test";
    $newQuery ="INSERT INTO Messages(messageDateTime, testResult, recommendation, personMedicareNumber) 
    VALUES (now(), 'positive', 'Please follow recommendations and fill out the followup form!', '$personMedNum');";
    //print($newQuery . '<br>');
    if ($mysqli->query($newQuery) === TRUE){
        echo "New record created successfully";
    } else {
      echo "Error " . "<br>" ;
    }
}

?>