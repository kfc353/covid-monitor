<?php
//Author: A Fulleringer
//The Form for displaying a person's symptom history
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
?>


<div id="symptomProgressDiv" style="display: none;">

  <h2>Symptom Updates</h2>

  <form action="alertsAndMessagesSubPages/SymptomHistory.php" method="POST">
    <h2>Required info</h2>

    Medicare Number: <input type="text" name="medicareNum"> <br>

    <input type="hidden" name="form_submitted" value="1" />

    <input type="submit" value="Submit">

  </form>
</div>