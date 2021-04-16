<!--TODO: link to this page-->



<h1>Administrative Search Page</h1>
<!--TODO: Event Listener to display proper table-->

<fieldset id="managementFieldset">
    <legend id="searchTitle">Management</legend>
    <!--Dropdown with options of tables to look at (e.g. people, workers, etc...)-->
    <!--TODO: check if possible to populate dropdown-->
    <select name="managementSelect" id="managementSelect" onChange=displayManagementPage()>
        <option value="" disable selected hidden>Select an entity to manage</option>
        <option value="person">Person</option>
        <option value="pubHealthWorker">Public Health Worker</option>
        <option value="facility">Facility</option>
        <option value="region">Region</option>
        <option value="groupZone">Group Zone</option>
        <option value="pubHealthRecommend">Public Health Recommendation</option>
        <option value="address">Address-related tables</option>
    </select>
    <div id="buttonContainer">
        <button onClick=createEntry()>Create new entry</button>
        <button onClick=removeEntry()>Remove entry</button>
        <button onClick=updateEntry()>Update entry</button>

    </div>
    <?php include "managementSubPages/personTable.php" ?>
    <?php include "managementSubPages/publicHealthWorkerTable.php" ?>
    <?php include "managementSubPages/facilityTable.php" ?>
    <?php include "managementSubPages/regionTable.php" ?>
    <?php include "managementSubPages/groupZoneTable.php" ?>
    <?php include "managementSubPages/recommendationTable.php" ?>
    <!--TODO: adressTable.php-->
    <?php include "managementSubPages/addressTable.php" ?>
</fieldset>

<fieldset id="dbSearchesFieldset">
    <legend>Database Searches</legend>

    <select name="dbSearches" id="dbSearches" onChange=displayDatabaseSearch()>

        <option value="" disable selected hidden>Select a search</option>
        <option value="facilities">List of facilities</option>
        <option value="regions">List of all regions</option>
        <option value="peopleAtAddress">List of people at a given address</option>
        <option value="workersAtFacility">List of all workers in a specific facility</option>
        <option value="positiveWorkers">List of workers who tested positive</option>
        <option value="regionReport">Report for all regions</option>
        <option value="messages">List of all messages generated by the system within a timeframe</option>
    </select>

    <?php include "dbSearchesSubPages/listFacilities.php" ?>
    <?php include "dbSearchesSubPages/listRegions.php" ?>
    <?php include "dbSearchesSubPages/listPeopleAtAddress.php" ?>
    <?php include "dbSearchesSubPages/listWorkersAtFacility.php" ?>
    <?php include "dbSearchesSubPages/listPositiveWorkers.php" ?>
    <?php include "dbSearchesSubPages/reportForRegions.php" ?>
    <?php include "dbSearchesSubPages/listMessagesOfTimeFrame.php" ?>

</fieldset>

<fieldset id="alertsAndMessagesFieldset">
    <legend>Alerts and Messages</legend>
    <select name="alertsAndMessages" id="alertsAndMessages" onChange=displayAlertsAndMessages()>
        <option value="" disable selected hidden></option>
        <option value="setAlert">Set a new alert for a region</option>
        <option value="createMessageForAlert">Create a message for an alert</option>
        <option value="createMessageForPositive">Create a message for a positive person</option>
        <option value="followUpForm">Follow-Up Form</option>
        <option value="symptomProgress">Get Symptom Progress of a person</option>
        <option value="regionReport">Report for all regions</option>
        <option value="createTables">Create Message and Alert Table</option>
    </select>
</fieldset>

<script src="scripts/mainCRUDPage.js"></script>