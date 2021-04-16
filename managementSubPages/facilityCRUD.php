
<?php require_once "repository/HealthFacilityRepository.php" ?>

<?php
echo "<div id='facilityCRUD' style='display: none'>";


echo "
<div id='facilityCreate' style='display: none'>
<form action='' method='POST'>
    <div class='adminSearchForm'>
       
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityName'>Facility Name</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityName' name='facilityName'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityAddress'>Facility Address</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityAddress' name='facilityAddress'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityWebAddress'>Web Address</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityWebAddress' name='facilityWebAddress' placeholder='ex. www.yourfacility.com'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityType'>Facility Type</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityType' name='facilityType' placeholder='clinic, special installment, or hospital'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityAcceptMethod'>Test Approval Method</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityAcceptMethod' name='facilityAcceptMethod' placeholder='walk-in or appointment'>
            </div>
        </div>
        <div class='formRow'>
        <div class='formLeftCol'>
        </div>

        <div class='formRightCol'>

            <input type='submit' value='Create'>
            </div>

        </div>

    </div>

</form>
</div>
";
echo "<div id='facilityRemove' style='display: none;'>
<form action=''>
<p style='text-align: center; color: red;'>Enter the name and address of the facility you wish to remove</h3>

    <div class='adminSearchForm'>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityNameRemove'>Facility Name</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityNameRemove' name='facilityNameRemove'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityAddressRemove'>Facility Address</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityAddressRemove' name='facilityAddressRemove' placeholder='123, 4th avenue'>
            </div>
        </div>
        <div class='formRow'>
        <div class='formLeftCol'>
        </div>

        <div class='formRightCol'>

            <input type='submit' value='Remove'>
            </div>

        </div>
        </div>
    
</form>
</div>";

echo "<div id='facilityUpdate' style='display: none;'>
<form action=''>
<p style='text-align: center; color: red;'>Enter the name and address of the facility you wish to update</h3>

    <div class='adminSearchForm'>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityNameUpdate'>Facility Name</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityNameUpdate' name='facilityNameUpdate'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='facilityAddressUpdate'>Facility Address</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='facilityAddressUpdate' name='facilityAddressUpdate' placeholder='123, 4th avenue'>
            </div>
        </div>
        <div class='formRow'>
        <div class='formLeftCol'>
        </div>

        <div class='formRightCol'>

            <input type='submit' value='Find'>
            </div>

        </div>
        </div>
    
</form>
</div>";

echo "</div>";

      /*  $allFacilitiesArray = HealthFacilityRepository::findAll();
        echo "<table>";
        foreach($allFacilitiesArray as $aFacility){
            echo "<tr>";
            $name = $aFacility->getName();
            echo "<td>$name</td>";
            $address = $aFacility->getAddress();
            echo "<td>$address</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";



*/