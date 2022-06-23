<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/views/view.list.php');

class CustomLeadsViewinterested extends ViewList
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

    public function listViewProcess() {
        include_once 'data/SugarBean.php';
        global $current_user;
        $user = BeanFactory::getBean('Users', $current_user->id);

        $user_id_current = $user->id;
        //global $current_user;
        $this->processSearchForm();
        if ($this->where != "") {
            $this->where .= " AND (leads.call_status IN ('01_INT_no_money_in_card', '02_INT_Consider_Call_back', '03_INT_Client_need_a_card', '04_INT_Client_interest_but_no_pick_up', '05_INT_Client_interest_but_no_pick_up', '01_AGD_Approved_and_paid_money', '02_AGD_Schedules_Application_with_disbursement', '03_AGD_Agreed_but_still_not_contact')) ";
        }
        else {
            $this->where .= "(leads.call_status IN ('01_INT_no_money_in_card', '02_INT_Consider_Call_back', '03_INT_Client_need_a_card', '04_INT_Client_interest_but_no_pick_up', '05_INT_Client_interest_but_no_pick_up', '01_AGD_Approved_and_paid_money', '02_AGD_Schedules_Application_with_disbursement', '03_AGD_Agreed_but_still_not_contact'))";
        }

        $this->lv->searchColumns = $this->searchForm->searchColumns;
        
        if(!$this->headers)
            return;
            
        if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false)
        {
            $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
            $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
            echo get_form_header($GLOBALS['mod_strings']['LBL_LIST_FORM_TITLE'] . $savedSearchName, '', false);
            echo $this->lv->display();
        }
        //$this->params['custom_from'] = "leads ";
        //$this->params['custom_where'] = 'AND (leads.assigned_user_id = "1") ';

        //parent::display();
        //$this->params['custom_select'] = "*";
        //$this->params['custom_from'] = "leads ";
        //$this->where .= " and leads.assigned_user_id "."'".$user_id_current."'"."";
        //$bean = new SugarBean();
        //$query = "select id from leads l where l.assigned_user_id ="."'".$user_id_current."'"."";
       /*  $query = "select * from leads where "."'".$user_id_current."'"."";
        $result = $bean->db->query($query,true," Error filling in additional detail fields: ");
        $results = $GLOBALS['db']->query($query);
        while($row = $GLOBALS['db']->fetchByAssoc($results) )
        {
            //Use $row['id'] to grab the id fields value
            $id = $row['id'];
            echo $id;
        } */
        /* $row = $bean->db->fetchByAssoc($result);
        foreach($row as $value){
            echo $value;
        } */

        //parent::listViewProcess();


    }
}