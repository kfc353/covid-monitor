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

$medicareNum = $_POST['medicareNum'];
$fever = $_POST['fever'];
$cough = $_POST['cough'];
$diffBreath = $_POST['diffBreath'];
$smellLoss = $_POST['smellLoss'];

$nausea = $_POST['nausea'];
$stomachAches = $_POST['stomachAches'];
$vomit = $_POST['vomit'];
$headache = $_POST['headache'];
$musclePain = $_POST['musclePain'];
$diarrhea = $_POST['diarrhea'];
$soreThroat = $_POST['soreThroat'];
$other = $_POST['other'];

echo $medicareNum . ' Is the Medicare # ' . '<br>';

echo 'Symptoms include: '.'<br>';
if (isset($fever)){
echo 'Fever' . '<br>';
}

echo 'Symptoms include: '.'<br>';
if (isset($cough)){
echo 'Cough' . '<br>';
}

echo 'Symptoms include: '.'<br>';
if (isset($nausea)){
echo 'Nausea' . '<br>';
}

echo 'Symptoms include: '.'<br>';
if (isset($soreThroat)){
echo 'Sore Throat' . '<br>';
}

echo 'Other Symptoms: ' . $other;

?>