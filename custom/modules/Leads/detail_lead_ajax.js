$(document).ready(function() {
    var lead_id = $('#lead_id').val();
    $("#tab-actions").css({
        "cursor": "pointer",
        "background-color": "#f08377",
        "color": "#fff",
        "border-color": "#f08377",
        "border-bottom": "#fa988d",
        "font-size": "13px",
        "font-weight": "400",
        "margin": "0 2px 0 2px",
        "letter-spacing": "2px",
        "line-height": "10px",
    })

    $("#tab-actions").click(function (){
        window.location.href=`index.php?module=Leads&return_module=Leads&action=EditView&record=${lead_id}`;
    })
})