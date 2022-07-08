<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');

if (isset($_GET['data'])){
    $call_log_leads = $_GET['data'];
    $user_call = $call_log_leads['user_id'];
    $lead_name = $call_log_leads['lead_id'];
    $call_status = $call_log_leads['call_status_id'];
    $description_call_status = $call_log_leads['description_call_status_id'];
    $call_date = date('Y-m-d H:i:s');
    $query = "INSERT INTO call_log_leads (user_call, lead_name, call_date, call_status, description_call_status) VALUES ('{$user_call}', '{$lead_name}', '{$call_date}', '{$call_status}', '{$description_call_status}')";
    $GLOBALS['db']->query($query);
}