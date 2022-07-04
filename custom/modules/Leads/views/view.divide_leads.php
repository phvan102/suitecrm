<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/SugarView.php');

class CustomLeadsViewdivide_leads extends SugarView
{
    public function display()
    {
        $smarty = new Sugar_Smarty();
        $smarty->assign('name', 'Chung');
        $smarty->assign('address', 'Thanh Hoa');
        parent::display();
        $smarty->display('custom/modules/Leads/tpls/divide_leads.tpl');
    }
}
