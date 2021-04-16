<?php include './navbar.php' ?>
    <h1>Public Health Information & Recommendations</h1>
    <?php
    require_once 'dbconnect.php';
    $result = $mysqli->query("SELECT * FROM Recommendation");
    echo "<div class='infoAndRecommendations'>";

    // displays the latest recommendation
    $result->data_seek(0);
    $row = $result->fetch_assoc();
    echo  $row['recommendation'];

    echo "</div>";
    ?>