<?php require_once "repository/PersonRepository.php" ?>
<?php 
    if(isset($_POST['medicareNumCreate'])){
        $array['medicareNum'] = $_POST['medicareNumCreate'];
        $array['firstName'] = $_POST['firstNameCreate'];
        $array['lastName'] = $_POST['lastNameCreate'];
        $array['dateOfBirth'] = $_POST['dateOfBirthCreate'];
        $array['phoneNumber'] = $_POST['phoneNumberCreate'];
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

      
        var_dump($array);
        $createdPerson = new Person($array);
        PersonRepository::save($createdPerson);

      
    } elseif(isset($_POST['medicareNumRemove'])){

    } elseif(isset($_POST['medicareNumUpdate'])){

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

    <div id='personUpdate' style='display: none;'>
        <form action='' method="post" id="personUpdateForm">
            <p style='text-align: center; color: red;'>Enter the medicare number of the person you wish to update</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='medicareNumUpdate'>Medicare Number</label>
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