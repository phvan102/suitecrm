<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/SugarView.php');

class CustomLeadsViewreport_campaign extends SugarView
{
    public function display()
    {
        global $mod_strings;
        $smarty = new Sugar_Smarty();
        $smarty->assign('STT', $mod_strings['LBL_STT']);
        $smarty->assign('USER', $mod_strings['LBL_USER']);
        $smarty->assign('CAMPAIGN', $mod_strings['LBL_CAMPAIGN']);
        $smarty->assign('TITLE', $mod_strings['LBL_REPORT_CAMPAIGN']);
        $smarty->assign('SELECT_CAMPAIGN', $mod_strings['LBL_SELECT_CAMPAIGN']);
        $smarty->assign('FILTER_CAMPAIGN', $mod_strings['LBL_FILTER_CAMPAIGN']);
        $smarty->assign('EXPORT_REPORT', $mod_strings['LBL_EXPORT_REPORT']);
        $smarty->assign('ASSIGNED_QUANTITY', $mod_strings['LBL_ASSIGNED_QUANTITY']);
        $smarty->assign('CALLED_QUANTITY', $mod_strings['LBL_CALLED_QUANTITY']);
        $smarty->assign('NOT_CALL_YET_QUANTIRY', $mod_strings['LBL_NOT_CALL_YET_QUANTIRY']);
        $smarty->assign('PERCENT', $mod_strings['LBL_PERCENT']);
        $smarty->assign('NEVER_CONTACT', $mod_strings['LBL_NEVER_CONTACT']);
        $smarty->assign('CONTACTED', $mod_strings['LBL_CONTACTED']);
        $smarty->assign('INTEREST', $mod_strings['LBL_INTEREST']);
        $smarty->assign('ARGREED', $mod_strings['LBL_ARGREED']);
        $smarty->assign('REFUSE', $mod_strings['LBL_REFUSE']);

        parent::display();
        $smarty->display('custom/modules/Leads/tpls/report_campaign.tpl');
    }
}