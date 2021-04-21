<?php
//Author: A Fulleringer
//Performs SQL query associated with the Symptom Update Form.
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
$host = "127.0.0.1:3307";
$database = "kfc353_4";
$username = "kfc353_4";
$password = "Al3xB3st";

// create connection

$mysqli = new mysqli($host, $username, $password, $database);



$medicareNum = $_POST['medicareNum'];
$temperature = $_POST['temperature'];
$dob = $_POST['birthday'];

$bdayQuery = $mysqli->query("SELECT dateOfBirth FROM Person WHERE medicareNum = '$medicareNum';");

if ($bdayQuery->num_rows == 0){
    exit("Please input a valid medicare number");
}
else {
    echo "Login successful! <br> <br>";
}

$row = $bdayQuery->fetch_assoc();
$actualBday = $row['dateOfBirth'];

if ($actualBday != $dob){
    exit('The birthday you have entered is invalid.');
}
else {
    echo "Login successful! <br> <br>";
}
$fever = 0;
$cough = 0;
$diffBreath = 0;
$smellLoss = 0;
$nausea = 0;
$stomachAches = 0;
$vomit = 0;
$headache = 0;
$musclePain = 0;
$diarrhea = 0;
$soreThroat = 0;
$other = '';

echo 'Symptoms include: '.'<br>';

if (isset($array['fever'])){
    $fever = 1;
echo 'fever' . '<br>';
}
if (isset($array['cough'])){
    $cough = 1;
echo 'cough' . '<br>';
}
if (isset($array['diffBreathing'])){
    $diffBreathing = 1;
echo 'diffBreathing' . '<br>';
}if (isset($array['smellLoss'])){
    $smellLoss = 1;
echo 'smellLoss' . '<br>';
}

if (isset($array['vomit'])){
    $vomit = 1;
echo 'vomit' . '<br>';
}if (isset($array['headache'])){
    $headache = 1;
echo 'headache' . '<br>';
}
if (isset($array['musclePain'])){
    $musclePain = 1;
echo 'musclePain' . '<br>';
}
if (isset($array['diarrhea'])){
    $diarrhea = 1;
echo 'diarrhea' . '<br>';
}
if (isset($array['soreThroat'])){
    $soreThroat = 1;
echo 'soreThroat' . '<br>';
}
if (isset($array['other'])){
    $other = $_POST['other'];
echo $other . '<br>';
}
if (isset($array['nausea'])){
    $nausea = 1;
echo 'nausea' . '<br>';
}
if (isset($array['stomachAches'])){
    $stomachAches = 1;
echo 'stomach Ache' . '<br>';
}
$other = $_POST['other'];


$theQuery = "INSERT INTO SymptomHistory(personMedicareNum, date, unspecifiedSymptom,nausea,cough,fever,difficultyBreathing,smellLoss,stomachAches,vomit,headache,musclePain,diarrhea,soreThroat, temperature)
VALUES ('$medicareNum', now(),'$other', $nausea, $cough, $fever, $diffBreath, $smellLoss, $stomachAches,$vomit,$headache,$musclePain, $diarrhea, $soreThroat, $temperature);";
//print($theQuery . '<br>');
//$theQuery = "INSERT INTO SymptomHistory(personMedicareNum, date, unspecifiedSymptom,nausea,cough,fever,difficultyBreathing,smellLoss,stomachAches,vomit,headache,musclePain,diarrhea,soreThroat)
//VALUES ('ALIA50011102', now(), 'other', 0,1,1,0,0,0,0,1,0,0,0);";

if ($mysqli->query($theQuery) === TRUE){
    echo "New record created successfully";
} else {
  echo "Error inserting record." . "<br>" ;
}

?>