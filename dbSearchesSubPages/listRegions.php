<?php
require_once "repository/MysqlConnection.php";
// Lists all the regions (Number 13 from project guideline)
function listOfAllRegions($mysqli)
{

    $regions = $mysqli->query("SELECT DISTINCT region FROM CityRegion");

    // looping regions
    if ($regions->num_rows > 0) {
        for ($i = 0; $i < $regions->num_rows; $i++) {

            $regions->data_seek($i);
            $row = $regions->fetch_assoc();
            $x = $i + 1;

            $cities = $mysqli->query("SELECT city FROM CityRegion WHERE region ='" . $row['region'] . "'");


            // prints out the region 
            echo nl2br("<h3>Region $x " . $row['region'] . "</h3>"); // writing into the webpage 

            //looping cities 
            if ($cities->num_rows > 0) {

                for ($k = 0; $k < $cities->num_rows; $k++) {
                    $cities->data_seek($k);
                    $row2 = $cities->fetch_assoc();
                    $y = $k + 1;

                    $postalCodes = $mysqli->query("SELECT postalCode FROM PostalCodeCity WHERE city ='" . $row2['city'] . "'");
                    // prints out the city in every region
                    echo "<table><caption>City $y:" . $row2['city'] . "</caption>";
                    // looping postalCodes
                    if ($postalCodes->num_rows > 0) {
                        echo "<tr><th>Postal Code</th></tr>";
                        for ($p = 0; $p < $postalCodes->num_rows; $p++) {
                            $postalCodes->data_seek($p);
                            $row3 = $postalCodes->fetch_assoc();
                            $z = $p + 1;
                            echo "<tr><td>" . $row3['postalCode'] . "</td></tr>";
                        }
                    } else {

                        // no postal codes are found in a specific city 
                        echo nl2br("0 Postal Codes found \n ");
                    }
                    echo "</table>";
                }
            } else {

                // no cities found in this specific region 
                echo nl2br("0 Cities found \n ");
            }
            echo "</table>";
        }
    } else {

        // no regions found 
        echo ("0 regions found ");
    }
}
?>
<div id='listRegions' style='display: none'>
    <?php
    $mysqli = MysqlConnection::getInstance()->getMysqli();

    listOfAllRegions($mysqli) ?>
</div>