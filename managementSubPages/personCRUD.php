<?php require_once "repository/PersonRepository.php" ?>
<?php 
    if(isset($_POST['medicareNumCreate'])){
        $array['medicareNum'] = $_POST['medicareNumCreate'];
        $array['firstName'] = $_POST['firstNameCreate'];
        $array['lastName'] = $_POST['lastNameCreate'];
        $array['dateOfBirth'] = $_POST['dateOfBirthCreate'];
        $array['phoneNum'] = $_POST['phoneNumberCreate'];
        $array['address'] = $_POST['addressCreate'];
        $array['province'] = $_POST['provinceCreate'];
        $array['citizenship'] = $_POST['citizenshipCreate'];
        $array['email'] = $_POST['emailCreate'];
        if(!($_POST['motherMedicareNumCreate'] == null)){
            $array['motherMedicareNum'] = $_POST['motherMedicareNumCreate'];
        } 
        if(!($_POST['fatherMedicareNumCreate'] == null)){
            $array['fatherMedicareNum'] = $_POST['fatherMedicareNumCreate'];
        }

      
        $createdPerson = new Person($array);
        PersonRepository::save($createdPerson);

      
    } elseif(isset($_POST['medicareNumRemove'])){
        $medicareNum = $_POST['medicareNumRemove'];
        PersonRepository::deleteByMedicareNum($medicareNum);

    } elseif(isset($_POST['medicareNumUpdate'])){
        $array['medicareNum'] = $_POST['medicareNumUpdate'];
        $array['firstName'] = $_POST['firstNameUpdate'];
        $array['lastName'] = $_POST['lastNameUpdate'];
        $array['dateOfBirth'] = $_POST['dateOfBirthUpdate'];
        $array['phoneNum'] = $_POST['phoneNumberUpdate'];
        $array['address'] = $_POST['addressUpdate'];
        $array['province'] = $_POST['provinceUpdate'];
        $array['citizenship'] = $_POST['citizenshipUpdate'];
        $array['email'] = $_POST['emailUpdate'];
        if(!($_POST['motherMedicareNumUpdate'] == null)){
            $array['motherMedicareNum'] = $_POST['motherMedicareNumUpdate'];
        } 
        if(!($_POST['fatherMedicareNumUpdate'] == null)){
            $array['fatherMedicareNum'] = $_POST['fatherMedicareNumUpdate'];
        }
        $updatedPerson = new Person($array);
        PersonRepository::updateByMedicareNum($updatedPerson);
    }

?>

<div id='personCRUD' style='display: none'>
    <div id='personCreate' style='display: none'>
        <form action='' method='post' id='personCreateForm'>
            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='medicareNumCreate'>Medicare Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='medicareNumCreate' name='medicareNumCreate' placeholder='AAAA00000000' required pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='firstNameCreate'>First Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='firstNameCreate' name='firstNameCreate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='lastNameCreate'>Last Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='lastNameCreate' name='lastNameCreate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='dateOfBirthCreate'>Date of Birth</label>

                    </div>
                    <div class='formRightCol'>
                        <input type='date' id='dateOfBirthCreate' name='dateOfBirthCreate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='phoneNumberCreate'>Phone Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='phoneNumberCreate' name='phoneNumberCreate' placeholder='1-(123)123-1234' required pattern="^[0-9]{1,3}\-\([0-9]{3}\)[0-9]{3}\-[0-9]{4}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='addressCreate'>Address</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='addressCreate' name='addressCreate' placeholder='(ex. 123, 4th avenue)' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='provinceCreate'>Province</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='provinceCreate' name='provinceCreate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='citizenshipCreate'>Citizenship</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='citizenshipCreate' name='citizenshipCreate' placeholder='ex. Canadian' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='emailCreate'>Email address</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='emailCreate' name='emailCreate' placeholder='ex. youremail@email.com'
                        required pattern="^\w{1,}@\w{1,}\.\w{1,}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='motherMedicareNumCreate'>Mother's medicare number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='motherMedicareNumCreate' name='motherMedicareNumCreate' placeholder='AAAA00000000'  pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='fatherMedicareNumCreate'>Father's medicare number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='fatherMedicareNumCreate' name='fatherMedicareNumCreate' placeholder='AAAA00000000'  pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>

                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>

                        <button form='personCreateForm'>Create</button>
                    </div>

                </div>

            </div>

        </form>
    </div>

    <div id='personRemove' style='display: none;'>
        <form action='' method="post" id="personRemoveForm">
            <p style='text-align: center; color: red;'>Enter the medicare number of the person you wish to remove</h3>

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
                        <button form='personRemoveForm'>Remove</button>

                    </div>

                </div>
            </div>

        </form>
    </div>

    <div id='personUpdate' style='display: none'>
        <form action='' method='post' id='personUpdateForm'>
            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='medicareNumUpdate'>Medicare Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='medicareNumUpdate' name='medicareNumUpdate' placeholder='AAAA00000000' required pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='firstNameUpdate'>First Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='firstNameUpdate' name='firstNameUpdate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='lastNameUpdate'>Last Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='lastNameUpdate' name='lastNameUpdate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='dateOfBirthUpdate'>Date of Birth</label>

                    </div>
                    <div class='formRightCol'>
                        <input type='date' id='dateOfBirthUpdate' name='dateOfBirthUpdate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='phoneNumberUpdate'>Phone Number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='phoneNumberUpdate' name='phoneNumberUpdate' placeholder='1-(123)123-1234' required pattern="^[0-9]{1,3}\-\([0-9]{3}\)[0-9]{3}\-[0-9]{4}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='addressUpdate'>Address</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='addressUpdate' name='addressUpdate' placeholder='(ex. 123, 4th avenue)' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='provinceUpdate'>Province</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='provinceUpdate' name='provinceUpdate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='citizenshipUpdate'>Citizenship</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='citizenshipUpdate' name='citizenshipUpdate' placeholder='ex. Canadian' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='emailUpdate'>Email address</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='emailUpdate' name='emailUpdate' placeholder='ex. youremail@email.com'
                        required pattern="^\w{1,}@\w{1,}\.\w{1,}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='motherMedicareNumUpdate'>Mother's medicare number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='motherMedicareNumUpdate' name='motherMedicareNumUpdate' placeholder='AAAA00000000'  pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='fatherMedicareNumUpdate'>Father's medicare number</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='fatherMedicareNumUpdate' name='fatherMedicareNumUpdate' placeholder='AAAA00000000'  pattern="[A-Z]{4}[0-9]{8}">
                    </div>
                </div>

                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>

                        <button form='personUpdateForm'>Update</button>
                    </div>

                </div>

            </div>

        </form>
    </div>

</div>