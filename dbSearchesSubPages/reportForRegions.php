<?php
require_once "repository/MysqlConnection.php";
// Report about every region (Number 17 from project guideline)
function regionReport($mysqli, $specificStartDate, $specificEndDate)
{

  $regionName = $mysqli->query("SELECT DISTINCT region from CityRegion");

  // Looping through every region 
  if ($regionName->num_rows > 0) {

    for ($i = 0; $i < $regionName->num_rows; $i++) {
      $regionName->data_seek($i);
      $row = $regionName->fetch_assoc();
      $x = $i + 1;

      // prints out the region 
      echo nl2br("Region Name $x= " . $row['region'] . "\n"); // writing into the webpage 

      $numberOfCases = $mysqli->query("SELECT  DISTINCT patientMedicareNum FROM Diagnostic d2 
          WHERE patientMedicareNum IN(
          SELECT medicareNum FROM Person p WHERE address IN(
          SELECT address FROM AddressPostalCode apc WHERE postalCode IN(
          SELECT postalCode FROM PostalCodeCity pcc WHERE city IN(
          SELECT city FROM CityRegion cr WHERE region = '" . $row['region'] . "'))))");

      if ($numberOfCases->num_rows > 0) {

        $positiveCases = 0;
        $negativeCases = 0;

        for ($k = 0; $k < $numberOfCases->num_rows; $k++) {
          $numberOfCases->data_seek($k);
          $row2 = $numberOfCases->fetch_assoc();
          $x = $k + 1;

          $numberOfPositiveCases = $mysqli->query("SELECT * FROM Diagnostic d 
                  WHERE patientMedicareNum = '" . $row2['patientMedicareNum'] . "'
                  ORDER BY dateOfResult DESC 
                  LIMIT 1");

          $numberOfPositiveCases->data_seek($k);
          $row3 = $numberOfPositiveCases->fetch_assoc();

          if ($row3['result'] == 'positive') {
            $positiveCases++;
          }

          if ($row3['result'] == 'negative') {
            $negativeCases++;
          }
        }

        // prints out the number of postive cases 
        echo nl2br("Number of positive Cases in this region: " . $positiveCases . "\n"); // writing into the webpage 

        // prints out the number of negative cases 
        echo nl2br("Number of negative Cases in this region: " . $negativeCases . "\n"); // writing into the webpage 

      } else {

        // no cases were available in this region 
        echo ("0 number of cases  ");
      }

      $historyOfAlerts = $mysqli->query("SELECT * FROM AlertHistory ah  WHERE region = '" . $row['region'] . "' 
          AND alertDateTime >= '" . $specificStartDate . "' AND alertDateTime <= '" . $specificEndDate . "'");


      if ($historyOfAlerts->num_rows > 0) {

        for ($p = 0; $p < $historyOfAlerts->num_rows; $p++) {
          $historyOfAlerts->data_seek($p);
          $row4 = $historyOfAlerts->fetch_assoc();
          $x = $p + 1;

          // prints out the alert history info 
          echo nl2br("ID = " . $row4['id'] . "\t" . "Level = " . $row4['level'] . "\t" .
            "Alert Date and Time = " . $row4['alertDateTime'] . "\t" . "\n"); // writing into the webpage 

        }
      } else {

        // no alert history was found in that specific date 
        echo ("0 Alert History Results ");
      }
    }
  } else {

    // if no region was found 
    echo ("0 Regions found  ");
  }
}



?>
<div id='reportForRegions' style='display: none'>

  <?php
  $mysqli = MysqlConnection::getInstance()->getMysqli();
  regionReport($mysqli, '2021-04-12 23:24:18', '2021-04-12 23:30:23') ?>
</div>