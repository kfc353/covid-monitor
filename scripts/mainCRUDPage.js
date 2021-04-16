// displays the appropriate information based on the query
function createEntry() {
    var selectedOption = document.getElementById("managementSelect").value;
    hideAllManagement();
    switch (selectedOption) {
        case "person":
            var personTable = document.getElementById("personTable");
            personTable.style.display = 'block';
            console.log("person");
            break;
        case "pubHealthWorker":
            var publicHealthWorkerTable = document.getElementById("publicHealthWorkerTable");
            publicHealthWorkerTable.style.display = 'block';
            console.log("pubHealthWorker");
            break;
        case "facility":
            var facilityTable = document.getElementById("facilityTable");
            facilityTable.style.display = 'block';
            console.log("facility");
            break;
        case "region":
            var regionTable = document.getElementById("regionTable");
            regionTable.style.display = 'block';
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

}


// 
function updateEntry() {

}

// displays the selected option's management prompts
function displayManagementPage() {
    var selectedOption = document.getElementById("managementSelect").value;
    hideAllManagement();
    switch (selectedOption) {
        case "person":
            var personTable = document.getElementById("personTable");
            personTable.style.display = 'block';
            console.log("person");
            break;
        case "pubHealthWorker":
            var publicHealthWorkerTable = document.getElementById("publicHealthWorkerTable");
            publicHealthWorkerTable.style.display = 'block';
            console.log("pubHealthWorker");
            break;
        case "facility":
            var facilityTable = document.getElementById("facilityTable");
            facilityTable.style.display = 'block';
            console.log("facility");
            break;
        case "region":
            var regionTable = document.getElementById("regionTable");
            regionTable.style.display = 'block';
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
    document.getElementById("personTable").style.display = 'none';
    document.getElementById("publicHealthWorkerTable").style.display = 'none';
    document.getElementById("facilityTable").style.display = 'none';
    document.getElementById("regionTable").style.display = 'none';
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

function getFromDate() {
    let fromDateInput = document.getElementById("fromDate");
    console.log(fromDateInput.value);
}

function getToDate() {
    let toDateInput = document.getElementById("toDate");
    console.log(toDateInput.value);
}
