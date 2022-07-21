$(document).ready(function() {
    var form_data = new FormData();
    $('#files_card_image').change(function() {
        var totalfiles = document.getElementById('files_card_image').files.length;
        var regex =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        //console.log(totalfiles)
        var lst = [];
        if(totalfiles > 0 ){
            // Read selected files
            for (var index = 0; index < totalfiles; index++) {
                var image_name = document.getElementById('files_card_image').files[index].name
                if(image_name.match(regex)){
                    lst.push(document.getElementById('files_card_image').files[index]);
                    form_data.append("files[]", document.getElementById('files_card_image').files[index]);
                }
                else {
                    alert('File is invalid..')
                }
            }
        }

        //console.log(lst)
        for(var pair of form_data.entries()) {
            console.log(pair[0]+ ', '+ pair[1]); 
        }
    })
})

function handle_upload_image(){
    var totalfiles = document.getElementById('files_card_image').files.length;
    if (totalfiles == 0){
        alert('Please choose at least 1 photo!')
        return false;
    }
    var regex =  /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    var lead_id = $('#lead_id').val();
    //console.log(lead_id)
    var form_data = new FormData();
    var lst = [];
    if(totalfiles > 0 ){
        // Read selected files
        for (var index = 0; index < totalfiles; index++) {
            var image_name = document.getElementById('files_card_image').files[index].name
            if(image_name.match(regex)){
                lst.push(document.getElementById('files_card_image').files[index])
                form_data.append("files[]", document.getElementById('files_card_image').files[index]);
            }
            else {
                alert('File is invalid..')
            }
        }
    }
    form_data.append('lead_id', lead_id)
    $.ajax({
        url: "index.php?module=Leads&entryPoint=handle_upload_card_image",
        contentType: false,
		processData: false,
		data: form_data,
		type: 'post',
        success: function(data){
            alert(data);
        },
        
    });

    return true;
}

function check_form(form_name){
        //console.log(lst)
    if (handle_upload_image() == false){
        return false;
    }
    cstm_validate = validate_form(form_name,'');
    if (cstm_validate  && other_condition)
        return true;
    return false;

}