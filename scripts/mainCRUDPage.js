// displays the appropriate information based on the query
function createEntry() {
    console.log("HELLO");
}

// deletes selected entries
function deleteEntry() {

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
    switch (selectedOption) {
        case "facilities":
            console.log("facilities");
            break;
        case "regions":
            console.log("regions")
            break;
        case "peopleAtAddress":
            console.log("peopleAtAddress")
            break;
        case "workersAtFacility":
            console.log("workersAtFacility")
            break;
        case "positiveWorkers":
            console.log("positiveWorkers")
            break;
        case "regionReport":
            console.log("regionReport")
            break;
        case "messages":
            let divToEdit = document.getElementById("dbSearchPrompt");
            divToEdit.innerHTML =
            "<input id=\"fromDate\" type=\"datetime-local\"><input id=\"toDate\" type=\"datetime-local\">";
            divToEdit.style.display = "block";
            console.log("messages");
            break;
    }
}

// hides all tables
function hideAllManagement(){
    document.getElementById("personTable").style.display = 'none';
    document.getElementById("publicHealthWorkerTable").style.display = 'none';
    document.getElementById("facilityTable").style.display = 'none';
    document.getElementById("regionTable").style.display = 'none';
    document.getElementById("groupZoneTable").style.display = 'none';
    document.getElementById("recommendationTable").style.display = 'none';
    document.getElementById("addressTable").style.display = 'none';
    
}

function getFromDate(){
    let fromDateInput = document.getElementById("fromDate");
    console.log(fromDateInput.value);
}

function getToDate(){
    let toDateInput = document.getElementById("toDate");
    console.log(toDateInput.value);
}
