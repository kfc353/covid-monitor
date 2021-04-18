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
  
  if($allFacilities->num_rows > 0){
  
    for ($i = 0; $i < $allFacilities->num_rows; $i++) {
      $allFacilities->data_seek($i);
      $row = $allFacilities->fetch_assoc();
      $x = $i + 1;

      $numOfWorkers = $mysqli->query("SELECT DISTINCT healthWorkerMedicareNum FROM Service 
      WHERE healthFacilityName in(SELECT name from HealthFacility WHERE name='" . $row['name'] . "')");

      //checks if the # of workers in this facility is not 0 
      if($numOfWorkers->num_rows > 0){

        // prints the number of workers in each facility 
        echo nl2br("\n Number of workers in this facility: $numOfWorkers->num_rows\n");
        
      }else{

        // no workers are work at this facility 
        echo("0 Workers ");

      }
    
      //checks if webpage is available or not 
      if(isset($row['webAddress'])){

        // print the info of the facilities with available webaddress
        echo nl2br("Name $x= " . $row['name'] . "\t" . " Facility Address = " . $row['address'] . "\t" . " WebAddress = " . $row['webAddress'] . "\t" . " Type = " . $row['type'] . "\t" 
        . "Accept Method = " . $row['acceptMethod'] . "\t" . "\n"); // writing into the webpage 

      }else{

        // print the info of the facilities with no webaddress
        echo nl2br("Name $x= " . $row['name'] . "\t" . " Facility Address = " . $row['address'] . "\t" . " WebAddress = N/A" . "\t" . " Type = " . $row['type'] . "\t" 
        . "Accept Method = " . $row['acceptMethod'] . "\t" . "\n"); // writing into the webpage 

      }

    }
  
  }else{

    // no available facilities 
    echo("0 facilities found ");

  }

}



// Lists all the regions (Number 13 from project guideline)
function listOfAllRegions($mysqli){

  $regions = $mysqli->query("SELECT DISTINCT region FROM CityRegion");
  
  // looping regions
  if($regions->num_rows > 0){
  
    for ($i = 0; $i < $regions->num_rows; $i++) {
      $regions->data_seek($i);
      $row = $regions->fetch_assoc();
      $x = $i + 1;

      $cities = $mysqli->query("SELECT city FROM CityRegion WHERE region ='" . $row['region'] . "'");

      // prints out the region 
      echo nl2br("Region $x= " . $row['region'] ."\n"); // writing into the webpage 

      //looping cities 
      if($cities->num_rows > 0){

        for ($k = 0; $k < $cities->num_rows; $k++) {
          $cities->data_seek($k);
          $row2 = $cities->fetch_assoc();
          $y = $k + 1;

          $postalCodes = $mysqli->query("SELECT postalCode FROM PostalCodeCity WHERE city ='" . $row2['city'] . "'");

          // prints out the city in every region
          echo nl2br("\tCity $y = " . $row2['city'] . "\n"); // writing into the webpage 

          // looping postalCodes
          if($postalCodes->num_rows > 0){

            for ($p = 0; $p < $postalCodes->num_rows; $p++) {
              $postalCodes->data_seek($p);
              $row3 = $postalCodes->fetch_assoc();
              $z = $p + 1;

              // prints out all the postal codes found in every city 
              echo nl2br("\tPostalCode $z = " . $row3['postalCode'] . "\n"); // writing into the webpage 
            }

          }else{

            // no postal codes are found in a specific city 
            echo nl2br("0 Postal Codes found \n ");
          }

        }

      }else{

        // no cities found in this specific region 
        echo nl2br("0 Cities found \n ");

      }
    }

  
  }else{
  
    // no regions found 
    echo("0 regions found ");
  
  }

}



