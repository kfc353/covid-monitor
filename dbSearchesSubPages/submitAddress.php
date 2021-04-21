<?php require_once "../repository/MysqlConnection.php" ?>
<?php
function allPeopleInSpecificAddress($mysqli, $specificAddress)
{

    $peopleInSpecificAddress = $mysqli->query("SELECT medicareNum , firstName ,lastName, dateOfBirth, phoneNum, address, citizenship, motherMedicareNum, fatherMedicareNum
    FROM Person p  
    WHERE p.address IN(SELECT address 
    FROM AddressPostalCode apc
    where apc.address='" . $specificAddress . "')");

    if ($peopleInSpecificAddress->num_rows > 0) {
        echo "<h3>People living at $specificAddress</h3>";
        echo "<table>";
        echo "<tr>
        <th>Medicare Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>Citizenship</th>
        <th>Father's Name</th>
        <th>Mother's name</th>
        </tr>";
        for ($i = 0; $i < $peopleInSpecificAddress->num_rows; $i++) {
            $peopleInSpecificAddress->data_seek($i);
            $row = $peopleInSpecificAddress->fetch_assoc();
            $x = $i + 1;
            echo "<tr>";
            // prints out the information of the person 
            echo "<td>" . $row['medicareNum'] . "</td>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['dateOfBirth'] . "</td>";
            echo "<td>" . $row['phoneNum'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['citizenship'] . "</td>";
            $motherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['motherMedicareNum'] . "'");
            $FatherName = $mysqli->query("SELECT firstName , lastName FROM Person WHERE medicareNum = '" . $row['fatherMedicareNum'] . "'");

            $motherName->data_seek($i);
            $FatherName->data_seek($i);
            $row2 = $motherName->fetch_assoc();
            $row3 = $FatherName->fetch_assoc();

            // if both mother and father available , print out their FName and Lname 
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

        // no people found in this specific address 
        echo ("0 people found ");
    }
} 
?>

<?php
$mysqli = MysqlConnection::getInstance()->getMysqli();
$address = $_POST['address'];
allPeopleInSpecificAddress($mysqli, $address);
?>