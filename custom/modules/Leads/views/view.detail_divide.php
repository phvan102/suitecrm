<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/SugarView.php');

class CustomLeadsViewdetail_divide extends SugarView
{


    public function display()
    {
        global $mod_strings, $current_user;
        $smarty = new Sugar_Smarty();
        $html_row_table = "";
        $html_row_table_assigned = "";
        $idx = 0;

        $id_campaign = $_REQUEST['id'];
        $query_campaigns = "SELECT name, status, start_date, end_date FROM campaigns WHERE id = '{$id_campaign}'";
        $result_campaigns = $GLOBALS['db']->query($query_campaigns);
        $row = $GLOBALS['db']->fetchByAssoc($result_campaigns);
        $name = $row['name'];
        $status = $row['status'];
        $start_day = $row['start_date'];
        $end_day = $row['end_date'];
        $smarty->assign('CAMPAIGN_NAME', $name);
        $smarty->assign('STATUS_NAME', $status);
        $smarty->assign('START_NAME_VALUE', $start_day);
        $smarty->assign('END_NAME_VALUE', $end_day);

        # Query for count leads of campaigns
        $query_leads = "SELECT COUNT(*) AS count_leads FROM leads WHERE campaign_id = '{$id_campaign}'";
        $result_leads = $GLOBALS['db']->query($query_leads);
        $count_leads = $GLOBALS['db']->fetchByAssoc($result_leads);
        $count_lead = $count_leads['count_leads'];

        # Query for count lead called of campaigns
        $query_called_leads = "SELECT COUNT(*) AS count_called_leads FROM leads WHERE campaign_id = '{$id_campaign}' AND call_status_lead = '2'";
        $result_called_leads = $GLOBALS['db']->query($query_called_leads);
        $count_called_leads = $GLOBALS['db']->fetchByAssoc($result_called_leads);
        $count_called_lead = $count_called_leads['count_called_leads'];

        # Query for count lead called of campaigns
        $query_not_call_leads = "SELECT COUNT(*) AS count_not_call_leads FROM leads WHERE campaign_id = '{$id_campaign}' AND call_status_lead = '1'";
        $result_not_call_leads = $GLOBALS['db']->query($query_not_call_leads);
        $count_not_call_leads = $GLOBALS['db']->fetchByAssoc($result_not_call_leads);
        $count_not_call_lead = $count_not_call_leads['count_not_call_leads'];

        # Query for count lead not assign
        $query_not_assign_leads = "SELECT COUNT(*) AS count_not_assign_leads FROM leads WHERE campaign_id = '{$id_campaign}' AND assigned_user_id IS NULL";
        $result_not_assign_leads = $GLOBALS['db']->query($query_not_assign_leads);
        $count_not_assign_leads = $GLOBALS['db']->fetchByAssoc($result_not_assign_leads);
        
        # Query employee
        $query_employee = "SELECT *  FROM users WHERE id NOT IN (
            SELECT user_id  FROM securitygroups_users WHERE securitygroup_id = '2a36ad96-1c5b-c6c2-8d5d-62c29d9e1607' AND deleted = 0
        )";
        $result_employee = $GLOBALS['db']->query($query_employee);
        while($rows = $GLOBALS['db']->fetchByAssoc($result_employee)){
            if ($rows['is_admin'] == 0){
                $idx += 1;
                $username = $rows['user_name'];
                $full_name = $rows['first_name'] . " " . $rows['last_name'];
                $html_row_table .= "
                    <tr>
                        <th scope='row'>{$idx}</th>
                        <th scope='row'>{$username}</th>
                        <th scope='row'>{$full_name}</th>
                        <th scope='row'>
                        <input type='text' class='form-control' placeholder=''>
                        </th>
                    </tr>";
                $html_row_table_assigned .= "
                    <tr>
                        <th scope='row'>{$idx}</th>
                        <th scope='row'>{$username}</th>
                        <th scope='row'>{$full_name}</th>
                        <th scope='row'></th>
                        <th scope='row'></th>
                        <th scope='row'>
                        <input type='text' class='form-control' placeholder=''>
                        </th>
                    </tr>
                ";
            }
        }

        $count_not_assign_lead = $count_not_assign_leads['count_not_assign_leads'];
        $smarty->assign('INFORMATION', $mod_strings['LBL_INFORMATION_CAMPAIGN']);
        $smarty->assign('CAMPAIGN', $mod_strings['LBL_CAMPAIGNS']);
        $smarty->assign('STATUS', $mod_strings['LBL_STATUS_CAMPAIGN']);
        $smarty->assign('START_DAY', $mod_strings['LBL_START_DAY']);
        $smarty->assign('END_DAY', $mod_strings['LBL_END_DAY']);
        $smarty->assign('TITLE', $mod_strings['LBL_MANAGE_DIVIDE_DATA']);
        $smarty->assign('STT', $mod_strings['LBL_STT']);
        $smarty->assign('FULL_NAME', $mod_strings['LBL_FULL_NAME']);
        $smarty->assign('USERNAME', $mod_strings['LBL_USERNAME']);
        $smarty->assign('EXTENSION', $mod_strings['LBL_EXTENSION']);
        $smarty->assign('QUANTITY', $mod_strings['LBL_QUANTITY']);
        $smarty->assign('QUANTITY_TO_CANCEL', $mod_strings['LBL_QUANTITY_TO_CANCEL']);
        $smarty->assign('QUANTITY_TO_CANCELED', $mod_strings['LBL_QUANTITY_TO_CANCELED']);
        $smarty->assign('MODIFIED_DATE', $mod_strings['LBL_MODIFIED_DATE']);
        $smarty->assign('DATA_NOT_ASSIGN', $html_row_table);
        $smarty->assign('DATA_ASSIGNED', $html_row_table_assigned);

        parent::display();
        $smarty->display('custom/modules/Leads/tpls/detail_divide.tpl');
    }
}
