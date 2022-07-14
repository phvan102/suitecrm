{literal}
    <style>
        #thead-report-campaign {
            background-color: rgb(64, 51, 189);
            color: #ffffff;
        }
    </style>
{/literal}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script>
<h2>{$TITLE}</h2>
<div class="row">
    <div class="col-lg-6 col-xs-6">
        <!-- Dropdown -->
        <select id='selectCampaign' style='width: 200px;'>
        </select>

        <input type='button' value={$FILTER_CAMPAIGN} id='filter'>
    </div>

    <div class="col-lg-6 col-xs-6">
        <input type='button' value={$EXPORT_REPORT} id='export'>
    </div>
</div>

<div class="row">
    <table class="table table-bordered" id="show-report-campaign">
        <thead id="thead-report-campaign">
            <tr>
                <th scope="col">{$STT}</th>
                <th scope="col">{$USER}</th>
                <th scope="col">{$CAMPAIGN}</th>
                <th scope="col">{$ASSIGNED_QUANTITY}</th>
                <th scope="col">{$CALLED_QUANTITY}</th>
                <th scope="col">{$NOT_CALL_YET_QUANTIRY}</th>
                <th scope="col">{$PERCENT}</th>
                <th scope="col">{$NEVER_CONTACT}</th>
                <th scope="col">{$CONTACTED}</th>
                <th scope="col">{$INTEREST}</th>
                <th scope="col">{$ARGREED}</th>
                <th scope="col">{$REFUSE}</th>
            </tr>
        </thead>
        <tbody id="data">
        </tbody>
    </table>
</div>

<br />
<div id='result'></div>

{literal}
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: "index.php?module=Leads&entryPoint=get_campaign",
                success: function(data) {
                    $('#selectCampaign').html(data)
                },
            });

            // Initialize select2
            $("#selectCampaign").select2();
            // Read selected option
            $('#filter').click(function() {
                var campaign_name = $('#selectCampaign option:selected').text();
                var campaign_id = $('#selectCampaign').val();
                $.ajax({
                url: "index.php?module=Leads&entryPoint=get_quantity_leads",
                data: {id_campaign: campaign_id},
                success: function(data) {
                    var res = $.parseJSON(data);
                    console.log(res)
                },
            });

            });
        });
    </script>
{/literal}