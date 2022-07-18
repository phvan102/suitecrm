<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/views/view.list.php');

class CustomLeadsViewdisbursement extends ViewList
{
/*     public function display()
    {
        $this->getLeadAssignForUser();
        $this->params['custom_where'] = ' AND module_name.name = "user" ';
        parent::display();
    }  */  

    /* function preDisplay(){
        parent::preDisplay();
    } */

    public function _getModuleTitleParams( $show_help = true )
    {
        global $sugar_version, $sugar_flavor, $server_unique_key, $current_language, $action;
        //[logic here]ETCETCETC
        $params[] = $GLOBALS['mod_strings']['LBL_DISBURSEMENT'];
        return $params;
    }

    public function listViewProcess() {
        include_once 'data/SugarBean.php';
        global $current_user;
        $user = BeanFactory::getBean('Users', $current_user->id);

        $user_id_current = $user->id;
        //global $current_user;
        $this->processSearchForm();
        if ($this->where != "") {
            $this->where .= "AND (leads.deleted = 0) AND leads.call_status_lead = '4' AND (leads.campaign_id IS NOT NULL) AND (leads.campaign_id != '')";
        }
        else {
            $this->where .= "(leads.deleted = 0) AND (leads.call_status_lead = '4') AND (leads.campaign_id IS NOT NULL) AND (leads.campaign_id != '')";
        }

        $this->lv->searchColumns = $this->searchForm->searchColumns;
        
        if(!$this->headers)
            return;
            
        if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false)
        {
            $this->lv->setup($this->seed, 'custom/modules/Leads/tpls/ListViewGeneric.tpl', $this->where, $this->params);
            echo $this->lv->display();
        }
    }
}