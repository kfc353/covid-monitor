<?php require_once "repository/HealthFacilityRepository.php" ?>
<?php
  if(isset($_POST['facilityNameCreate']) && isset($_POST['facilityAddressCreate']) &&
  isset($_POST['facilityWebAddressCreate']) && isset($_POST['facilityTypeCreate']) &&
  isset($_POST['facilityAcceptMethod'])){
    
  }
?>
<div id='facilityCRUD' style='display: none'>



  <div id='facilityCreate' style='display: none'>
    <form action='' method='post'>
      <div class='adminSearchForm'>

        <div class='formRow'>
          <div class='formLeftCol'>
            <label for='facilityNameCreate'>Facility Name</label>
          </div>
          <div class='formRightCol'>
            <input type='text' id='facilityNameCreate' name='facilityNameCreate'>
          </div>
        </div>
        <div class='formRow'>
          <div class='formLeftCol'>
            <label for='facilityAddressCreate'>Facility Address</label>
          </div>
          <div class='formRightCol'>
            <input type='text' id='facilityAddressCreate' name='facilityAddressCreate'>
          </div>
        </div>
        <div class='formRow'>
          <div class='formLeftCol'>
            <label for='facilityWebAddressCreate'>Web Address</label>
          </div>
          <div class='formRightCol'>
            <input type='text' id='facilityWebAddressCreate' name='facilityWebAddressCreate' placeholder='ex. www.yourfacility.com'>
          </div>
        </div>
        <div class='formRow'>
          <div class='formLeftCol'>
            <label for='facilityTypeCreate'>Facility Type</label>
          </div>
          <div class='formRightCol'>
            <input type='text' id='facilityTypeCreate' name='facilityTypeCreate' placeholder='clinic, special installment, or hospital'>
          </div>
        </div>
        <div class='formRow'>
          <div class='formLeftCol'>
            <label for='facilityAcceptMethodCreate'>Test Approval Method</label>
          </div>
          <div class='formRightCol'>
            <input type='text' id='facilityAcceptMethodCreate' name='facilityAcceptMethodCreate' placeholder='walk-in or appointment'>
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
  <div id='facilityRemove' style='display: none;'>
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
  </div>

  <div id='facilityUpdate' style='display: none;'>
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
  </div>

</div>
