// displays the appropriate information based on the query
function createEntry() {
    hideAllOperations();
    var selectedOption = document.getElementById("managementSelect").value;
    switch (selectedOption) {
        case "person":
            var personCreate = document.getElementById("personCreate");
            personCreate.style.display = 'block';
            console.log("person");
            break;
        case "pubHealthWorker":
            var healthWorkerCreate = document.getElementById("healthWorkerCreate");
            healthWorkerCreate.style.display = 'block';
            console.log("pubHealthWorker");
            break;
        case "facility":
            var facilityCreate = document.getElementById("facilityCreate");
            facilityCreate.style.display = 'block';
            console.log("facility");
            break;
        case "region":
            var regionCreate = document.getElementById("regionCreate");
            regionCreate.style.display = 'block';
            console.log("region");
            break;
        case "groupZone":
            var groupZoneCreate = document.getElementById("groupZoneCreate");
            groupZoneCreate.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationCRUD = document.getElementById("recommendationCreate");
            recommendationCRUD.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            console.log("address");
            break;
        default:
            alert("Please select a category first.");
            break;
    }
}

// removes selected entries
function removeEntry() {
    hideAllOperations();
    var selectedOption = document.getElementById("managementSelect").value;
    switch (selectedOption) {
        case "person":
            var personRemove = document.getElementById("personRemove");
            personRemove.style.display = 'block';
            console.log("person");
            break;
        case "pubHealthWorker":
            var healthWorkerRemove = document.getElementById("healthWorkerRemove");
            healthWorkerRemove.style.display = 'block';
            console.log("pubHealthWorker");
            break;
        case "facility":
            var facilityRemove = document.getElementById("facilityRemove");
            facilityRemove.style.display = 'block';
            console.log("facility");
            break;
        case "region":
            var regionRemove = document.getElementById("regionRemove");
            regionRemove.style.display = 'block';
            console.log("region");
            break;
        case "groupZone":
            var groupZoneRemove = document.getElementById("groupZoneRemove");
            groupZoneRemove.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationRemove = document.getElementById("recommendationRemove");
            recommendationRemove.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            console.log("address");
            break;
        default:
            alert("Please select a category first.");
            break;

    }
}


// 
function updateEntry() {
    hideAllOperations();
    var selectedOption = document.getElementById("managementSelect").value;
    switch (selectedOption) {
        case "person":
            var personUpdate = document.getElementById("personUpdate");
            personUpdate.style.display = 'block';
            console.log("person");
            break;
        case "pubHealthWorker":
            var healthWorkerUpdate = document.getElementById("healthWorkerUpdate");
            healthWorkerUpdate.style.display = 'block';
            console.log("pubHealthWorker");
            break;
        case "facility":
            var facilityUpdate = document.getElementById("facilityUpdate");
            facilityUpdate.style.display = 'block';
            console.log("facility");
            break;
        case "region":
            var regionUpdate = document.getElementById("regionUpdate");
            regionUpdate.style.display = 'block';
            console.log("region");
            break;
        case "groupZone":
            var groupZoneUpdate = document.getElementById("groupZoneUpdate");
            groupZoneUpdate.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationUpdate = document.getElementById("recommendationUpdate");
            recommendationUpdate.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            console.log("address");
            break;
        default:
            alert("Please select a category first.");
            break;
    }
}

// displays the selected option's management prompts
function displayManagementPage() {
    var selectedOption = document.getElementById("managementSelect").value;
    hideAllManagement();
    hideAllOperations();
    switch (selectedOption) {
        case "person":
            var personCRUD = document.getElementById("personCRUD");
            personCRUD.style.display = 'block';
            console.log("person");
            break;
        case "pubHealthWorker":
            var healthWorkerCRUD = document.getElementById("healthWorkerCRUD");
            healthWorkerCRUD.style.display = 'block';
            console.log("pubHealthWorker");
            break;
        case "facility":
            var facilityCRUD = document.getElementById("facilityCRUD");
            facilityCRUD.style.display = 'block';
            console.log("facility");
            break;
        case "region":
            var regionCRUD = document.getElementById("regionCRUD");
            regionCRUD.style.display = 'block';
            console.log("region");
            break;
        case "groupZone":
            var groupZoneCRUD = document.getElementById("groupZoneCRUD");
            groupZoneCRUD.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationCRUD = document.getElementById("recommendationCRUD");
            recommendationCRUD.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            console.log("address");
            break;
    }
}

