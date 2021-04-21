<?php
//Author: A Fulleringer
//The Form to get info for updating the symptom history of a patient
// had a 127.0.0.1:3307 -> mysqlUrl:3306 port forwarding
?>

<div id="followUpFormDiv" style="display: none;">

  <h2>Symptom Updates</h2>

  <form action="alertsAndMessagesSubpages/SymptomUpdate.php" method="post">
    <h2>Required info</h2>

    Medicare Number: <input type="text" name="medicareNum"> <br>
    Password (Birthday): <input type="date" name="birthday"> <br>
    <h3>Primary Symptoms</h3>

    Fever: <input type="checkbox" Value="fever" name="symptoms[]"> <br>
    Temperature: <input type="number" Value="temperature" name="temperature"> <br>
    Cough: <input type="checkbox" Value="cough" name="symptoms[]"> <br>
    Shortness of Breath/Difficulty Breathing: <input type="checkbox" Value="diffBreathing" name="symptoms[]"> <br>
    Loss of Taste and Smell: <input type="checkbox" Value="smellLoss" name="symptoms[]"> <br>

    <h3>Secondary Symptoms</h3>
    Nausea: <input type="checkbox" Value="nausea" name="symptoms[]"> <br>
    Stomach Aches: <input type="checkbox" Value="stomachAches" name="symptoms[]"> <br>
    Vomiting: <input type="checkbox" Value="vomit" name="symptoms[]"> <br>
    Headache: <input type="checkbox" Value="headache" name="symptoms[]"> <br>
    Muscle Pain: <input type="checkbox" Value="musclePain" name="symptoms[]"> <br>
    Diarrhea: <input type="checkbox" Value="diarrhea" name="symptoms[]"> <br>
    Sore Throat: <input type="checkbox" Value="soreThroat" name="symptoms[]"> <br>

    <h3>Additional Symptoms</h3>
    Other Symptoms: <input type="text" Value="other" name="other"> <br>

    <input type="hidden" name="form_submitted" value="1" />

    <input type="submit" value="Submit">

  </form>
</div>