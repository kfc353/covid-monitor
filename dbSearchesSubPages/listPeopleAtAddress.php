<?php
require_once "repository/MysqlConnection.php";
// List of all people in a specific address (Number 11 from project guideline)
?>
<div id='listPeopleAtAddress' style='display: none'>

    <form id="listPeopleAtAddressForm" method="post">
        Address: <input name="listAddress" id="listAddress" type="text" />
        <input type="button" id="submitFormData" onClick="SubmitFormAddress();" value="Submit" />
        
    </form>
    <div id="listPeopleResults"></div>
   
</div>