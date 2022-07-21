<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/View/SugarView.php');

class CustomLeadsViewdetail_lead_disbursement extends SugarView
{


    public function display()
    {
        global $mod_strings, $current_user;
        $id_lead = $_REQUEST['record'];
        $query_lead = "SELECT * FROM leads WHERE id = '{$id_lead}'";
        $result_lead = $GLOBALS['db']->query($query_lead);
        $lead = $GLOBALS['db']->fetchByAssoc($result_lead);

        $query_card_image = "SELECT * FROM leads_card_image WHERE lead_id = '{$id_lead}'";
        $result_card_image = $GLOBALS['db']->query($query_card_image);
        $lst = array();
        while($card_image = $GLOBALS['db']->fetchByAssoc($result_card_image)){
            array_push($lst, $card_image['card_image_link']);
            //echo $card_image['card_image_link'];
        }

        $smarty = new Sugar_Smarty();
        $smarty->assign('CARD_IMAGE_FIRST', $lst[0]);
        $smarty->assign('LIST_CARD_IMAGE', $lst);
        $smarty->assign('NAME', $lead['first_name']);
        $smarty->assign('CARD_NUMBER', $lead['card_number']);
        $smarty->assign('CVV', $lead['cvv']);
        $smarty->assign('EXPIRATION_DATE', $lead['expiration_date']);
        $smarty->assign('PHONE_MOBILE', $lead['phone_mobile']);
        $smarty->assign('CARD_ID', $lead['card_id']);
        $smarty->assign('AMOUNT_TO_ENTER_VIMO', $lead['amount_to_enter_vimo']);
        $smarty->assign('AMOUNT_ACTUALLY_RECEIVED', $lead['amount_actually_received']);
        $smarty->assign('TOTAL_TRANSACTIONS', $lead['total_transactions']);
        $smarty->assign('DONATION_MONTH', $lead['donation_month']);
        $smarty->assign('CONTRIBUTION_AMOUNT', $lead['contribution_amount']);
        $smarty->assign('BANK_ACCOUNT', $lead['bank_account']);

        $smarty->assign('TITLE_NAME', $mod_strings['LBL_FIRST_NAME']);
        $smarty->assign('TITLE_PHONE_MOBILE', $mod_strings['LBL_PHONE_MOBILE']);
        $smarty->assign('TITLE_CARD_NUMBER', $mod_strings['LBL_CARD_NUMBER']);
        $smarty->assign('TITLE_CVV', $mod_strings['LBL_CVV']);
        $smarty->assign('TITLE_EXPIRATION_DATE', $mod_strings['LBL_EXPIRATION_DATE']);
        $smarty->assign('TITLE_AMOUNT_TO_ENTER_VIMO', $mod_strings['LBL_AMOUNT_TO_ENTER_VIMO']);
        $smarty->assign('TITLE_AMOUNT_ACTUALLY_RECEIVED', $mod_strings['LBL_AMOUNT_ACTUALLY_RECEIVED']);
        $smarty->assign('TITLE_TOTAL_TRANSACTIONS', $mod_strings['LBL_TOTAL_TRANSACTIONS']);
        $smarty->assign('TITLE_DONATION_MONTH', $mod_strings['LBL_DONATION_MONTH']);
        $smarty->assign('TITLE_CONTRIBUTION_AMOUNT', $mod_strings['LBL_CONTRIBUTION_AMOUNT']);
        $smarty->assign('TITLE_BANK_ACCOUNT', $mod_strings['LBL_BANK_ACCOUNT']);
        $smarty->assign('TITLE_CARD_ID', $mod_strings['LBL_CARD_ID']);
        $smarty->assign('TITLE_CARD_IMAGE', $mod_strings['LBL_CARD_IMAGE']);

        parent::display();
        $smarty->display('custom/modules/Leads/tpls/detail_lead_disbursement.tpl');
    }
}