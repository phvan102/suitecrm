<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
class save_quantity_lead
{
    public $module = 'Leads';
    public function before_save_quantity_lead($bean, $event, $arguments)
    {
        if ($bean->campaign_id != NULL && $bean->campaign_id != ""){
            $campaign_id = $bean->campaign_id;
            $user_id = $bean->assigned_user_id;
            $id = $bean->id;
            #query leads
            $query_leads = "SELECT COUNT(*) AS total FROM leads WHERE id = '{$id}' AND deleted = 0";
            $result_leads = $GLOBALS['db']->query($query_leads);
            $leads = $GLOBALS['db']->fetchByAssoc($result_leads);
            if ($leads['total'] == 0){
                if ($bean->assigned_user_id != "" and $bean->assigned_user_id != NULL) {
                    $query_get_quantity_assigned = "SELECT COUNT(*) AS count_get_quantity_assigned FROM quantity_leads WHERE user_id = '{$user_id}' AND campaign_id = '{$campaign_id}'";
                    $result_get_quantity_assigned = $GLOBALS['db']->query($query_get_quantity_assigned);
                    $count_get_quantity_assigned = $GLOBALS['db']->fetchByAssoc($result_get_quantity_assigned);
                    if ($count_get_quantity_assigned['count_get_quantity_assigned'] == 0) {
                        $query_quantity = "INSERT INTO quantity_leads (user_id, campaign_id, quantity_assigned, quantity_to_cancel) VALUES ('{$user_id}', '{$campaign_id}', 1, 0)";
                        $GLOBALS['db']->query($query_quantity);
                        //echo $count_get_quantity_assigned['count_get_quantity_assigned'];
                    } else {
                        $query_total_quantity_assigned = "SELECT * FROM quantity_leads WHERE user_id = '{$user_id}' AND campaign_id = '{$campaign_id}'";
                        $result_total_quantity_assigned = $GLOBALS['db']->query($query_total_quantity_assigned);
                        $total_quantity_assigned = $GLOBALS['db']->fetchByAssoc($result_total_quantity_assigned);
                        $update_count_quantity_assigned = $total_quantity_assigned['quantity_assigned'] + 1;
                        $query_quantity_update = "UPDATE quantity_leads SET quantity_assigned = {$update_count_quantity_assigned} WHERE user_id = '{$user_id}' AND campaign_id = '{$campaign_id}'";
                        $GLOBALS['db']->query($query_quantity_update);
                        //echo $update_count_quantity_assigned;
                    }
                }
            }
        }
    }
}
