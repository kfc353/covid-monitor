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
            var groupZoneTable = document.getElementById("groupZoneTable");
            groupZoneTable.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationTable = document.getElementById("recommendationTable");
            recommendationTable.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            var addressTable = document.getElementById("addressTable");
            addressTable.style.display = 'block';
            console.log("address");
            break;
        default:
            alert("Please select a category first.");
            break;
    }
}

// deletes selected entries
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
            var groupZoneTable = document.getElementById("groupZoneTable");
            groupZoneTable.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationTable = document.getElementById("recommendationTable");
            recommendationTable.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            var addressTable = document.getElementById("addressTable");
            addressTable.style.display = 'block';
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
            var groupZoneTable = document.getElementById("groupZoneTable");
            groupZoneTable.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationTable = document.getElementById("recommendationTable");
            recommendationTable.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            var addressTable = document.getElementById("addressTable");
            addressTable.style.display = 'block';
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
            var groupZoneTable = document.getElementById("groupZoneTable");
            groupZoneTable.style.display = 'block';
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
            var recommendationTable = document.getElementById("recommendationTable");
            recommendationTable.style.display = 'block';
            console.log("pubHealthRecommend");
            break;
        case "address":
            var addressTable = document.getElementById("addressTable");
            addressTable.style.display = 'block';
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

// hides all tables
function hideAllManagement() {
    document.getElementById("personCRUD").style.display = 'none';
    document.getElementById("healthWorkerCRUD").style.display = 'none';
    document.getElementById("facilityCRUD").style.display = 'none';
    document.getElementById("regionCRUD").style.display = 'none';
    document.getElementById("groupZoneTable").style.display = 'none';
    document.getElementById("recommendationTable").style.display = 'none';
    document.getElementById("addressTable").style.display = 'none';
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

function hideAllOperations(){
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
}

function getFromDate() {
    let fromDateInput = document.getElementById("fromDate");
    console.log(fromDateInput.value);
}

function getToDate() {
    let toDateInput = document.getElementById("toDate");
    console.log(toDateInput.value);
}
