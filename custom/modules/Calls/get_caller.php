<?php
$query_get_call_log_leads = "SELECT * FROM call_log_leads ORDER BY call_date DESC";
$result_get_call_log_leads = $GLOBALS['db']->query($query_get_call_log_leads);
$callers = array();
while($rows = $GLOBALS['db']->fetchByAssoc($result_get_call_log_leads)){
    if ($rows['call_status_id'] == "" || $rows['call_status_id'] == NULL || ($rows['call_status_id'] == '1' && $rows['description_call_status_id'] == "") || ($rows['call_status_id'] == '1' && $rows['description_call_status_id'] == NULL)){
    }
    else {
        $myObj = new stdClass();
        $user_call_id = $rows['user_call_id'];
        $query_user = "SELECT first_name FROM users WHERE id = '{$user_call_id}'";
        $result_user = $GLOBALS['db']->query($query_user);
        $user = $GLOBALS['db']->fetchByAssoc($result_user);
        $myObj->label = $user['first_name'];
        $myObj->value = $rows['user_call_id'];
        if (!in_array($myObj, $callers)){
            $callers[] = $myObj;
        }
    }
}

echo json_encode($callers);