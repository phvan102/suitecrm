<?php
    global $mod_strings, $current_user;
    $user_id = $_GET['user_id'];
    $user = BeanFactory::getBean('Users', $user_id);

    if ($user->is_admin){
        $query_get_call_log_leads = "SELECT * FROM call_log_leads ORDER BY call_date DESC";
        $result_get_call_log_leads = $GLOBALS['db']->query($query_get_call_log_leads);
        $html_row_table = "";
        $call_log_leads = array();
        $count = 0;
        while($rows = $GLOBALS['db']->fetchByAssoc($result_get_call_log_leads)){
            if ($rows['call_status_id'] == "" || $rows['call_status_id'] == NULL || ($rows['call_status_id'] == '1' && $rows['description_call_status_id'] == "") || ($rows['call_status_id'] == '1' && $rows['description_call_status_id'] == NULL)){
            }
            else {
                # code...
                $lead_id = $rows['lead_id'];
                $user_call_id = $rows['user_call_id'];
                $call_date = $rows['call_date'];
                $call_status_id = $rows['call_status_id'];
                $description_call_status_id = $rows['description_call_status_id'];
                // Get User
                $query_user = "SELECT first_name FROM users WHERE id = '{$user_call_id}' AND deleted = 0";
                $result_user = $GLOBALS['db']->query($query_user);
                $user = $GLOBALS['db']->fetchByAssoc($result_user);
    
                // Get lead
                $query_lead = "SELECT first_name FROM leads WHERE id = '{$lead_id}' AND deleted = 0";
                $result_lead = $GLOBALS['db']->query($query_lead);
                $lead = $GLOBALS['db']->fetchByAssoc($result_lead);
    
                // Get call status
                $query_call_status = "SELECT description FROM call_status_lead WHERE id = '{$call_status_id}'";
                $result_call_status = $GLOBALS['db']->query($query_call_status);
                $call_status = $GLOBALS['db']->fetchByAssoc($result_call_status);
    
                // Get call status description
                $query_call_status_description = "SELECT description FROM call_status_description_lead WHERE id = '{$description_call_status_id}'";
                $result_call_status_description = $GLOBALS['db']->query($query_call_status_description);
                $call_status_description = $GLOBALS['db']->fetchByAssoc($result_call_status_description);
                $count += 1;
                $html_row_table .= sprintf("
                    <tr>
                        <th scope='row'>{$count}</th>
                        <th scope='row' class='user'>{$user['first_name']}</th>
                        <th scope='row'>{$lead['first_name']}</th>
                        <th scope='row'>{$call_date}</th>
                        <th scope='row'>{$call_status['description']}</th>
                        <th scope='row'>{$call_status_description['description']}</th>
                    </tr>
                ");
            }
        }
    
        echo $html_row_table;
    }
    else {
        $query_get_call_log_leads = "SELECT * FROM call_log_leads WHERE user_call_id = '{$user_id}' ORDER BY call_date";
        $result_get_call_log_leads = $GLOBALS['db']->query($query_get_call_log_leads);
        $html_row_table = "";
        $call_log_leads = array();
        $count = 0;
        while($rows = $GLOBALS['db']->fetchByAssoc($result_get_call_log_leads)){
            if ($rows['call_status_id'] == "" || $rows['call_status_id'] == NULL || ($rows['call_status_id'] == '1' && $rows['description_call_status_id'] == "") || ($rows['call_status_id'] == '1' && $rows['description_call_status_id'] == NULL)){
            }
            else {
                # code...
                $lead_id = $rows['lead_id'];
                $call_date = $rows['call_date'];
                $call_status_id = $rows['call_status_id'];
                $description_call_status_id = $rows['description_call_status_id'];
                // Get User
                $query_user = "SELECT first_name FROM users WHERE id = '{$user_id}' AND deleted = 0";
                $result_user = $GLOBALS['db']->query($query_user);
                $user = $GLOBALS['db']->fetchByAssoc($result_user);
    
                // Get lead
                $query_lead = "SELECT first_name FROM leads WHERE id = '{$lead_id}' AND deleted = 0";
                $result_lead = $GLOBALS['db']->query($query_lead);
                $lead = $GLOBALS['db']->fetchByAssoc($result_lead);
    
                // Get call status
                $query_call_status = "SELECT description FROM call_status_lead WHERE id = '{$call_status_id}'";
                $result_call_status = $GLOBALS['db']->query($query_call_status);
                $call_status = $GLOBALS['db']->fetchByAssoc($result_call_status);
    
                // Get call status description
                $query_call_status_description = "SELECT description FROM call_status_description_lead WHERE id = '{$description_call_status_id}'";
                $result_call_status_description = $GLOBALS['db']->query($query_call_status_description);
                $call_status_description = $GLOBALS['db']->fetchByAssoc($result_call_status_description);
                $count += 1;
                $html_row_table .= sprintf("
                    <tr>
                        <th scope='row'>{$count}</th>
                        <th scope='row'>{$user['first_name']}</th>
                        <th scope='row'>{$lead['first_name']}</th>
                        <th scope='row'>{$call_date}</th>
                        <th scope='row'>{$call_status['description']}</th>
                        <th scope='row'>{$call_status_description['description']}</th>
                    </tr>
                ");
            }
        } 
        echo $html_row_table;
    }