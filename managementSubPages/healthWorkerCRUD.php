<?php include './repository/HealthWorkerRepository.php' ?>
<?php

//$allWorkersArray = HealthWorkerRepository::findAll();
/*echo "<table>";
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
echo "</table>";*/ ?>
<div id='healthWorkerCRUD' style='display: none'>

    <div id='healthWorkerCreate' style='display: none'>
        <form action='' method='post' id="healthWorkerCreateForm">
            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='medicareNum'>Medicare Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='medicareNum' name='medicareNum' placeholder='AAAA00000000' required pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='firstName'>First Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='firstName' name='firstName' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='lastName'>Last Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='lastName' name='lastName' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='dateOfBirth'>Date of Birth</label>

                    </div>
                    <div class='formRightCol'>
                        <input type='date' id='dateOfBirth' name='dateOfBirth' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='phoneNumber'>Phone Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='phoneNumber' name='phoneNumber' placeholder='1-(123)123-1234' required pattern="^[0-9]{1,3}\-\([0-9]{3}\)[0-9]{3}\-[0-9]{4}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='address'>Address</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='address' name='address' placeholder='(ex. 123, 4th avenue)' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='province'>Province</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='province' name='province' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='citizenship'>Citizenship</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='citizenship' name='citizenship' placeholder='ex. Canadian' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='email'>Email address</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='email' name='email' placeholder='ex. youremail@email.com' required pattern="^\w{1,}@\w{1,}\.\w{1,}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='motherMedicareNum'>Mother's medicare number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='motherMedicareNum' name='motherMedicareNum' placeholder='AAAA00000000' pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='fatherMedicareNum'>Father's medicare number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='fatherMedicareNum' name='fatherMedicareNum' placeholder='AAAA00000000' pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>

                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>

                        <button form='healthWorkerCreateForm'>Create</button>
                    </div>

                </div>

            </div>

        </form>
    </div>
    <div id='healthWorkerRemove' style='display: none;'>
        <form action='' method="post" id="healthWorkerRemoveForm">
            <p style='text-align: center; color: red;'>Enter the medicare number of the health care worker you wish to remove</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='medicareNumRemove'>Medicare Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='medicareNumRemove' name='medicareNumRemove' placeholder='AAAA00000000' 
                        required pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='healthWorkerRemoveForm'>Remove</button>

                    </div>

                </div>
            </div>

        </form>
    </div>
    <div id='healthWorkerUpdate' style='display: none;'>
    <form action='' method="post" id="personUpdateForm">
            <p style='text-align: center; color: red;'>Enter the medicare number of the person you wish to update</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='medicareNumRemove'>Medicare Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='medicareNumUpdate' name='medicareNumUpdate' placeholder='AAAA00000000' 
                        required pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='personUpdateForm'>Find</button>

                    </div>

                </div>
            </div>

        </form>
    </div>


</div>