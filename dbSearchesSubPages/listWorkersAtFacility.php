<?php
require_once "repository/MysqlConnection.php";
// Lists all health workers in a specific facility (Number 15 from project guideline)
function listOfHealthWorkersInSpecificFacility($mysqli, $specificFacility){

    $HealthWorkersInSpecificFacility = $mysqli->query("SELECT * FROM Person WHERE medicareNum
    IN(SELECT DISTINCT healthWorkerMedicareNum FROM Service 
    WHERE healthFacilityName IN(SELECT name from HealthFacility WHERE name='" . $specificFacility . "'))");
    echo "<h3>Workers at $specificFacility</h3>";
    // Looping through all the health workers 
    if($HealthWorkersInSpecificFacility->num_rows > 0){
    
      for ($i = 0; $i < $HealthWorkersInSpecificFacility->num_rows; $i++) {
        $HealthWorkersInSpecificFacility->data_seek($i);
        $row = $HealthWorkersInSpecificFacility->fetch_assoc();
        $x = $i + 1;
  
        // prints out the info of the health worker 
        echo nl2br("Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
        "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address']  . "\t" . " Province = " . $row['province'].  "\t" . " Citizenship = " . $row['citizenship']
        . "\t" . " Email = " . $row['email']); // writing into the webpage 
   
  
        $motherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['motherMedicareNum'] . "'");
        $FatherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['fatherMedicareNum'] . "'");
  
        $motherName->data_seek($i);
        $FatherName->data_seek($i);
        $row2 = $motherName->fetch_assoc();
        $row3 = $FatherName->fetch_assoc();
  
        // if both mother and father are available 
        if(isset($row2) && isset($row3)){
  
          echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n");
          
          // if mother is available but father isnt 
        }elseif(isset($row2) && !isset($row3)){
  
          echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A\n\n");
          
          // if father is available but father isnt 
        }elseif(!isset($row2) && isset($row3)){
  
          echo nl2br("\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n");
         
          // if neither mother nor father are available 
        }else{
  
          echo nl2br("\nMother's Name = N/A " . "\nFather's Name = N/A\n\n");
  
        }
       
      }
  
    }else{
    
      echo("0 health workers ");
  
    }
  }?>
<div id='listWorkersAtFacility' style='display: none'>

<?php 
$mysqli = MysqlConnection::getInstance()->getMysqli();
$specificFacility = "Viau Public Health Center";
listOfHealthWorkersInSpecificFacility($mysqli, $specificFacility);
?>
</div>