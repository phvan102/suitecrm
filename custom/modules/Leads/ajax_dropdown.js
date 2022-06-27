$(document).ready(function() {
    var x = $('#call_status_lead option:selected').val();
        $.ajax({
            url: "index.php?module=Leads&entryPoint=LeadCallStatus&case=1",
            data: {id: x},
            success: function(data){
                console.log(data);
                $("#call_status_description_lead").html(data);
            },
            dataType: 'html'
        });
    $('#call_status_lead').change(function() {
        var call_status_lead_id = $('#call_status_lead option:selected').val();
        $.ajax({
            url: "index.php?module=Leads&entryPoint=LeadCallStatus&case=1",
            data: {id: call_status_lead_id},
            success: function(data){
                console.log(data);
                $("#call_status_description_lead").html(data);
            },
            dataType: 'html'
        });
    });

    $('#SAVE').click(function() {
        var call_status_lead = $('#call_status_lead option:selected').val();
        var call_status_description_lead = $('#call_status_description_lead option:selected').val();
        console.log(call_status_lead, call_status_description_lead);
        var _form = document.getElementById('EditView'); _form.action.value='Save'; 
        if(check_form('EditView'))
            SUGAR.ajaxUI.submitForm(_form);
        return false;
    })
});
