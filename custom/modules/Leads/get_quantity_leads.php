<?php
if (isset($_REQUEST['id_campaign'])){
    $res = array();

    $campaign_id = $_REQUEST['id_campaign'];
    $query_campaign = "SELECT name FROM campaigns WHERE id = '{$campaign_id}'";
    $result_campaign = $GLOBALS['db']->query($query_campaign);
    $campaigns = $GLOBALS['db']->fetchByAssoc($result_campaign);
    $campaign_name = $campaigns['name'];

    $query_quantity_leads = "SELECT * FROM quantity_leads WHERE campaign_id = '{$campaign_id}'";
    $result_quantity_leads = $GLOBALS['db']->query($query_quantity_leads);
    while ($rows = $GLOBALS['db']->fetchByAssoc($result_quantity_leads)) {
        $myObj = new stdClass();
        $campaign = $campaign_name;
        $user_id = $rows['user_id'];
        $query_user = "SELECT first_name FROM users WHERE id = '{$user_id}'";
        $result_user = $GLOBALS['db']->query($query_user);
        $user = $GLOBALS['db']->fetchByAssoc($result_user);
        $user_name = $rows['user_id'];
        $myObj->campaign_name = $campaign_name;
        $myObj->user_id = $user_id;
        $myObj->user_name = $user_name;
        $myObj->quantity_assigned = $rows['quantity_assigned'];
        if (!in_array($myObj, $res)){
            $res[] = $myObj;
        }
    }

    echo json_encode($res);
}

else {
    echo 10;
}
