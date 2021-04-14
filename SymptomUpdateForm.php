<?php

?>

<html>
<head>
	<title>Symptom Updates</title>
</head>
<body>

    <h2>Symptom Updates</h2>

    <form action="SymptomUpdate.php" method="POST"> 
    <h2>Required info</h2>

      Medicare Number: <input type="text" name="medicareNum"> <br> 
      <h3>Primary Symptoms</h3>

      Fever: <input type="checkbox" name="fever"> <br>
      Cough: <input type="checkbox" name="cough"> <br>
      Shortness of Breath/Difficulty Breathing: <input type="checkbox" name="diffBreath"> <br>
      Loss of Taste and Smell: <input type="checkbox" name="smellLoss"> <br>

      <h3>Secondary Symptoms</h3>
      Nausea: <input type="checkbox" name="nausea"> <br>
      Stomach Aches: <input type="checkbox" name="stomachAches"> <br>
      Vomiting: <input type="checkbox" name="vomit"> <br>
      Headache: <input type="checkbox" name="headache"> <br>
      Muscle Pain: <input type="checkbox" name="musclePain"> <br>
      Diarrhea: <input type="checkbox" name="diarrhea"> <br>
      Sore Throat: <input type="checkbox" name="soreThroat"> <br>

      <h3>Additional Symptoms</h3>
      Other Symptoms: <input type="text" name="other"> <br>



        <input type="hidden" name="form_submitted" value="1" />

        <input type="submit" value="Submit">

    </form>
</body>
</html>