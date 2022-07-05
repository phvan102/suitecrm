<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/SugarView.php');

class CustomLeadsViewdivide_leads extends SugarView
{


    public function display()
    {
        global $mod_strings, $current_user;
        $user = BeanFactory::getBean('Users', $current_user->id);
        $html_row_table = "";
        if ($user->is_admin) {
            $query_campaigns = "SELECT id, name, status, start_date, end_date FROM campaigns";
            $result_campaigns = $GLOBALS['db']->query($query_campaigns); 
            $idx = 0;
            while($row = $GLOBALS['db']->fetchByAssoc($result_campaigns)){
                $idx += 1;
                $name = $row['name'];
                $status = $row['status'];
                $start_day = $row['start_date'];
                $end_day = $row['end_date'];
                $btn = $mod_strings['LBL_BUTTON_ACT'];
                $id = $row['id'];

                # Query for count leads of campaigns
                $query_leads = "SELECT COUNT(*) AS count_leads FROM leads WHERE campaign_id = '{$id}'";
                $result_leads = $GLOBALS['db']->query($query_leads);
                $count_leads = $GLOBALS['db']->fetchByAssoc($result_leads);
                $count_lead = $count_leads['count_leads'];

                # Query for count lead called of campaigns
                $query_called_leads = "SELECT COUNT(*) AS count_called_leads FROM leads WHERE campaign_id = '{$id}' AND call_status_lead = '2'";
                $result_called_leads = $GLOBALS['db']->query($query_called_leads);
                $count_called_leads = $GLOBALS['db']->fetchByAssoc($result_called_leads);
                $count_called_lead = $count_called_leads['count_called_leads'];

                # Query for count lead called of campaigns
                $query_not_call_leads = "SELECT COUNT(*) AS count_not_call_leads FROM leads WHERE campaign_id = '{$id}' AND call_status_lead = '1'";
                $result_not_call_leads = $GLOBALS['db']->query($query_not_call_leads);
                $count_not_call_leads = $GLOBALS['db']->fetchByAssoc($result_not_call_leads);
                $count_not_call_lead = $count_not_call_leads['count_not_call_leads'];

                # Query for count lead not assign
                $query_not_assign_leads = "SELECT COUNT(*) AS count_not_assign_leads FROM leads WHERE campaign_id = '{$id}' AND assigned_user_id IS NULL";
                $result_not_assign_leads = $GLOBALS['db']->query($query_not_assign_leads);
                $count_not_assign_leads = $GLOBALS['db']->fetchByAssoc($result_not_assign_leads);
                $count_not_assign_lead = $count_not_assign_leads['count_not_assign_leads'];

                $html_row_table .= "
                <tr>
                    <th scope='row'>{$idx}</th>
                    <th scope='row'>{$name}</th>
                    <th scope='row'>{$status}</th>
                    <th scope='row'>{$start_day}</th>
                    <th scope='row'>{$end_day}</th>
                    <th scope='row'>
                        <div class='col-lg-6' id='count'>
                            <p>{$mod_strings['LBL_TOTAL']}: {$count_lead}</p>
                        </div>
                        <div class='col-lg-6' id='count_called_lead'>
                            <p>{$mod_strings['LBL_CALLED']}: {$count_called_lead}</p>
                        </div>
                        <div class='col-lg-6' id='count_not_call_lead'>
                            <p>{$mod_strings['LBL_NOT_CALL']}: {$count_not_call_lead}</p>
                        </div>
                        <div class='col-lg-6' id='count_not_assign_lead'>
                            <p>{$mod_strings['LBL_NOT_ASSIGN']}: {$count_not_assign_lead}</p>
                        </div>
                    </th>
                    <th scope='row'>
                        <button type='button' class='btn btn-manage' id='btn-manage' onclick=\"window.location='index.php?module=Leads&action=detail_divide&return_module=Leads&return_action=DetailView&id={$id}'\">{$btn}</button>
                    </th>
                </tr>
            ";
            }
        }

        else {
            $id_employee = $user->id;
            $query = "SELECT COUNT(*) AS count FROM securitygroups_users WHERE securitygroup_id = '2a36ad96-1c5b-c6c2-8d5d-62c29d9e1607' AND deleted = 0 AND user_id = '{$id_employee}'";
            $result = $GLOBALS['db']->query($query);
            $count = $GLOBALS['db']->fetchByAssoc($result);
            $idx = 0;
            //echo $count['count'];
            if ($count['count'] == 1){
                $query_user = "SELECT user_id FROM securitygroups_users WHERE securitygroup_id = '2a36ad96-1c5b-c6c2-8d5d-62c29d9e1607'";
                $result_user = $GLOBALS['db']->query($query_user);
                while($rows = $GLOBALS['db']->fetchByAssoc($result_user)){
                    $id_user = $rows['user_id'];
                    //echo $id_user;
                    $query_campaigns = "SELECT id, name, status, start_date, end_date FROM campaigns WHERE assigned_user_id = '{$id_user}'";
                    $result_campaigns = $GLOBALS['db']->query($query_campaigns);
                    while($row = $GLOBALS['db']->fetchByAssoc($result_campaigns)){
                        $idx += 1;
                        $name = $row['name'];
                        $status = $row['status'];
                        $start_day = $row['start_date'];
                        $end_day = $row['end_date'];
                        $btn = $mod_strings['LBL_BUTTON_ACT'];
                        $id = $row['id'];
        
                        # Query for count leads of campaigns
                        $query_leads = "SELECT COUNT(*) AS count_leads FROM leads WHERE campaign_id = '{$id}'";
                        $result_leads = $GLOBALS['db']->query($query_leads);
                        $count_leads = $GLOBALS['db']->fetchByAssoc($result_leads);
                        $count_lead = $count_leads['count_leads'];
        
                        # Query for count lead called of campaigns
                        $query_called_leads = "SELECT COUNT(*) AS count_called_leads FROM leads WHERE campaign_id = '{$id}' AND call_status_lead = '2'";
                        $result_called_leads = $GLOBALS['db']->query($query_called_leads);
                        $count_called_leads = $GLOBALS['db']->fetchByAssoc($result_called_leads);
                        $count_called_lead = $count_called_leads['count_called_leads'];
        
                        # Query for count lead called of campaigns
                        $query_not_call_leads = "SELECT COUNT(*) AS count_not_call_leads FROM leads WHERE campaign_id = '{$id}' AND call_status_lead = '1'";
                        $result_not_call_leads = $GLOBALS['db']->query($query_not_call_leads);
                        $count_not_call_leads = $GLOBALS['db']->fetchByAssoc($result_not_call_leads);
                        $count_not_call_lead = $count_not_call_leads['count_not_call_leads'];
        
                        # Query for count lead not assign
                        $query_not_assign_leads = "SELECT COUNT(*) AS count_not_assign_leads FROM leads WHERE campaign_id = '{$id}' AND assigned_user_id IS NULL";
                        $result_not_assign_leads = $GLOBALS['db']->query($query_not_assign_leads);
                        $count_not_assign_leads = $GLOBALS['db']->fetchByAssoc($result_not_assign_leads);
                        $count_not_assign_lead = $count_not_assign_leads['count_not_assign_leads'];
        
                        $html_row_table .= "
                        <tr>
                            <th scope='row'>{$idx}</th>
                            <th scope='row'>{$name}</th>
                            <th scope='row'>{$status}</th>
                            <th scope='row'>{$start_day}</th>
                            <th scope='row'>{$end_day}</th>
                            <th scope='row'>
                                <div class='col-lg-6' id='count'>
                                    <p>{$mod_strings['LBL_TOTAL']}: {$count_lead}</p>
                                </div>
                                <div class='col-lg-6' id='count_called_lead'>
                                    <p>{$mod_strings['LBL_CALLED']}: {$count_called_lead}</p>
                                </div>
                                <div class='col-lg-6' id='count_not_call_lead'>
                                    <p>{$mod_strings['LBL_NOT_CALL']}: {$count_not_call_lead}</p>
                                </div>
                                <div class='col-lg-6' id='count_not_assign_lead'>
                                    <p>{$mod_strings['LBL_NOT_ASSIGN']}: {$count_not_assign_lead}</p>
                                </div>
                            </th>
                            <th scope='row'>
                                <button type='button' class='btn btn-manage' id='btn-manage' onclick=\"window.location='index.php?module=Leads&action=detail_divide&return_module=Leads&return_action=DetailView&id={$id}'\">{$btn}</button>
                            </th>
                        </tr>
                    ";
                    }
                }
            }
        }



        $smarty = new Sugar_Smarty();
        $smarty->assign('DIVIDE', $mod_strings['LNK_DIVIDE']);
        $smarty->assign('STT', $mod_strings['LBL_STT']);
        $smarty->assign('CAMPAIGN', $mod_strings['LBL_CAMPAIGNS']);
        $smarty->assign('STATUS_CAMPAIGN', $mod_strings['LBL_STATUS_CAMPAIGN']);
        $smarty->assign('START_DAY', $mod_strings['LBL_START_DAY']);
        $smarty->assign('END_DAY', $mod_strings['LBL_END_DAY']);
        $smarty->assign('STATUS_DATA', $mod_strings['LBL_STATUS_DATA']);
        $smarty->assign('ACT', $mod_strings['LBL_ACT']);
        $smarty->assign('DATA', $html_row_table);

        parent::display();
        $smarty->display('custom/modules/Leads/tpls/divide_leads.tpl');
    }
}
