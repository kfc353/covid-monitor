<?php require_once './repository/RegionRepository.php'?>
<?php
echo "<div id='regionTable' style='display: none'>";

        $allRegionsArray = RegionRepository::findAll();
        echo "<table>";
        foreach($allRegionsArray as $aRegion){
            echo "<tr>";
            $region = $aRegion->getRegion();
            echo "<td>$region</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";




        