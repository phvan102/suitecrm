$(document).ready(function() {
    var lead_id = $('#lead_id').val();

    $("#edit_button").click(function (){
        window.location.href=`index.php?module=Leads&return_module=Leads&action=EditView&record=${lead_id}`;
    })
})