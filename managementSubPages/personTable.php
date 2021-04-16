<?php require_once "repository/PersonRepository.php" ?>
<?php
/*
$allPeopleArray = PersonRepository::findAll();
echo "<table>";
foreach ($allPeopleArray as $aPerson) {
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
*/

echo "<div id='personTable' style='display: none'>";

echo "
<form action='' method='POST'>
    <div class='adminSearchForm'>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='medicareNum'>Medicare Number</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='medicareNum' name='medicareNum' placeholder='AAAA 0000 0000 0000'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='firstName'>First Name</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='firstName' name='firstName'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='lastName'>Last Name</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='lastName' name='lastName'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='dateOfBirth'>Date of Birth</label>

            </div>
            <div class='formRightCol'>
                <input type='date' id='dateOfBirth' name='dateOfBirth'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='phoneNumber'>Phone Number</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='phoneNumber' name='phoneNumber' placeholder='1-(123)123-1234'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='address'>Address</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='address' name='address' placeholder='(ex. 123, 4th avenue)'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='province'>Province</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='province' name='province'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='citizenship'>Citizenship</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='citizenship' name='citizenship' placeholder='ex. Canadian'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='email'>Email address</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='email' name='email' placeholder='ex. youremail@email.com'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='motherMedicareNum'>Mother's medicare number</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='motherMedicareNum' name='motherMedicareNum'>
            </div>
        </div>
        <div class='formRow'>
            <div class='formLeftCol'>
                <label for='fatherMedicareNum'>Father's medicare number</label>
            </div>
            <div class='formRightCol'>
                <input type='text' id='fatherMedicareNum' name='fatherMedicareNum'>
            </div>
        </div>
        
        <div class='formRow'>
        <div class='formLeftCol'>
        </div>

        <div class='formRightCol'>

            <input type='submit'>
            </div>

        </div>

    </div>

</form>
";
echo "</div>";