function SubmitFormAddress(){
    var address = $("#listAddress").val();
    console.log(address);
    $.post("dbSearchesSubPages/submitAddress.php", { address : address}, 
    function(address){
        $('#listPeopleResults').html(address);
        $('#listPeopleAtAddressForm')[0].reset();
    })
}

function SubmitFormFacility(){
    var facility = $("#listFacility").val();
    console.log(facility);
    $.post("dbSearchesSubPages/submitSpecificFacility.php", { facility : facility}, 
    function(facility){
        $('#listFacilityResults').html(facility);
        $('#listFacilityNameForm')[0].reset();
    })
}

function SubmitFormDateWorker(){
    var testDate = $("#testDate").val();
    console.log("this is " + testDate);
    $.post("dbSearchesSubPages/submitDateWorker.php", { testDate: testDate}, 
    function(facility){
        $('#listPositiveResults').html(facility);
        $('#listPositiveWorkersForm')[0].reset();
    })
}

function SubmitFormTimeframe(){
    var fromDate = $("#fromDate").val();
    var toDate = $("#toDate").val();
    $.post("dbSearchesSubPages/submitTimeframeMessages.php", { fromDate: fromDate, toDate:toDate}, 
    function(facility){
        $('#listTimeframeResults').html(facility);
        $('#listTimeframeForm')[0].reset();
    })
}