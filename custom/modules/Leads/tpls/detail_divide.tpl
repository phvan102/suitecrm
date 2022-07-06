{literal}

    <style>
        #table-info {
            background-color: #ffffff;
        }

        #thead-show-teamlead {
            background-color: #4169E1;
            color: #ffffff;
        }

        .btn-update {
            background-color: #1E90FF;
            color: #ffffff;
        }

        .btn-update:hover {
            background-color: #0000CD;
        }

        .btn-cancel {
            background-color: #FF0000;
            color: #ffffff;
        }

        .btn-cancel:hover {
            background-color: #FF6347;
        }
        #success {
            color:chartreuse;
        }

        #success-cancel {
            color:chartreuse;
        }
    </style>
{/literal}
<input type='hidden' id='id_campaign' value={$ID_CAMPAIGN}>
<input type='hidden' id='total_leads_not_assign' value={$COUNT_NOT_ASSIGN_LEAD}>
<h2>{$INFORMATION}</h2>
<div class='row'>
    <div class="col-lg-12 col-xs-12">
        <table class="table table-bordered" id="table-info">
            <tbody>
                <tr>
                    <th scope="row">{$CAMPAIGN}</th>
                    <td>{$CAMPAIGN_NAME}</td>
                </tr>
                <tr>
                    <th scope="row">{$STATUS}</th>
                    <td>{$STATUS_NAME}</td>
                </tr>
                <tr>
                    <th scope="row">{$START_DAY}</th>
                    <td>{$START_NAME_VALUE}</td>
                </tr>
                <tr>
                    <th scope="row">{$END_DAY}</th>
                    <td>{$END_NAME_VALUE}</td>
                </tr>
                <tr>
                    <th scope="row">{$TOTAL_LEAD}</th>
                    <td>{$COUNT_LEAD}</td>
                </tr>
                <tr>
                    <th scope="row">{$CALLED}</th>
                    <td>{$COUNT_CALLED_LEAD}</td>
                </tr>
                <tr>
                    <th scope="row">{$NOT_CALL}</th>
                    <td>{$COUNT_NOT_CALL_LEAD}</td>
                </tr>
                <tr>
                    <th scope="row">{$NOT_ASSIGN}</th>
                    <td id="count_not_assign_lead">{$COUNT_NOT_ASSIGN_LEAD}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h2>{$TITLE}</h2>
<div class="row">
    <div class="col-lg-6 col-xs-6">
        <table class="table table-bordered" id="table_assign">
            <thead id="thead-show-teamlead">
                <tr>
                    <th scope="col">{$STT}</th>
                    <th scope="col">{$USERNAME}</th>
                    <th scope="col">{$FULL_NAME}</th>
                    <th scope="col">{$QUANTITY}</th>
                </tr>
            </thead>

            <tbody>
                {$DATA_NOT_ASSIGN}
            </tbody>
        </table>
        <button type='button' class='btn btn-update' id="btn-update-assign">{$BTN_UPDATE}</button>
        <button type='button' class='btn btn-cancel' id="btn-cancel-assign">{$BTN_CANCEL}</button>
        <p id="success"></p>
    </div>
</div>

<div class="row"> 
<div class="col-lg-12 col-xs-12">
<table class="table table-bordered" id="table_assigned">
    <thead id="thead-show-teamlead">
        <tr>
            <th scope="col">{$STT}</th>
            <th scope="col">{$USERNAME}</th>
            <th scope="col">{$FULL_NAME}</th>
            <th scope="col">{$QUANTITY}</th>
            <th scope="col">{$QUANTITY_TO_CANCEL}</th>
            <th scope="col">{$MODIFIED_DATE}</th>
            <th scope="col">{$QUANTITY_TO_CANCELED}</th>
        </tr>
    </thead>
    <tbody>
        {$DATA_ASSIGNED}
    </tbody>
</table>
<button type='button' class='btn btn-update' id="btn-update-assigned">{$BTN_UPDATE}</button>
<button type='button' class='btn btn-cancel' id="btn-cancel-assigned">{$BTN_CANCEL}</button>
<p id="success-cancel"></p>
</div>
</div>

