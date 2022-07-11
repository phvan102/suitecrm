<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

 //if (isset($_GET['data'])){
//    $call_log_leads = $_GET['data'];
//    $user_call = $call_log_leads['user_id'];
//    $lead_name = $call_log_leads['lead_id'];
//    $call_status = $call_log_leads['call_status_id'];
//    $description_call_status = $call_log_leads['description_call_status_id'];
//    $call_date = date('Y-m-d H:i:s');
//    $query = "INSERT INTO call_log_leads (user_call, lead_name, call_date, call_status, description_call_status) VALUES ('{$user_call}', '{$lead_name}', '{$call_date}', '{$call_status}', '{$description_call_status}')";
//    $GLOBALS['db']->query($query);
//}

date_default_timezone_set('Asia/Ho_Chi_Minh');


class call_log_leads
{
    public $module = 'Leads';
    public function after_save_call_log_leads($bean, $event, $arguments)
    {
        global $current_user;
        $lead_id = $bean->id;
        if ($bean->campaign_id != NULL && $bean->campaign_id != ""){
            $query_get_call_log_leads = "SELECT * FROM call_log_leads WHERE lead_id = '{$lead_id}'";
            $result_get_call_log_leads = $GLOBALS['db']->query($query_get_call_log_leads);
            $call_log_lead = $GLOBALS['db']->fetchByAssoc($result_get_call_log_leads);
            if ($call_log_lead == ""){
                $call_date = date('Y-m-d H:i:s');
                $query = "INSERT INTO call_log_leads (user_call_id, lead_id, call_date, call_status_id, description_call_status_id) VALUES ('{$current_user->id}', '{$bean->id}', '{$call_date}', '{$bean->call_status_lead}', '{$bean->call_status_description_lead}')";
                $GLOBALS['db']->query($query);
            }
            else if ($call_log_lead['call_status_id'] != $bean->call_status_lead || $call_log_lead['description_call_status_id'] != $bean->call_status_description_lead){
                $call_date = date('Y-m-d H:i:s');
                $query = "UPDATE call_log_leads  SET user_call_id = '{$current_user->id}', call_date = '{$call_date}', call_status_id = '{$bean->call_status_lead}', description_call_status_id = '{$bean->call_status_description_lead}' WHERE lead_id = '{$bean->id}'";
                $GLOBALS['db']->query($query);
            }
        }
    }
}
