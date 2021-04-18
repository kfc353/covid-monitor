<?php require_once "repository/RecommendationRepository.php";
if(isset($_POST['recommendationCreateText'])){
    RegionRepository::save($_POST['recommendationCreateText']);
} elseif(isset($_POST['recommendationIDRemove'])){
    $recommendationIDRemove = $_POST['recommendationIDRemove'];
    RecommendationRepository::deleteByRecommendationId($recommendationIDRemove);

} elseif(isset($_POST['recommendationIDUpdate'])){
    $oldRegionName = $_POST['regionNameUpdate'];
    $newRegionName = $_POST['newRegionName'];
    RegionRepository::update($oldRegionName, $newRegionName);
}
?>


<div id='recommendationCRUD' style='display: none'>
    <div id='recommendationCreate' style='display: none'>
        <form action='' method='post' id='recommendationCreateForm'>
            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='recommendationCreateText'>Recommendation</label>
                    </div>
                    <div class='formRightCol'>
                        <textarea id="recommendationCreateText" rows="10" cols="50"></textarea>
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>

                        <button form='recommendationCreateForm'>Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id='recommendationRemove' style='display: none;'>
        <form action='' method="post" id="recommendationRemoveForm">
            <p style='text-align: center; color: red;'>Enter the recommendation # you wish to remove</p>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='recommendationIDRemove'>Recommendation #</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='recommendationIDRemove' name='recommendationIDRemove' required pattern="^[0-9]{1,}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='recommendationRemoveForm'>Remove</button>

                    </div>

                </div>
            </div>

        </form>
    </div>
    <div id='recommendationUpdate' style='display: none;'>
        <form action='' method="post" id="recommendationUpdateForm">
            <p style='text-align: center; color: red;'>Enter the recommendation # you wish to update</p>

            <div class='adminSearchForm'>
                <div class='formRow'>
                    <div class='formLeftCol'>
                        <label for='recommendationIDUpdate'>Recommendation #</label>
                    </div>
                    <div class='formRightCol'>
                        <input type='text' id='recommendationIDUpdate' name='recommendationIDUpdate' required pattern="^[0-9]{1,}$">
                    </div>
                </div>
                <div class='formRow'>
                    <div class='formLeftCol'>
                    </div>

                    <div class='formRightCol'>
                        <button form='recommendationUpdateForm'>Update</button>

                    </div>

                </div>
            </div>

        </form>
    </div>

</div>