$(document).ready(function() {
    var call_status_lead_id = $('#call_status_lead option:selected').val();
    var call_status_description_lead_id = $('#call_status_description_id').val();
    $(window).resize(function () {
        if ($('#call_status_description_lead').length) {
            let width_call_status_description_lead = $('#phone_mobile').width().toString() + "px";
            $('#call_status_description_lead').css("width", width_call_status_description_lead);
        }
    })
    $.ajax({
        url: "index.php?module=Leads&entryPoint=LeadCallStatus&case=1",
        data: {id: call_status_lead_id, call_status_description_lead_id: call_status_description_lead_id},
        success: function(data){
            console.log(data);
            $("#call_status_description_lead").html(data);
            let width_call_status_description_lead = $('#phone_mobile').width().toString() + "px";
            $('#call_status_description_lead').css("width", width_call_status_description_lead);
            
        },
        dataType: 'html'
    });
    $('#call_status_lead').change(function() {
        var call_status_lead_id = $('#call_status_lead option:selected').val();
        var call_status_description_lead_id = $('#call_status_description_id').val();
        console.log(call_status_description_lead_id)
        $.ajax({
            url: "index.php?module=Leads&entryPoint=LeadCallStatus&case=1",
            data: {id: call_status_lead_id, call_status_description_lead_id: call_status_description_lead_id},
            success: function(data){
                //console.log(data);
                $("#call_status_description_lead").html(data);
                let width_call_status_description_lead = $('#phone_mobile').width().toString() + "px";
                $('#call_status_description_lead').css("width", width_call_status_description_lead);
            },
            dataType: 'html'
        });
    });

    //$('#SAVE').click(function(){
    //    var call_status_lead = $('#call_status_lead option:selected').val();
    //    var call_status_description_lead = $('#call_status_description_lead option:selected').val();
    //    var user_id = $('#user_id').val();
    //    var lead_id = $('#lead_id').val();
    //    $.ajax({
    //        url: "index.php?module=Leads&entryPoint=call_log_leads",
    //        data: {user_id: user_id, lead_id: lead_id, call_status_id: call_status_lead, description_call_status_id: call_status_description_lead},
    //        success: function(data) {
    //            console.log("hello");
    //        },
    //    });
    //})
});
