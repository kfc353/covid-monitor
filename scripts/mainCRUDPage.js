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
    switch (selectedOption) {
        case "person":
            console.log("person");
            break;
        case "pubHealthWorker":
            console.log("pubHealthWorker");
            break;
        case "facility":
            console.log("facility");
            break;
        case "region":
            console.log("region");
            break;
        case "groupZone":
            console.log("groupZone");
            break;
        case "pubHealthRecommend":
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
            console.log("messages")
            break;
    }
}
