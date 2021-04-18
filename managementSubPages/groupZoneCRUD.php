<?php require_once "repository/GroupZoneRepository.php";
if(isset($_POST['groupZoneIDCreate'])){
    $newString = $_POST['groupZoneIDCreate'];
    $newGroupZoneID = new GroupZone($newString);
    GroupZoneRepository::save($newGroupZoneID);
} elseif(isset($_POST['groupZoneIDRemove'])){
    $groupZoneID = $_POST['groupZoneIDRemove'];
    GroupZoneRepository::deleteByGroupZoneId($groupZoneID);

} elseif(isset($_POST['groupZoneIDUpdate'])){
    $oldgroupZoneID = $_POST['groupZoneIDUpdate'];
    $newgroupZoneID = $_POST['newGroupZoneID'];
    GroupZoneRepository::update($oldgroupZoneID, $newgroupZoneID);
}
?>


<div id='groupZoneCRUD' style='display: none'>
    <div id='groupZoneCreate' style='display: none'>
    <form action='' method="post" id="groupZoneCreateForm">
            <p style='text-align: center; color: red;'>Enter the Group Zone Name you wish to create</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='groupZoneIDCreate'>Group Zone Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='groupZoneIDCreate' name='groupZoneIDCreate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='groupZoneCreateForm'>Create</button>

                    </div>

                </div>
            </div>

        </form>
    </div>

    <div id='groupZoneRemove' style='display: none;'>
        <form action='' method="post" id="groupZoneRemoveForm">
            <p style='text-align: center; color: red;'>Enter the Group Zone Name you wish to remove</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='groupZoneIDRemove'>Group Zone Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='groupZoneIDRemove' name='groupZoneIDRemove' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='groupZoneRemoveForm'>Remove</button>

                    </div>

                </div>
            </div>

        </form>
    </div>
    <div id='groupZoneUpdate' style='display: none;'>
        <form action='' method="post" id="groupZoneUpdateForm">
            <p style='text-align: center; color: red;'>Enter the Group Zone Name you wish to update</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='groupZoneIDUpdate'>Group Zone Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='groupZoneIDUpdate' name='groupZoneIDUpdate' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='newGroupZoneID'>New Group Zone Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='newGroupZoneID' name='newGroupZoneID' required>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='groupZoneUpdateForm'>Update</button>

                    </div>

                </div>
            </div>

        </form>
    </div>

</div>


        