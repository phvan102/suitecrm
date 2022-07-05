{literal}

    <style>
        #table-info {
            background-color: #ffffff;
        }

        #thead-show-teamlead {
            background-color: #4169E1;
            color: #ffffff;
        }

        #btn-update {
            background-color: #1E90FF;
            color: #ffffff;
        }

        #btn-update:hover{
            background-color: #0000CD;
        }

        #btn-cancel {
            background-color: #FF0000;
            color: #ffffff;
        }

        #btn-cancel:hover{
            background-color: #FF6347;
        }
    </style>
{/literal}

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
                    <td>{$COUNT_NOT_ASSIGN_LEAD}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h2>{$TITLE}</h2>
<div class="row"> 
<div class="col-lg-6 col-xs-6">
<table class="table table-bordered" id="show-history-import">
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
<button type='button' class='btn' id="btn-update">{$BTN_UPDATE}</button>
<button type='button' class='btn' id="btn-cancel">{$BTN_CANCEL}</button>
</div>

<div class="col-lg-6 col-xs-6">
<table class="table table-bordered" id="show-history-import">
    <thead id="thead-show-teamlead">
        <tr>
            <th scope="col">{$STT}</th>
            <th scope="col">{$USERNAME}</th>
            <th scope="col">{$FULL_NAME}</th>
            <th scope="col">{$QUANTITY}</th>
            <th scope="col">{$QUANTITY_TO_CANCEL}</th>
            <th scope="col">{$QUANTITY_TO_CANCELED}</th>
        </tr>
    </thead>
    <tbody>
        {$DATA_ASSIGNED}
    </tbody>
</table>
<button type='button' class='btn' id="btn-update">{$BTN_UPDATE}</button>
<button type='button' class='btn' id="btn-cancel">{$BTN_CANCEL}</button>
</div>
</div>