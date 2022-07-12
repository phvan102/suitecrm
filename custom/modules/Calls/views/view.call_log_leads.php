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

        $smarty = new Sugar_Smarty();
        $smarty->assign('CALL_LOG_LEADS', $mod_strings['LNK_CALL_LOG_LEADS']);
        $smarty->assign('STT', $mod_strings['LBL_STT']);
        $smarty->assign('USER', $mod_strings['LBL_USER']);
        $smarty->assign('LEAD', $mod_strings['LBL_LEAD']);
        $smarty->assign('CALL_DATE', $mod_strings['LBL_CALL_DATE']);
        $smarty->assign('CALL_STATUS', $mod_strings['LBL_CALL_STATUS']);
        $smarty->assign('CALL_STATUS_DESCRIPTION', $mod_strings['LBL_CALL_STATUS_DESCRIPTION']);
        $smarty->assign('USER_ID', $current_user->id);
        parent::display();
        $smarty->display('custom/modules/Calls/tpls/call_log_leads.tpl');
    }
}