<?php

?>

<html>
<head>
	<title>Diagnostic Updates</title>
</head>
<body>

    <h2>Diagnostic Updates</h2>

    <form action="Diagnostic.php" method="POST"> 
    <h2>Required info</h2>

      Person Medicare Number: <input type="text" name="personMedicareNum"> <br>
      Health Worker Medicare Number: <input type="text" name="healthWorkerMedicareNum"> <br>
      Health Facility Name <input type="text" name="facilityName"> <br>
      Date and Time of Test <input type="datetime-local" name="testDate"> <br>

      <input type="radio" name="result" value = "positive" /> Positive
      <input type="radio" name="result" value = "negative" /> Negative

        <input type="hidden" name="form_submitted" value="1" />

        <input type="submit" value="Submit">

    </form>
</body>
</html>