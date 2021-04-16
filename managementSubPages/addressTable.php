<?php
echo "<div id='addressTable' style='display: none'>";

        $allPeopleArray = PersonRepository::findAll();
        echo "<table>";
        foreach($allPeopleArray as $aPerson){
            echo "<tr>";
            $medicare = $aPerson->getMedicareNum();
            echo "<td>$medicare</td>";
            $firstName = $aPerson->getFirstName();
            echo "<td>$firstName</td>";
            $lastName = $aPerson->getLastName();
            echo "<td>$lastName</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";




        