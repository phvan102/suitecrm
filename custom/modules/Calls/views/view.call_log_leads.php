<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/SugarView.php');

class CustomCallsViewcall_log_leads extends SugarView
{
    public function display()
    {
        global $mod_strings, $current_user;
        $query_get_call_log_leads = "SELECT * FROM call_log_leads WHERE user_call_id = '{$current_user->id}'";
        $result_get_call_log_leads = $GLOBALS['db']->query($query_get_call_log_leads);
        $html_row_table = "";
        $total_page = 1;
        $count = 0;
        $call_log_leads = array();
        while($rows = $GLOBALS['db']->fetchByAssoc($result_get_call_log_leads)){
            $call_log_leads[] = $rows;
            $id = $rows['id'];
            $user_id = $rows['user_call_id'];
            $lead_id = $rows['lead_id'];
            $call_date = $rows['call_date'];
            $call_status_id = $rows['call_status_id'];
            $description_call_status_id = $rows['description_call_status_id'];
            $count += 1;

            // Get lead
            $query_lead = "SELECT first_name FROM leads WHERE id = '{$lead_id}'";
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

            if ($call_status == ""){
                $html_row_table .= "
                <tr>
                    <th scope='row'>{$count}</th>
                    <th scope='row'>{$current_user->first_name}</th>
                    <th scope='row'>{$lead['first_name']}</th>
                    <th scope='row'>{$call_date}</th>
                    <th scope='row'>{$mod_strings['LBL_NOT_CALL']}</th>
                    <th scope='row'>{$call_status_description['description']}</th>
                </tr>
            ";
            }
            else {
                $html_row_table .= "
                <tr>
                    <th scope='row'>{$count}</th>
                    <th scope='row'>{$current_user->first_name}</th>
                    <th scope='row'>{$lead['first_name']}</th>
                    <th scope='row'>{$call_date}</th>
                    <th scope='row'>{$call_status['description']}</th>
                    <th scope='row'>{$call_status_description['description']}</th>
                </tr>
            ";
            }


        }

        $active = 1;
        if (count($call_log_leads) > 6){
            $total_page = ceil(count($call_log_leads) /6);
            $active = 1;
        }

        //print_r($call_log_leads[0]['lead_id']);

        $smarty = new Sugar_Smarty();
        $smarty->assign('CALL_LOG_LEADS', $mod_strings['LNK_CALL_LOG_LEADS']);
        $smarty->assign('STT', $mod_strings['LBL_STT']);
        $smarty->assign('USER', $mod_strings['LBL_USER']);
        $smarty->assign('LEAD', $mod_strings['LBL_LEAD']);
        $smarty->assign('CALL_DATE', $mod_strings['LBL_CALL_DATE']);
        $smarty->assign('CALL_STATUS', $mod_strings['LBL_CALL_STATUS']);
        $smarty->assign('CALL_STATUS_DESCRIPTION', $mod_strings['LBL_CALL_STATUS_DESCRIPTION']);
        $smarty->assign('DATA', $html_row_table);
        $smarty->assign('TOTAL_PAGE', $total_page);
        $smarty->assign('ACTIVE', $active);
        $smarty->assign('USER_ID', $current_user->id);
        parent::display();
        $smarty->display('custom/modules/Calls/tpls/call_log_leads.tpl');
    }
}