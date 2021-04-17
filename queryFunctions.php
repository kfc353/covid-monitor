<?php
// TODO: should set $host based on environment
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
$host = "127.0.0.1:3307";
$database = "kfc353_4";
$username = "kfc353_4";
$password = "Al3xB3st";

// create connection
$mysqli = new mysqli($host, $username, $password, $database);
echo nl2br($mysqli->host_info . "\n\n");


// Lists all the facilities (Number 12 from project guideline)
function listOfAllFacilites($mysqli){

  $allFacilities = $mysqli->query("SELECT * FROM HealthFacility");

  $myfile = fopen("Testing.txt", "w") or die("Unable to open file !"); // file open 
  
  echo nl2br("List of all facilities: \n");
  fwrite($myfile , "List of all facilities: \n");
  
  if($allFacilities->num_rows > 0){
  
    for ($i = 0; $i < $allFacilities->num_rows; $i++) {
      $allFacilities->data_seek($i);
      $row = $allFacilities->fetch_assoc();
      $x = $i + 1;

      $numOfWorkers = $mysqli->query("SELECT DISTINCT healthWorkerMedicareNum FROM Service 
      WHERE healthFacilityName in(SELECT name from HealthFacility WHERE name='" . $row['name'] . "')");

      if($numOfWorkers->num_rows > 0){

        echo nl2br("\n Number of workers in this facility: $numOfWorkers->num_rows\n");
        fwrite($myfile,"\n Number of workers in this facility: $numOfWorkers->num_rows\n");
        
      }else{
        echo("0 Workers ");
        fwrite($myfile, "0 Workers  ");
      }
    
      if(isset($row['webAddress'])){

        echo nl2br("Name $x= " . $row['name'] . "\t" . " Facility Address = " . $row['address'] . "\t" . " WebAddress = " . $row['webAddress'] . "\t" . " Type = " . $row['type'] . "\t" 
        . "Accept Method = " . $row['acceptMethod'] . "\t" . "\n"); // writing into the webpage 
        fwrite($myfile,"Name $x= " . $row['name'] . "\t" . " Facility Address = " . $row['address'] . "\t" . " WebAddress = " . $row['webAddress'] . "\t" . " Type = " . $row['type'] . "\t" 
        . "Accept Method = " . $row['acceptMethod'] . "\t" . "\n"); // writing into a file 

      }else{

        echo nl2br("Name $x= " . $row['name'] . "\t" . " Facility Address = " . $row['address'] . "\t" . " WebAddress = N/A" . "\t" . " Type = " . $row['type'] . "\t" 
        . "Accept Method = " . $row['acceptMethod'] . "\t" . "\n"); // writing into the webpage 
        fwrite($myfile,"Name $x= " . $row['name'] . "\t" . " Facility Address = " . $row['address'] . "\t" . " WebAddress = N/A" . "\t" . " Type = " . $row['type'] . "\t" 
        . "Accept Method = " . $row['acceptMethod'] . "\t" . "\n"); // writing into a file 

      }
     
    }
    fclose($myfile); //file close 
  
  }else{
  
    echo("0 Results");
    fwrite($myfile, "0 Results");
    fclose($myfile); //file close 
  }

}



// Lists all the regions (Number 13 from project guideline)
function listOfAllRegions($mysqli){

  $regions = $mysqli->query("SELECT DISTINCT region FROM CityRegion");

  $myfile = fopen("Testing.txt", "a") or die("Unable to open file !"); // file open 
  
  echo nl2br("\n\nList of all regions: \n");
  fwrite($myfile , "\n\nList of all regions: \n");
  
  // looping regions
  if($regions->num_rows > 0){
  
    for ($i = 0; $i < $regions->num_rows; $i++) {
      $regions->data_seek($i);
      $row = $regions->fetch_assoc();
      $x = $i + 1;

      $cities = $mysqli->query("SELECT city FROM CityRegion WHERE region ='" . $row['region'] . "'");

      echo nl2br("Region $x= " . $row['region'] ."\n"); // writing into the webpage 
      fwrite($myfile,"Region $x= " . $row['region'] . "\n"); // writing into a file 

      //looping cities 
      if($cities->num_rows > 0){

        for ($k = 0; $k < $cities->num_rows; $k++) {
          $cities->data_seek($k);
          $row2 = $cities->fetch_assoc();
          $y = $k + 1;

          $postalCodes = $mysqli->query("SELECT postalCode FROM PostalCodeCity WHERE city ='" . $row2['city'] . "'");

          echo nl2br("\tCity $y = " . $row2['city'] . "\n"); // writing into the webpage 
          fwrite($myfile,"\tCity $y = " . $row2['city'] . "\n"); // writing into a file 

          // looping postalCodes
          if($postalCodes->num_rows > 0){

            for ($p = 0; $p < $postalCodes->num_rows; $p++) {
              $postalCodes->data_seek($p);
              $row3 = $postalCodes->fetch_assoc();
              $z = $p + 1;

              echo nl2br("\tPostalCode $z = " . $row3['postalCode'] . "\n"); // writing into the webpage 
              fwrite($myfile,"\tPostalCode $z = " . $row3['postalCode'] . "\n"); // writing into a file 
            }

          }else{

            echo nl2br("0 Postal Codes\n ");
            fwrite($myfile, "0 Postal Codes\n");
          }

        }

      }else{

        echo nl2br("0 Cities\n ");
        fwrite($myfile, "0 Cities\n  ");

      }
    }
    fclose($myfile); //file close 
  
  }else{
  
    echo("0 Results");
    fwrite($myfile, "0 Results");
    fclose($myfile); //file close 
  
  }

}



// List of all people in a specific address (Number 11 from project guideline)
function allPeopleInSpecificAddress($mysqli, $specificAddress){

  $peopleInSpecificAddress = $mysqli->query("SELECT medicareNum , firstName ,lastName, dateOfBirth, phoneNum, address, citizenship, motherMedicareNum, fatherMedicareNum
  FROM Person p  
  WHERE p.address IN(SELECT address 
  FROM AddressPostalCode apc
  where apc.address='" . $specificAddress. "')");
  
  $myfile = fopen("Testing.txt", "a") or die("Unable to open file !"); // file open 
  
  echo nl2br("\n\nList of all people in a specific address: \n");
  fwrite($myfile , "\n\nList of all people in a specific address: \n");
  
  if($peopleInSpecificAddress->num_rows >0){

    for ($i = 0; $i < $peopleInSpecificAddress->num_rows; $i++) {
      $peopleInSpecificAddress->data_seek($i);
      $row = $peopleInSpecificAddress->fetch_assoc();
      $x = $i + 1;

      echo nl2br("Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address'] . "\t" . " Citizenship = " . $row['citizenship']); // writing into the webpage 
      fwrite($myfile,"Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address'] . "\t" . " Citizenship = " . $row['citizenship']); // writing into a file 
    
      $motherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['motherMedicareNum'] . "'");
      $FatherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['fatherMedicareNum'] . "'");

      $motherName->data_seek($i);
      $FatherName->data_seek($i);
      $row2 = $motherName->fetch_assoc();
      $row3 = $FatherName->fetch_assoc();

      if(isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName']);
        fwrite($myfile,"\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName']); // writing into a file 

      }elseif(isset($row2) && !isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A");
        fwrite($myfile,"\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A"); // writing into a file 

      }elseif(!isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName']);
        fwrite($myfile,"\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName']); // writing into a file 

      }else{

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = N/A");
        fwrite($myfile,"\nMother's Name = N/A " . "\nFather's Name = N/A"); // writing into a file 

      }
    }
    
    fclose($myfile); //file close 

  }else{

    echo("0 Results");
    fwrite($myfile, "0 Results");
    fclose($myfile); //file close 

  }
  
}

// Lists all the people that got result on a specific date (Number 14 from project guideline)
function listOfPoepleOnSpecificDate($mysqli, $specificDate){

  $PoepleOnSpecificDatePostiveCases = $mysqli->query("SELECT firstName, lastName, dateOfBirth, phoneNum, email
   FROM Person WHERE medicareNum IN(SELECT patientMedicareNum FROM Diagnostic WHERE
   dateOfResult ='" . $specificDate ."' AND result = 'positive')");

  $PoepleOnSpecificDateNegativeCases = $mysqli->query("SELECT firstName, lastName, dateOfBirth, phoneNum, email
  FROM Person WHERE medicareNum IN(SELECT patientMedicareNum FROM Diagnostic WHERE
  dateOfResult ='" . $specificDate ."' AND result = 'negative')");

  $myfile = fopen("Testing.txt", "a") or die("Unable to open file !"); // file open 
  
  echo nl2br("\n\nLists all the people that got result on a specific date: \n");
  fwrite($myfile , "\n\nLists all the people that got result on a specific date: \n");
  
  // looping through all positive cases
  echo nl2br("Postive Cases: \n");
  if($PoepleOnSpecificDatePostiveCases->num_rows > 0){
  
    for ($i = 0; $i < $PoepleOnSpecificDatePostiveCases->num_rows; $i++) {
      $PoepleOnSpecificDatePostiveCases->data_seek($i);
      $row = $PoepleOnSpecificDatePostiveCases->fetch_assoc();
      $x = $i + 1;
      
      echo nl2br(" First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Email = " . $row['email'] . "\n"); // writing into the webpage 
      fwrite($myfile," First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Email = " . $row['email'] . "\n"); // writing into a file 
     
    }

  }else{
  
    echo("0 Postive Cases \n");
    fwrite($myfile, "0 Postive Cases\n");
  
  }

  // looping through all negative cases 
  echo nl2br("Negative Cases: \n");
  if($PoepleOnSpecificDateNegativeCases->num_rows > 0){

    for ($k = 0; $k < $PoepleOnSpecificDateNegativeCases->num_rows; $k++) {
      $PoepleOnSpecificDateNegativeCases->data_seek($k);
      $row2 = $PoepleOnSpecificDateNegativeCases->fetch_assoc();
      $x = $k + 1;
      
      echo nl2br(" First Name = " . $row2['firstName'] . "\t" . " Last Name = " . $row2['lastName'] . "\t" . " Date Of Birth = " . $row2['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row2['phoneNum'] . "\t" . " Email = " . $row2['email'] . "\n"); // writing into the webpage 
      fwrite($myfile," First Name = " . $row2['firstName'] . "\t" . " Last Name = " . $row2['lastName'] . "\t" . " Date Of Birth = " . $row2['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row2['phoneNum'] . "\t" . " Email = " . $row2['email'] . "\n"); // writing into a file 
     
    }

  }else{
  
    echo("0 Negative Cases ");
    fwrite($myfile, "0 Negative Cases");
    fclose($myfile); //file close   
  }

}


// Lists all health workers in a specific facility (Number 15 from project guideline)
function listOfHealthWorkersInSpecificFacility($mysqli, $specificFacility){

  $HealthWorkersInSpecificFacility = $mysqli->query("SELECT * FROM Person WHERE medicareNum
  IN(SELECT DISTINCT healthWorkerMedicareNum FROM Service 
  WHERE healthFacilityName IN(SELECT name from HealthFacility WHERE name='" . $specificFacility . "'))");

  $myfile = fopen("Testing.txt", "a") or die("Unable to open file !"); // file open 
  
  echo nl2br("\n\nLists of all the  health workers in a specific facility: \n");
  fwrite($myfile , "\n\nLists of all the health workers in a specific facility: \n");
  
  // Looping through all the health workers 
  if($HealthWorkersInSpecificFacility->num_rows > 0){
  
    for ($i = 0; $i < $HealthWorkersInSpecificFacility->num_rows; $i++) {
      $HealthWorkersInSpecificFacility->data_seek($i);
      $row = $HealthWorkersInSpecificFacility->fetch_assoc();
      $x = $i + 1;
      
      echo nl2br("Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address']  . "\t" . " Province = " . $row['province'].  "\t" . " Citizenship = " . $row['citizenship']
      . "\t" . " Email = " . $row['email']); // writing into the webpage 
      fwrite($myfile,"Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address']  . "\t" . " Province = " . $row['province'].  "\t" . " Citizenship = " . $row['citizenship']
      . "\t" . " Email = " . $row['email']); // writing into a file 

      $motherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['motherMedicareNum'] . "'");
      $FatherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['fatherMedicareNum'] . "'");

      $motherName->data_seek($i);
      $FatherName->data_seek($i);
      $row2 = $motherName->fetch_assoc();
      $row3 = $FatherName->fetch_assoc();

      if(isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n");
        fwrite($myfile,"\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n"); // writing into a file 

      }elseif(isset($row2) && !isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A\n\n");
        fwrite($myfile,"\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A\n\n"); // writing into a file 

      }elseif(!isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n");
        fwrite($myfile,"\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n"); // writing into a file 

      }else{

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = N/A\n\n");
        fwrite($myfile,"\nMother's Name = N/A " . "\nFather's Name = N/A\n\n"); // writing into a file 

      }
     
    }

  }else{
  
    echo("0 Postive Cases ");
    fwrite($myfile, "0 Postive Cases");
    fclose($myfile); //file close  
  }
}



// Lists all health workers who tested postive (Number 16 from project guideline)
function listOfHealthWorkersTestedPositive($mysqli, $specificdate , $specificFacility){

  $HealthWorkersTestedPositive = $mysqli->query("SELECT * FROM Person WHERE medicareNum
  IN(SELECT * FROM HealthWorker 
  WHERE medicareNum IN(SELECT patientMedicareNum from Diagnostic WHERE result = 'positive ' 
  AND dateOfResult ='". $specificdate ."' AND healthFacilityName = '". $specificFacility ."'))");

  $myfile = fopen("Testing.txt", "a") or die("Unable to open file !"); // file open 
  
  echo nl2br("\n\nLists of all the health workers who tested postive: \n");
  fwrite($myfile , "\n\nLists of all the health workers who tested postive: \n");
  
  // Looping through all the health workers 
  if($HealthWorkersTestedPositive->num_rows > 0){
  
    for ($i = 0; $i < $HealthWorkersTestedPositive->num_rows; $i++) {
      $HealthWorkersTestedPositive->data_seek($i);
      $row = $HealthWorkersTestedPositive->fetch_assoc();
      $x = $i + 1;
      
      echo nl2br("Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address']  . "\t" . " Province = " . $row['province'].  "\t" . " Citizenship = " . $row['citizenship']
      . "\t" . " Email = " . $row['email']); // writing into the webpage 
      fwrite($myfile,"Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address']  . "\t" . " Province = " . $row['province'].  "\t" . " Citizenship = " . $row['citizenship']
      . "\t" . " Email = " . $row['email']); // writing into a file 

      $motherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['motherMedicareNum'] . "'");
      $FatherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['fatherMedicareNum'] . "'");

      $motherName->data_seek($i);
      $FatherName->data_seek($i);
      $row2 = $motherName->fetch_assoc();
      $row3 = $FatherName->fetch_assoc();

      if(isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n");
        fwrite($myfile,"\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n"); // writing into a file 

      }elseif(isset($row2) && !isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A\n\n");
        fwrite($myfile,"\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A\n\n"); // writing into a file 

      }elseif(!isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n");
        fwrite($myfile,"\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n"); // writing into a file 

      }else{

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = N/A\n\n");
        fwrite($myfile,"\nMother's Name = N/A " . "\nFather's Name = N/A\n\n"); // writing into a file 

      }

      echo nl2br("\tList of all employees who worked past 14 days with them: \n");
      fwrite($myfile , "\tList of all employees who worked past 14 days with them: \n");


      $HealthWorkerDateOfPerform = $mysqli->query("SELECT dateOfPerform FROM Diagnostic WHERE
      patientMedicareNum = '". $row['medicareNum'] ."' AND dateOfResult = '". $specificdate ."'");

      $HealthWorkerDateOfPerform->data_seek($i);
      $row4 = $HealthWorkerDateOfPerform->fetch_assoc();
      
      $endDate = date('Y-m-d' , strtotime($row4['dateOfPerform']));

      $date = date_create($endDate);
      date_sub($date, date_interval_create_from_date_string('14 days'));

      $startDate = date_format($date, 'Y-m-d H:i:s');

      $employessWorkedWith = $mysqli->query("SELECT * FROM Person WHERE medicareNum IN(
          SELECT healthWorkerMedicareNum FROM Service WHERE startDateTime >= '". $startDate ."' 
          AND startDateTime <= '". $endDate ."' AND healthFacilityName = '". $specificFacility ."')");

      if($employessWorkedWith->num_rows >0){

        for ($k = 0; $k < $employessWorkedWith->num_rows; $k++) {
            $employessWorkedWith->data_seek($k);
            $row5 = $employessWorkedWith->fetch_assoc();
            $x = $k + 1;
            
            echo nl2br("Medicare Num $x= " . $row5['medicareNum'] . "\t" . " First Name = " . $row5['firstName'] . "\t" . " Last Name = " . $row5['lastName'] . "\t" . " Date Of Birth = " . $row5['dateOfBirth'] . 
            "\t" . " Phone Number = " . $row5['phoneNum'] . "\t" . " Address = " . $row5['address']  . "\t" . " Province = " . $row5['province'].  "\t" . " Citizenship = " . $row5['citizenship']
            . "\t" . " Email = " . $row5['email']); // writing into the webpage 
            fwrite($myfile,"Medicare Num $x= " . $row5['medicareNum'] . "\t" . " First Name = " . $row5['firstName'] . "\t" . " Last Name = " . $row5['lastName'] . "\t" . " Date Of Birth = " . $row5['dateOfBirth'] . 
            "\t" . " Phone Number = " . $row5['phoneNum'] . "\t" . " Address = " . $row5['address']  . "\t" . " Province = " . $row5['province'].  "\t" . " Citizenship = " . $row5['citizenship']
            . "\t" . " Email = " . $row5['email']); // writing into a file 
            
        }
      }else{

        echo("0 Employee Cases \n");
        fwrite($myfile, "0 Employee Cases\n");

      }
    }

  }else{
  
    echo("0 Postive Cases ");
    fwrite($myfile, "0 Postive Cases");
    fclose($myfile); //file close  
  }
}



// Report about every region (Number 17 from project guideline)
function regionReport($mysqli, $specificStartDate, $specificEndDate){

  $regionName = $mysqli->query("SELECT DISTINCT region from CityRegion");
  $myfile = fopen("Testing.txt", "a") or die("Unable to open file !"); // file open 
  
  echo nl2br("\n\nA report about every region: \n");
  fwrite($myfile , "\n\nA report about every region:: \n");
  
  // Looping through every region 
  if($regionName->num_rows > 0){
  
    for ($i = 0; $i < $regionName->num_rows; $i++) {
      $regionName->data_seek($i);
      $row = $regionName->fetch_assoc();
      $x = $i + 1;
      
      echo nl2br("Region Name $x= " . $row['region'] . "\n"); // writing into the webpage 
      fwrite($myfile,"Region Name $x= " . $row['region'] . "\n"); // writing into a file 


    // TODO: FIX THE PART BELOW TO ONLY GET THE LATEST VALUE OF THE TEST ( order table based on time and get the desc and limit to 1)

      $numberOfCases = $mysqli->query("SELECT  DISTINCT patientMedicareNum FROM Diagnostic d2 
        WHERE patientMedicareNum IN(
        SELECT medicareNum FROM Person p WHERE address IN(
        SELECT address FROM AddressPostalCode apc WHERE postalCode IN(
        SELECT postalCode FROM PostalCodeCity pcc WHERE city IN(
        SELECT city FROM CityRegion cr WHERE region = '". $row['region'] ."'))))");

        if($numberOfCases->num_rows > 0){

            $positiveCases = 0;
            $negativeCases = 0;
        
            for ($k = 0; $k < $numberOfCases->num_rows; $k++) {
                $numberOfCases->data_seek($k);
                $row2 = $numberOfCases->fetch_assoc();
                $x = $k + 1;

                $numberOfPositiveCases = $mysqli->query("SELECT * FROM Diagnostic d 
                WHERE patientMedicareNum = '". $row2['patientMedicareNum'] ."'
                ORDER BY dateOfResult DESC 
                LIMIT 1");
                
                $numberOfPositiveCases->data_seek($k);
                $row3 = $numberOfPositiveCases->fetch_assoc();

                if($row3['result'] == 'positive'){
                    $positiveCases++;
                }

                if($row3['result'] == 'negative'){
                    $negativeCases++;
                }

            }

        
        echo nl2br("Number of positive Cases in this region: " . $positiveCases ."\n"); // writing into the webpage 
        fwrite($myfile,"Number of positive Cases in this region: " . $positiveCases ."\n"); // writing into a file 
        echo nl2br("Number of negative Cases in this region: " . $negativeCases ."\n"); // writing into the webpage 
        fwrite($myfile,"Number of negative Cases in this region: " . $negativeCases ."\n"); // writing into a file 



        }else{

            echo("0 number of cases  ");
            fwrite($myfile, "0 number of cases ");

        }
    }

  }else{
  
    echo("0 Results ");
    fwrite($myfile, "0 Results ");
    fclose($myfile); //file close  
  }
}



// Display all the messages generated by the system (Number 10 from project guideline)
function allMessagesGenerated($mysqli, $specificStartDate, $specificEndDate){

  $messagesGenerated  = $mysqli->query("SELECT * FROM Messages m
  WHERE messageDateTime >= '". $specificStartDate ."' AND 
  messageDateTime <= '". $specificEndDate ."'");
  $myfile = fopen("Testing.txt", "a") or die("Unable to open file !"); // file open 
  
  echo nl2br("\n\nAll the messages generated by the system : \n");
  fwrite($myfile , "\n\nAll the messages generated by the system: \n");
  
  // Looping through every region 
  if($messagesGenerated->num_rows > 0){
  
    for ($i = 0; $i < $messagesGenerated->num_rows; $i++) {
      $messagesGenerated->data_seek($i);
      $row = $messagesGenerated->fetch_assoc();
      $x = $i + 1;
      

      if(isset($row['guideline']) && isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into a file 

      }elseif(isset($row['guideline']) && isset($row['description']) && !isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = N/A" . "\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = N/A" . "\n"); // writing into a file 

      }elseif(isset($row['guideline']) && !isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into a file 

      }elseif(isset($row['guideline']) && !isset($row['description']) && !isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = N/A"."\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = N/A"."\n"); // writing into a file 

      }elseif(!isset($row['guideline']) && isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into a file 

      }elseif(!isset($row['guideline']) && isset($row['description']) && !isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = N/A"."\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = N/A"."\n"); // writing into a file 

      }elseif(!isset($row['guideline']) && !isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into a file 

      }else{

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = N/A"."\n"); // writing into the webpage 
        fwrite($myfile,"Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = N/A"."\n"); // writing into a file 

      }
    }

  }else{
  
    echo("0 Results ");
    fwrite($myfile, "0 Results ");
    fclose($myfile); //file close  
  }
}





listOfAllFacilites($mysqli);
listOfAllRegions($mysqli);
allPeopleInSpecificAddress($mysqli, '3, 3rd avenue');
listOfPoepleOnSpecificDate($mysqli, '2021-01-11 00:00:00');
listOfHealthWorkersInSpecificFacility($mysqli, 'Viau Public Health Center');
listOfHealthWorkersTestedPositive($mysqli, '2021-04-15 22:50:54' ,'Viau Public Health Center');
regionReport($mysqli, '2021-04-22 13:50:00', '2021-04-25 02:51:03' );
allMessagesGenerated($mysqli, '2021-04-15 22:50:35', '2021-04-15 22:53:16' );