{literal}
    <script type="text/javascript">
        $('#btn-update-assign').click(function() {
            let quantity = document.getElementsByClassName('quantity');
            let arr_quantity = [...quantity].map(input => input.value);
            let id_employees = document.getElementsByClassName('id_employees');
            let arr_employee = [...id_employees].map(input => input.value);
            let total_leads_not_assign = $('#count_not_assign_lead').html();
            var res = []
            var total = 0;
            for (let i = 0; i < arr_employee.length; i++) {
                res.push({
                    id: arr_employee[i],
                    quantity: arr_quantity[i]
                })
                total += parseInt(arr_quantity[i])
            }
            //console.log(total)
            //console.log(total_leads_not_assign)
            if (parseInt(total_leads_not_assign) == 0){
                alert('Tất cả khách hàng tiềm năng đã được gán!')
            }
            else if (total == 0){
                alert('Vui lòng nhập số lượng!')
            }
            else if (total > parseInt(total_leads_not_assign)){
                alert('Số lượng nhập vượt quá quy định!')
            }
            else {
                const id_campaign = $('#id_campaign').val();
                //console.log(res);
                $.ajax({
                    url: "index.php?module=Leads&entryPoint=divide_leads",
                    data: {data: res, id_campaign: id_campaign},
                    success: function(data) {
                        var res = $.parseJSON(data);
                        //console.log(res[0]['count'])
                        $('#count_not_assign_lead').html(res[0]['count'])
                        for (let i = 0; i < arr_employee.length; i++) { 
                            let id_assigned='#' +arr_employee[i] + 'assigned' ;
                            $(id_assigned).html(res[i+1]['quantity_assigned']);
                        }
                        $('#success').html('Cập nhật thành công!')
                    },
                });
            }
        });

        $('#btn-cancel-assign').click(function() { 
            let quantity = document.getElementsByClassName('quantity');
            [...quantity].map(input => (input.value = 0))
        })

        $('#btn-update-assigned').click(function() {
            let quantity_cancel = document.getElementsByClassName('quantity_cancel');
            let arr_quantity_cancel = [...quantity_cancel].map(input => input.value);
            let id_employees = document.getElementsByClassName('id_employees_cancel');
            let arr_employee = [...id_employees].map(input => input.value);
            let res = []
            let check = 1;
            let total = 0;
            for (let i = 0; i < arr_employee.length; i++) {
                total += arr_quantity_cancel[i];
                let id_assigned = '#' + arr_employee[i] + 'assigned';
                let val_assigned = $(id_assigned).html();
                console.log(val_assigned)
                if (parseInt(val_assigned) == 0 && parseInt(arr_quantity_cancel[i]) != 0){
                    alert('Nhân viên không được gán cho bất kì lead nào!')
                    check = 0;
                    break;
                }
                else if (parseInt(arr_quantity_cancel[i]) > parseInt(val_assigned)){
                    alert('Số lượng nhập vượt quá quy định!')
                    check = 0;
                    console.log('hello')
                    break;
                }
                res.push({
                        id: arr_employee[i],
                        quantity_cancel: arr_quantity_cancel[i]
                    })
            }
            if (check == 1) {
                if (total == 0){
                    alert('Vui lòng nhập số lượng!')
                }
                else {
                    const id_campaign = $('#id_campaign').val();
                    //console.log(res);
                    $.ajax({
                        url: "index.php?module=Leads&entryPoint=divide_leads_cancel",
                        data: {data: res, id_campaign: id_campaign},
                        success: function(data) {
                            var res = $.parseJSON(data);
                            $('#count_not_assign_lead').html(res[0]['count'])
                            for (let i = 0; i < arr_employee.length; i++) { 
                                let id_assigned='#' +arr_employee[i] + 'assigned' ;
                                let id_cancel='#' +arr_employee[i] + 'quantity_cancel' ; 
                                let modified_date='#' +arr_employee[i] + 'modified_date' ;
                                $(id_assigned).html(res[i+1]['quantity_assigned']);
                                $(id_cancel).html(res[i+1]['quantity_to_cancel']);
                                $(modified_date).html(res[i+1]['date_modified']);
                            }
                            $('#success-cancel').html('Cập nhật thành công!')
                        }
                    });
                }
            }
        });

        $('#btn-cancel-assigned').click(function() { 
            let quantity = document.getElementsByClassName('quantity_cancel');
            [...quantity].map(input => (input.value = 0))
        })
    </script>
{/literal}