// displays the results of the selected query
function displayDatabaseSearch() {
    var selectedOption = document.getElementById("dbSearches").value;
    hideAllDbSearches();
    switch (selectedOption) {
        case "facilities":
            var listFacilities = document.getElementById("listFacilities");
            listFacilities.style.display = 'block';
            console.log("facilities");
            break;
        case "regions":
            var listRegions = document.getElementById("listRegions");
            listRegions.style.display = 'block';
            console.log("regions");
            break;
        case "peopleAtAddress":
            var listPeopleAtAddress = document.getElementById("listPeopleAtAddress");
            listPeopleAtAddress.style.display = 'block';
            console.log("peopleAtAddress");
            break;
        case "workersAtFacility":
            var listWorkersAtFacility = document.getElementById("listWorkersAtFacility");
            listWorkersAtFacility.style.display = 'block';
            console.log("workersAtFacility");
            break;
        case "positiveWorkers":
            var listPositiveWorkers = document.getElementById("listPositiveWorkers");
            listPositiveWorkers.style.display = 'block';
            console.log("positiveWorkers");
            break;
        case "regionReport":
            var reportForRegions = document.getElementById("reportForRegions");
            reportForRegions.style.display = 'block';
            console.log("regionReport");
            break;
        case "messages":
            var listMessagesOfTimeframe = document.getElementById("listMessagesOfTimeframe");
            listMessagesOfTimeframe.style.display = 'block';
            console.log("messages");
            break;
    }
}

function displayAlertsMessagesPage() {
    var selectedOption = document.getElementById("alertsAndMessages").value;
    hideAllAlertsAndMessages();
    switch (selectedOption) {
        case "setAlert":
            var setAlertDiv = document.getElementById("setAlertDiv");
            setAlertDiv.style.display = 'block';
            console.log("setAlert");
            break;
        case "createMessageForPositive":
            var createMessageForPositiveDiv = document.getElementById("createMessageForPositiveDiv");
            createMessageForPositiveDiv.style.display = 'block';
            console.log("create message for positive");
            break;
        case "followUpForm":
            var followUpFormDiv = document.getElementById("followUpFormDiv");
            followUpFormDiv.style.display = 'block';
            console.log("follow up form");
            break;
        case "symptomProgress":
            var symptomProgressDiv = document.getElementById("symptomProgressDiv");
            symptomProgressDiv.style.display = 'block';
            console.log("syptomProgress");
            break;
        case "createTables":
            var createTablesDiv = document.getElementById("createTablesDiv");
            createTablesDiv.style.display = 'block';
            console.log("create tables");
            break;
    }
}

function hideAllAlertsAndMessages() {
    document.getElementById("setAlertDiv").style.display = 'none';
    document.getElementById("createMessageForPositiveDiv").style.display = 'none';
    document.getElementById("followUpFormDiv").style.display = 'none';
    document.getElementById("symptomProgressDiv").style.display = 'none';
    document.getElementById("createTablesDiv").style.display = 'none';
}

// hides all tables
function hideAllManagement() {
    document.getElementById("personCRUD").style.display = 'none';
    document.getElementById("healthWorkerCRUD").style.display = 'none';
    document.getElementById("facilityCRUD").style.display = 'none';
    document.getElementById("regionCRUD").style.display = 'none';
    document.getElementById("groupZoneCRUD").style.display = 'none';
    document.getElementById("recommendationCRUD").style.display = 'none';
}

function hideAllDbSearches() {
    document.getElementById("listFacilities").style.display = 'none';
    document.getElementById("listRegions").style.display = 'none';
    document.getElementById("listPeopleAtAddress").style.display = 'none';
    document.getElementById("listWorkersAtFacility").style.display = 'none';
    document.getElementById("listPositiveWorkers").style.display = 'none';
    document.getElementById("reportForRegions").style.display = 'none';
    document.getElementById("listMessagesOfTimeframe").style.display = 'none';

}

function hideAllOperations() {
    document.getElementById("personCreate").style.display = 'none';
    document.getElementById("personRemove").style.display = 'none';
    document.getElementById("personUpdate").style.display = 'none';
    document.getElementById("healthWorkerCreate").style.display = 'none';
    document.getElementById("healthWorkerRemove").style.display = 'none';
    document.getElementById("healthWorkerUpdate").style.display = 'none';
    document.getElementById("facilityCreate").style.display = 'none';
    document.getElementById("facilityRemove").style.display = 'none';
    document.getElementById("facilityUpdate").style.display = 'none';
    document.getElementById("regionCreate").style.display = 'none';
    document.getElementById("regionRemove").style.display = 'none';
    document.getElementById("regionUpdate").style.display = 'none';
    document.getElementById("recommendationCreate").style.display = 'none';
    document.getElementById("recommendationRemove").style.display = 'none';
    document.getElementById("recommendationUpdate").style.display = 'none';
    document.getElementById("groupZoneCreate").style.display = 'none';
    document.getElementById("groupZoneRemove").style.display = 'none';
    document.getElementById("groupZoneUpdate").style.display = 'none';
}
