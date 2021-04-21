<?php require_once "../repository/MysqlConnection.php" ?>
<?php
function listOfHealthWorkersInSpecificFacility($mysqli, $specificFacility)
{

    $HealthWorkersInSpecificFacility = $mysqli->query("SELECT * FROM Person WHERE medicareNum
    IN(SELECT DISTINCT healthWorkerMedicareNum FROM Service 
    WHERE healthFacilityName IN(SELECT name from HealthFacility WHERE name='" . $specificFacility . "'))");
    echo "<h3>Workers at $specificFacility</h3>";
    // Looping through all the health workers 
    if ($HealthWorkersInSpecificFacility->num_rows > 0) {

        echo "<table>";
        echo "<tr>
        <th>Medicare Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Province</th>
        <th>Citizenship</th>
        <th>Email address</th>
        <th>Father's Name</th>
        <th>Mother's name</th>
        </tr>";

        for ($i = 0; $i < $HealthWorkersInSpecificFacility->num_rows; $i++) {
            $HealthWorkersInSpecificFacility->data_seek($i);
            $row = $HealthWorkersInSpecificFacility->fetch_assoc();
            $x = $i + 1;



            // prints out the info of the health worker 
            echo "<td>" . $row['medicareNum'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['dateOfBirth'] . "</td>";
            echo "<td>" . $row['phoneNum'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['province'] . "</td>";
            echo "<td>" . $row['citizenship'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            $motherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['motherMedicareNum'] . "'");
            $FatherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['fatherMedicareNum'] . "'");

            $motherName->data_seek($i);
            $FatherName->data_seek($i);
            $row2 = $motherName->fetch_assoc();
            $row3 = $FatherName->fetch_assoc();

            // if both mother and father are available 
            if (isset($row2) && isset($row3)) {
                echo "<td>" . $row3['firstName'] . " " . $row3['lastName'] . "</td>";
                echo "<td>" . $row2['firstName'] . " " . $row2['lastName'] . "</td>";

                // if mother is available but father isnt 
            } elseif (isset($row2) && !isset($row3)) {
                echo "<td>N/A</td>";
                echo "<td>" . $row2['firstName'] . " " . $row2['lastName'] . "</td>";


                // if father is available but mother isnt 
            } elseif (!isset($row2) && isset($row3)) {
                echo "<td>" . $row3['firstName'] . " " . $row3['lastName'] . "</td>";
                echo "<td>N/A</td>";


                // if neither mother nor father are available 
            } else {
                echo "<td>N/A</td>";
                echo "<td>N/A</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

    } else {

        echo ("0 health workers ");
    }
} ?>

<?php
$mysqli = MysqlConnection::getInstance()->getMysqli();
$specificFacility = $_POST['facility'];
echo $specificFacility;
listOfHealthWorkersInSpecificFacility($mysqli, $specificFacility);

?>