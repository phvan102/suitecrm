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

        #btn-manage:hover {
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

        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        #filter {
            margin-bottom: 20px;
        }

        #btn-filter {
            background-color: #1E90FF;
            color: #ffffff;
        }

        #btn-filter:hover {
            background-color: #0000CD;
        }
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
{/literal}

{$ADMIN}

<table class="table table-bordered" id="show-call-log-leads">
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
    <tbody id="data">
    </tbody>
</table>

<input type="hidden" name="user_id" id="user_id" value="{$USER_ID}">

{if $TOTAL_PAGE > 1}
    <div class="row text-center">
        <div class="pagination">
            <a href="#">&laquo;</a>
            {section name=foo loop=$TOTAL_PAGE}
                {if $ACTIVE == $smarty.section.foo.iteration}
                    <a href="#" class="active" id="number-page-{$smarty.section.foo.iteration}">{$smarty.section.foo.iteration}</a>
                {else}
                    <a href="#" id="number-page-{$smarty.section.foo.iteration}">{$smarty.section.foo.iteration}</a>
                {/if}
            {/section}
            <a href="#">&raquo;</a>
        </div>
    </div>
{/if}

<p id="test"></p>

{literal}
    <script type="text/javascript">
        $(document).ready(function() {
            var user_id = $('#user_id').val();
            var source_user_call = [];
            var source_leads = [];
            $.ajax({
                url: "index.php?module=Calls&entryPoint=get_caller",
                success: function(data) {
                    var res = $.parseJSON(data);
                    source_user_call = res;
                },
                async: false
            });

            $.ajax({
                url: "index.php?module=Calls&entryPoint=get_leads",
                success: function(data) {
                    var res = $.parseJSON(data);
                    source_leads = res;
                },
                async: false
            });

            $("#lead_name").autocomplete({
                source: source_leads,
                select: function(e, ui) {
                    $("#lead_name").val(ui.item.label);
                    $("#lead_filter_id").val(ui.item.value);
                    return false;
                }
            });

            if($('#user_call_id').length){
                $("#user_call_name").autocomplete({
                    source: source_user_call,
                    select: function(e, ui) {
                        $("#user_call_name").val(ui.item.label);
                        $("#user_call_id").val(ui.item.value);
                        return false;
                    }
                });

                $("#btn-filter").click(function(event) {
                var user_call_id = $('#user_call_id').val();
                var lead_id = $('#lead_filter_id').val();
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                console.log(start_date);
                $.ajax({
                    url: "index.php?module=Calls&entryPoint=call_log_leads_filter_paging",
                    data: {page_number: 1, user_id: user_call_id, lead_id: lead_id, start_date: start_date, end_date: end_date},
                    success: function(data) {
                        //console.log(data);
                        $('#data').html(data)
                        console.log(data)
                    }
                });
            })
            }

            else {
                $("#btn-filter").click(function(event) {
                    var lead_id = $('#lead_filter_id').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    console.log(start_date);
                    $.ajax({
                        url: "index.php?module=Calls&entryPoint=call_log_leads_filter_user_paging",
                        data: {page_number: 1, user_id: user_id, lead_id: lead_id, start_date: start_date, end_date: end_date},
                        success: function(data) {
                            //console.log(data);
                            $('#data').html(data)
                            console.log(data)
                        }
                    });
                })
            }


            $.ajax({
                url: "index.php?module=Calls&entryPoint=call_log_leads_paging",
                data: {page_number: 1, user_id: user_id},
                success: function(data) {
                    //console.log(data);
                    $('#data').html(data)
                }
            });
            $("*[id^='number-page-']").click(function(event) {
                let page_number = this.id.split(' ')[0].split('-');
                page_number = page_number[page_number.length - 1];
                //alert(user_id);
                $.ajax({
                    url: "index.php?module=Calls&entryPoint=call_log_leads_paging",
                    data: {page_number: page_number, user_id: user_id},
                    success: function(data) {
                        console.log(data);
                        $('#data').html(data)
                        $('.active').removeClass('active');
                        $("#number-page-" + page_number).addClass("active");
                    }
                });
            })
        })
    </script>
{/literal}