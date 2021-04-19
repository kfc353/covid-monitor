<?php
require_once "repository/MysqlConnection.php";

// Lists all the facilities (Number 12 from project guideline)
function listOfAllFacilites($mysqli)
{

    $allFacilities = $mysqli->query("SELECT * FROM HealthFacility");

    if ($allFacilities->num_rows > 0) {

        for ($i = 0; $i < $allFacilities->num_rows; $i++) {
            $allFacilities->data_seek($i);
            $row = $allFacilities->fetch_assoc();
            $x = $i + 1;

            $numOfWorkers = $mysqli->query("SELECT DISTINCT healthWorkerMedicareNum FROM Service 
      WHERE healthFacilityName in(SELECT name from HealthFacility WHERE name='" . $row['name'] . "')");

            //checks if the # of workers in this facility is not 0 
            if ($numOfWorkers->num_rows > 0) {

                // prints the number of workers in each facility 
                echo nl2br("<br>Number of workers in this facility: $numOfWorkers->num_rows<br>");
            } else {

                // no workers are work at this facility 
                echo ("<br>0 Workers in " . $row['name'] . "<br>");
            }
            echo "Facility #$x";
            echo "<table>
            <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Web Address</th>
            <th>Facility Type</th>
            <th>Accept method</th>
            
            
            <tr>";

            //checks if webpage is available or not 
            if (isset($row['webAddress'])) {

                // print the info of the facilities with available webaddress

                echo "<tr>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['webAddress'] . "</td>
                    <td>" . $row['type'] . "</td>
                    <td>" . $row['acceptMethod'] . "</td>
                <tr>";
            } else {

                // print the info of the facilities with no webaddress
                echo "<tr>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>N/A</td>
                    <td>" . $row['type'] . "</td>
                    <td>" . $row['acceptMethod'] . "</td>
                <tr>";
            }
            echo "</table>";
        }
    } else {

        // no available facilities 
        echo ("0 facilities found ");
    }
}
?>
<div id='listFacilities' style='display: none'>
    <?php
    $mysqli = MysqlConnection::getInstance()->getMysqli();
    listOfAllFacilites($mysqli) ?>
</div>