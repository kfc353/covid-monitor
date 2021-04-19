<?php
require_once "repository/MysqlConnection.php";

// Lists all the people that got result on a specific date (Number 14 from project guideline)
function listOfPoepleOnSpecificDate($mysqli, $specificDate){

    $PoepleOnSpecificDatePostiveCases = $mysqli->query("SELECT firstName, lastName, dateOfBirth, phoneNum, email
     FROM Person WHERE medicareNum IN(SELECT patientMedicareNum FROM Diagnostic WHERE
     dateOfResult ='" . $specificDate ."' AND result = 'positive')");
  
    $PoepleOnSpecificDateNegativeCases = $mysqli->query("SELECT firstName, lastName, dateOfBirth, phoneNum, email
    FROM Person WHERE medicareNum IN(SELECT patientMedicareNum FROM Diagnostic WHERE
    dateOfResult ='" . $specificDate ."' AND result = 'negative')");
    
    // looping through all positive cases
    echo nl2br("Postive Cases: \n");
    if($PoepleOnSpecificDatePostiveCases->num_rows > 0){
    
      for ($i = 0; $i < $PoepleOnSpecificDatePostiveCases->num_rows; $i++) {
        $PoepleOnSpecificDatePostiveCases->data_seek($i);
        $row = $PoepleOnSpecificDatePostiveCases->fetch_assoc();
        $x = $i + 1;
        
        // printing out the info of the person that tested positive 
        echo nl2br(" First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
        "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Email = " . $row['email'] . "\n"); // writing into the webpage 
       
      }
  
    }else{
    
      // no positive cases were found on this date 
      echo("0 Postive Cases \n");
    
    }
  
    // looping through all negative cases 
    echo nl2br("Negative Cases: \n");
    if($PoepleOnSpecificDateNegativeCases->num_rows > 0){
  
      for ($k = 0; $k < $PoepleOnSpecificDateNegativeCases->num_rows; $k++) {
        $PoepleOnSpecificDateNegativeCases->data_seek($k);
        $row2 = $PoepleOnSpecificDateNegativeCases->fetch_assoc();
        $x = $k + 1;
        
        // printing out the info of the person that tested negative  
        echo nl2br(" First Name = " . $row2['firstName'] . "\t" . " Last Name = " . $row2['lastName'] . "\t" . " Date Of Birth = " . $row2['dateOfBirth'] . 
        "\t" . " Phone Number = " . $row2['phoneNum'] . "\t" . " Email = " . $row2['email'] . "\n"); // writing into the webpage 
       
      }
  
    }else{
    
      // no negative cases were found on this date 
      echo("0 Negative Cases ");
   
    }
  
  }
  
?>
<div id='listPositiveWorkers' style='display: none'>
<?php
$mysqli = MysqlConnection::getInstance()->getMysqli();
listOfPoepleOnSpecificDate($mysqli, '2021-01-11 00:00:00'); // connection variable , specificDate 

?>
</div>