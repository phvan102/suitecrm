function getStatesFromDb(lead) {
    console.log(lead);
    $.ajax({
        url: "index.php?module=Leads&entryPoint=LeadCallStatus&case=1",
        data: 'id='+country.selectedIndex,
        success: function(data){
            console.log(data);
            $("#call_status_description_lead").html(data);
        },
        dataType: 'html'
    });
}