<?php include './repository/HealthWorkerRepository.php'?>
<?php
echo "<div id='healthWorkerCRUD' style='display: none'>";

$allWorkersArray = HealthWorkerRepository::findAll();
echo "<table>";
foreach ($allWorkersArray as $aWorker) {
    echo "<tr>";
    $medicare = $aWorker->getMedicareNum();
    echo "<td>$medicare</td>";
    $firstName = $aWorker->getFirstName();
    echo "<td>$firstName</td>";
    $lastName = $aWorker->getLastName();
    echo "<td>$lastName</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