// List of all people in a specific address (Number 11 from project guideline)
function allPeopleInSpecificAddress($mysqli, $specificAddress){

  $peopleInSpecificAddress = $mysqli->query("SELECT medicareNum , firstName ,lastName, dateOfBirth, phoneNum, address, citizenship, motherMedicareNum, fatherMedicareNum
  FROM Person p  
  WHERE p.address IN(SELECT address 
  FROM AddressPostalCode apc
  where apc.address='" . $specificAddress. "')");
  
  if($peopleInSpecificAddress->num_rows >0){

    for ($i = 0; $i < $peopleInSpecificAddress->num_rows; $i++) {
      $peopleInSpecificAddress->data_seek($i);
      $row = $peopleInSpecificAddress->fetch_assoc();
      $x = $i + 1;

      // prints out the information of the person 
      echo nl2br("Medicare Num $x= " . $row['medicareNum'] . "\t" . " First Name = " . $row['firstName'] . "\t" . " Last Name = " . $row['lastName'] . "\t" . " Date Of Birth = " . $row['dateOfBirth'] . 
      "\t" . " Phone Number = " . $row['phoneNum'] . "\t" . " Address = " . $row['address'] . "\t" . " Citizenship = " . $row['citizenship']); // writing into the webpage 
    
      $motherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['motherMedicareNum'] . "'");
      $FatherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['fatherMedicareNum'] . "'");

      $motherName->data_seek($i);
      $FatherName->data_seek($i);
      $row2 = $motherName->fetch_assoc();
      $row3 = $FatherName->fetch_assoc();

      // if both mother and father available , print out their FName and Lname 
      if(isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName']);
        
      // if mother is available but father isnt 
      }elseif(isset($row2) && !isset($row3)){

        echo nl2br("\nMother's Name = " . $row2['firstName'] . " " . $row2['lastName'] . "\nFather's Name = N/A");
        
      // if father is available but mother isnt 
      }elseif(!isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName']);
        
      // if neither mother nor father are available 
      }else{

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = N/A");
        
      }
    }

  }else{

    // no people found in this specific address 
    echo("0 people found ");

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


// Lists all health workers in a specific facility (Number 15 from project guideline)
function listOfHealthWorkersInSpecificFacility($mysqli, $specificFacility){

  $HealthWorkersInSpecificFacility = $mysqli->query("SELECT * FROM Person WHERE medicareNum
  IN(SELECT DISTINCT healthWorkerMedicareNum FROM Service 
  WHERE healthFacilityName IN(SELECT name from HealthFacility WHERE name='" . $specificFacility . "'))");
  
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
}



// Lists all health workers who tested postive (Number 16 from project guideline)
function listOfHealthWorkersTestedPositive($mysqli, $specificdate , $specificFacility){

  $HealthWorkersTestedPositive = $mysqli->query("SELECT * FROM Person WHERE medicareNum
  IN(SELECT * FROM HealthWorker 
  WHERE medicareNum IN(SELECT patientMedicareNum from Diagnostic WHERE result = 'positive ' 
  AND dateOfResult ='". $specificdate ."' AND healthFacilityName = '". $specificFacility ."'))");

  // Looping through all the health workers 
  if($HealthWorkersTestedPositive->num_rows > 0){
  
    for ($i = 0; $i < $HealthWorkersTestedPositive->num_rows; $i++) {
      $HealthWorkersTestedPositive->data_seek($i);
      $row = $HealthWorkersTestedPositive->fetch_assoc();
      $x = $i + 1;
      
      // prints out the info of the health worker that tested positive 
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
        
        // if father is available but mother isnt 
      }elseif(!isset($row2) && isset($row3)){

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = " . $row3['firstName'] . " " . $row3['lastName'] . "\n\n");
        
        // if neither mother nor father are available 
      }else{

        echo nl2br("\nMother's Name = N/A " . "\nFather's Name = N/A\n\n");
        
      }

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
            
            // prints out all the employess that workerd with the infected health worker in the past 14 days 
            echo nl2br("Medicare Num $x= " . $row5['medicareNum'] . "\t" . " First Name = " . $row5['firstName'] . "\t" . " Last Name = " . $row5['lastName'] . "\t" . " Date Of Birth = " . $row5['dateOfBirth'] . 
            "\t" . " Phone Number = " . $row5['phoneNum'] . "\t" . " Address = " . $row5['address']  . "\t" . " Province = " . $row5['province'].  "\t" . " Citizenship = " . $row5['citizenship']
            . "\t" . " Email = " . $row5['email']); // writing into the webpage 

            
        }
      }else{
  
        // no employees worked with the infected health worker 
        echo("0 Employee Cases \n");

      }
    }

  }else{
  
    // no infected health workers 
    echo("0 Infected Health workers  ");

  }
}



