{literal}
    <style>
    .tab-content {
    background-color: #fff;
    padding: 24px;
    margin-bottom: 5px;
    border: 1px solid transparent;
    border-top-right-radius: 4px;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
}

        .detail-view-field {
            display: inline;
            font-size: 14px;
            font-weight: 400;
            background-color: #f5f5f5;
            color: #534d64;
            padding: 10px 10px;
            border: 1px solid transparent;
            border-radius: 4px;
            text-align: left;
            min-height: 38px;
            vertical-align: baseline;
            white-space: inherit;
        }

        .detail-view-row .label {
            display: inline;
            font-size: 14px;
            font-weight: 700;
            color: #534d64;
            padding: 0px 10px 10px 8px;
            vertical-align: baseline;
            white-space: pre-wrap;
            float: left;
            text-align: right;
        }

        .container{
            margin: 0 auto;
            width: 90%;
        }
        .main_view{
            width: 80%;
            height: 50rem;
        }
        .main_view img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .side_view{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .side_view img{
            width: 9rem;
            height: 7rem;
            object-fit: cover;
            cursor: pointer;
            margin:0.5rem;
        }
    </style>
{/literal}
<h1>{$NAME}</h1>
<div class="tab-content">
    <div class="tab-pane-NOBOOTSTRAPTOGGLER active fade in" id='tab-content-0'>
        <div class="row detail-view-row">
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_CARD_NUMBER}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$CARD_NUMBER}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_CVV}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$CVV}</span>
                </div>
            </div>
        </div>

        <div class="row detail-view-row">
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_EXPIRATION_DATE}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$EXPIRATION_DATE}</span>
                </div>
            </div>
        </div>

        <div class="row detail-view-row">
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_NAME}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$NAME}</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_PHONE_MOBILE}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$PHONE_MOBILE}</span>
                </div>
            </div>
        </div>

        <div class="row detail-view-row">
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_CARD_ID}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$CARD_ID}</span>
                </div>
            </div>
        </div>

        <div class="row detail-view-row">
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_AMOUNT_TO_ENTER_VIMO}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$AMOUNT_TO_ENTER_VIMO}</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_AMOUNT_ACTUALLY_RECEIVED}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$AMOUNT_ACTUALLY_RECEIVED}</span>
                </div>
            </div>
        </div>

        <div class="row detail-view-row">
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_TOTAL_TRANSACTIONS}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$TOTAL_TRANSACTIONS}</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_DONATION_MONTH}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$DONATION_MONTH}</span>
                </div>
            </div>
        </div>

        <div class="row detail-view-row">
            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_CONTRIBUTION_AMOUNT}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$CONTRIBUTION_AMOUNT}</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 detail-view-row-item">
                <div class="col-xs-12 col-sm-4 label ">
                    {$TITLE_BANK_ACCOUNT}
                </div>
                <div class="col-xs-12 col-sm-8 detail-view-field inlineEdit" type="varchar" field="first_name">
                    <span class="sugar_field" id="first_name">{$BANK_ACCOUNT}</span>
                </div>
            </div>
        </div>
        <div class="row">
        <!-- Main view of our gallery -->
        <div class="main_view col-lg-12">
            <img src="{$CARD_IMAGE_FIRST}" id="main" alt="IMAGE">
        </div>
 
        <!-- All images with side view -->
        <div class="side_view">
            {foreach from=$LIST_CARD_IMAGE item=foo}
                <img src="{$foo}" onclick="change(this.src)">
            {/foreach}
        </div>
    </div>
    </div>
</div>

{literal}
    <script type="text/javascript">
    const change = src => {
        document.getElementById('main').src = src

    }
    </script>
{/literal}