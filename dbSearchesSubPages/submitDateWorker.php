<?php require_once "../repository/MysqlConnection.php";

// Lists all the people that got result on a specific date (Number 14 from project guideline)
function listOfPoepleOnSpecificDate($mysqli, $specificDate)
{

  $PoepleOnSpecificDatePostiveCases = $mysqli->query("SELECT DISTINCT firstName, lastName, dateOfBirth, phoneNum, email
     FROM Person WHERE medicareNum IN(SELECT patientMedicareNum FROM Diagnostic WHERE
     dateOfResult ='" . $specificDate . "' AND result = 'positive')");

  $PoepleOnSpecificDateNegativeCases = $mysqli->query("SELECT DISTINCT firstName, lastName, dateOfBirth, phoneNum, email
    FROM Person WHERE medicareNum IN(SELECT patientMedicareNum FROM Diagnostic WHERE
    dateOfResult ='" . $specificDate . "' AND result = 'negative')");

  // looping through all positive cases
  echo "<h3>Report for positive test results: $specificDate</h3>";
  if ($PoepleOnSpecificDatePostiveCases->num_rows > 0) {
    echo "<table>";
    echo "<tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Phone Number</th>
        <th>Email</th>
        </tr>";

    for ($i = 0; $i < $PoepleOnSpecificDatePostiveCases->num_rows; $i++) {
      $PoepleOnSpecificDatePostiveCases->data_seek($i);
      $row = $PoepleOnSpecificDatePostiveCases->fetch_assoc();
      $x = $i + 1;

      echo "<tr>";
      echo "<td>" . $row['firstName'] . "</td>";
      echo "<td>" . $row['lastName'] . "</td>";
      echo "<td>" . $row['dateOfBirth'] . "</td>";
      echo "<td>" . $row['phoneNum'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "</tr>";

    }
    echo "</table>";
  } else {

    // no positive cases were found on this date 
    echo ("0 Postive Cases \n");
  }


  // looping through all negative cases 
  echo "<h3>Report for negative test results: $specificDate</h3>";
  if ($PoepleOnSpecificDateNegativeCases->num_rows > 0) {

    echo "<table>";
    echo "<tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Phone Number</th>
        <th>Email</th>
        </tr>";
    for ($k = 0; $k < $PoepleOnSpecificDateNegativeCases->num_rows; $k++) {
      $PoepleOnSpecificDateNegativeCases->data_seek($k);
      $row2 = $PoepleOnSpecificDateNegativeCases->fetch_assoc();
      $x = $k + 1;
      echo "<tr>";
      echo "<td>" . $row2['firstName'] . "</td>";
      echo "<td>" . $row2['lastName'] . "</td>";
      echo "<td>" . $row2['dateOfBirth'] . "</td>";
      echo "<td>" . $row2['phoneNum'] . "</td>";
      echo "<td>" . $row2['email'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
  } else {

    // no negative cases were found on this date 
    echo ("0 Negative Cases ");
  }
}
?>

<?php
$mysqli = MysqlConnection::getInstance()->getMysqli();
$testDate = $_POST['testDate'];
listOfPoepleOnSpecificDate($mysqli, $testDate);
?>