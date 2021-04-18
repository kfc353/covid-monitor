<?php require_once './repository/RegionRepository.php' ?>
<div id='regionCRUD' style='display: none'>
    <div id='regionCreate' style='display: none'>
        <form action='' method='post' id="regionCreateForm">
            <div class='adminSearchForm'>

                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='regionNameCreate'>Region Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='regionNameCreate' name='regionNameCreate'>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                    <button form='regionCreateForm'>Create</button>

                    </div>

                </div>
            </div>

        </form>
    </div>
    <div id='regionRemove' style='display: none;'>
        <form action='' method="post" id="regionRemoveForm">
            <p style='text-align: center; color: red;'>Enter the name of the region that you want to remove</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='regionNameRemove'>Region Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='regionNameRemove' name='regionNameRemove'>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='regionRemoveForm'>Remove</button>

                    </div>

                </div>
            </div>

        </form>
    </div>

    <div id='regionUpdate' style='display: none;'>
        <form action='' method="post" id="regionUpdateForm">
            <p style='text-align: center; color: red;'>Enter the name of the region that you wish to update</h3>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='regionNameUpdate'>Region Name</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='regionNameUpdate' name='regionNameUpdate'>
                    </div>
                </div>

                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='regionUpdateForm'>Update</button>

                    </div>

                </div>
            </div>

        </form>
    </div>

</div>