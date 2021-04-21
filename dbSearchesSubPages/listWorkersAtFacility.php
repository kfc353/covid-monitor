<?php
require_once "repository/MysqlConnection.php";
// List of all people in a specific address (Number 11 from project guideline)
?>
<div id='listWorkersAtFacility' style='display: none'>

    <form id="listFacilityNameForm" method="post">
        Address: <input name="listFacility" id="listFacility" type="text" />
        <input type="button" id="submitFormData" onClick="SubmitFormFacility();" value="Submit" />
        
    </form>
    <div id="listFacilityResults"></div>
   
</div>