// Report about every region (Number 17 from project guideline)
function regionReport($mysqli, $specificStartDate, $specificEndDate){

  $regionName = $mysqli->query("SELECT DISTINCT region from CityRegion");
  
  // Looping through every region 
  if($regionName->num_rows > 0){
  
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

        // prints out the number of postive cases 
        echo nl2br("Number of positive Cases in this region: " . $positiveCases ."\n"); // writing into the webpage 

        // prints out the number of negative cases 
        echo nl2br("Number of negative Cases in this region: " . $negativeCases ."\n"); // writing into the webpage 
       
        }else{

            // no cases were available in this region 
            echo("0 number of cases  ");
           
        }

        $historyOfAlerts = $mysqli->query("SELECT * FROM AlertHistory ah  WHERE region = '". $row['region'] ."' 
        AND alertDateTime >= '". $specificStartDate ."' AND alertDateTime <= '". $specificEndDate ."'");


        if($historyOfAlerts->num_rows > 0){

          for ($p = 0; $p < $historyOfAlerts->num_rows; $p++) {
              $historyOfAlerts->data_seek($p);
              $row4 = $historyOfAlerts->fetch_assoc();
              $x = $p + 1;

              // prints out the alert history info 
             echo nl2br("ID = " . $row4['id'] . "\t" . "Level = " . $row4['level'] . "\t" . 
            "Alert Date and Time = " . $row4['alertDateTime'] . "\t" . "\n"); // writing into the webpage 
            
          }

        }else{

          // no alert history was found in that specific date 
          echo("0 Alert History Results ");
          
        }


    }

  }else{
  
    // if no region was found 
    echo("0 Regions found  ");
 
  }
}



// Display all the messages generated by the system (Number 10 from project guideline)
function allMessagesGenerated($mysqli, $specificStartDate, $specificEndDate){

  $messagesGenerated  = $mysqli->query("SELECT * FROM Messages m
  WHERE messageDateTime >= '". $specificStartDate ."' AND 
  messageDateTime <= '". $specificEndDate ."'");
 
  // Looping through every region 
  if($messagesGenerated->num_rows > 0){
  
    for ($i = 0; $i < $messagesGenerated->num_rows; $i++) {
      $messagesGenerated->data_seek($i);
      $row = $messagesGenerated->fetch_assoc();
      $x = $i + 1;
      

      // if guideline , description and recommendation were found ( 0 0 0)
      if(isset($row['guideline']) && isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
       
        // if guideline and description were found , but recommendation wasnt ( 0 0 1)
      }elseif(isset($row['guideline']) && isset($row['description']) && !isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = N/A" . "\n"); // writing into the webpage 
        
        // ( 0 1 0)
      }elseif(isset($row['guideline']) && !isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
        
        //  ( 0 1 1)
      }elseif(isset($row['guideline']) && !isset($row['description']) && !isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = " . $row['guideline'] . "\t". "Recommendation = N/A"."\n"); // writing into the webpage 
        
        //  ( 1 0 0 )
      }elseif(!isset($row['guideline']) && isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
        
        //  ( 1 0 1)
      }elseif(!isset($row['guideline']) && isset($row['description']) && !isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = N/A"."\n"); // writing into the webpage 
        
        //  ( 1 1 0)
      }elseif(!isset($row['guideline']) && !isset($row['description']) && isset($row['recommendation'])){

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = " . $row['recommendation']."\n"); // writing into the webpage 
        
        // ( 1 1 1)
      }else{

        echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
        "Guideline = N/A" . "\t". "Recommendation = N/A"."\n"); // writing into the webpage 
       
      }
    }

  }else{
  
    // no mesages were found 
    echo("0 messages were generated  ");
    
  }
}




// Testing each function withe proper inputs 
// Each comment beside each function represents the type of info it needs 


listOfAllFacilites($mysqli);  // connection variable 
listOfAllRegions($mysqli); // connection variable 
allPeopleInSpecificAddress($mysqli, '3, 3rd avenue'); // connection variable , specificAddress
listOfPoepleOnSpecificDate($mysqli, '2021-01-11 00:00:00'); // connection variable , specificDate 
listOfHealthWorkersInSpecificFacility($mysqli, 'Viau Public Health Center'); // connection variable . specificFacility 
listOfHealthWorkersTestedPositive($mysqli, '2021-04-15 22:50:54' ,'Viau Public Health Center'); // connection variable , specificDate , specificFacility
regionReport($mysqli, '2021-04-12 23:24:18', '2021-04-12 23:30:23' ); // connection variable , startDate, endDate
allMessagesGenerated($mysqli, '2021-04-15 22:50:35', '2021-04-15 22:53:16' ); // connection variable , startDate, endDate

