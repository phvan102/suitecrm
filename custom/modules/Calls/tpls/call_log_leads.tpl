{literal}

    <style>
        #thead-show-campaigns {
            background-color: rgb(64, 51, 189);
            color: #ffffff;
        }

        #btn-manage {
            color: #ffffff;
            background-color: #FF7F50;
            align-items: center;
            align-content: center;
            text-align: center;
        }
        #btn-manage:hover{
            background-color: #D2691E;
        }

        #count {
            background-color: aqua;
            max-width: 200px;
            align-items: center;
            align-content: center;
            text-align: center;
            margin-top: 10px;
        }

        #count_called_lead {
            background-color: #6495ED;
            max-width: 200px;
            align-items: center;
            align-content: center;
            text-align: center;
            margin-top: 10px;
        }

        #count_not_call_lead {
            background-color: #FFD700;
            max-width: 200px;
            align-items: center;
            align-content: center;
            text-align: center;
            margin-top: 10px;
        }

        #count_not_assign_lead {
            background-color: #ADFF2F;
            max-width: 200px;
            align-items: center;
            align-content: center;
            text-align: center;
            margin-top: 10px;
        }
    </style>
{/literal}

<div class="row">
    <h1>{$CALL_LOG_LEADS}</h1>
</div>

<table class="table table-bordered" id="show-history-import">
    <thead id="thead-show-campaigns">
        <tr>
            <th scope="col">{$STT}</th>
            <th scope="col">{$USER}</th>
            <th scope="col">{$LEAD}</th>
            <th scope="col">{$CALL_DATE}</th>
            <th scope="col">{$CALL_STATUS}</th>
            <th scope="col">{$CALL_STATUS_DESCRIPTION}</th>
        </tr>
    </thead>
    <tbody>
        {$DATA}
    </tbody>
</table>