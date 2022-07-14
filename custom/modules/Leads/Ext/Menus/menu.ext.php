<?php 
 //WARNING: The contents of this file are auto-generated


if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}


global $module_menu, $mod_strings, $sugar_config, $current_user;
$asset = false;
$result_access_override = 0;
$user = BeanFactory::getBean('Users', $current_user->id);
$id_employee = $user->id;
$query_get_security = "SELECT securitygroup_id FROM securitygroups_users WHERE deleted = 0 AND user_id = '{$id_employee}'";
$result_get_security = $GLOBALS['db']->query($query_get_security);
if ($user->is_admin == 0){
    while($rows_get_security = $GLOBALS['db']->fetchByAssoc($result_get_security)){
        if ($asset == false){
            $security_id = $rows_get_security['securitygroup_id'];
            $query_get_role = "SELECT role_id FROM securitygroups_acl_roles WHERE deleted = 0 AND securitygroup_id = '{$security_id}'";
            $result_get_role = $GLOBALS['db']->query($query_get_role);
            if ($asset == false) {
                while ($rows_get_role = $GLOBALS['db']->fetchByAssoc($result_get_role)) {
                    if ($asset == false) {
                        $role_id = $rows_get_role['role_id'];
                        $query_get_action = "SELECT action_id, access_override  FROM acl_roles_actions WHERE deleted = 0 AND role_id = '{$role_id}'";
                        $result_get_action = $GLOBALS['db']->query($query_get_action);
                        while ($rows_get_action = $GLOBALS['db']->fetchByAssoc($result_get_action)) {
                            if ($rows_get_action['access_override'] != 0 && $rows_get_action['access_override'] != -99) {
                                $action_id = $rows_get_action['action_id'];
                                $query_get_name_action = "SELECT name, category FROM acl_actions WHERE deleted = 0 AND id = '{$action_id}'";
                                $result_get_name_action = $GLOBALS['db']->query($query_get_name_action);
                                while ($rows_get_name_action = $GLOBALS['db']->fetchByAssoc($result_get_name_action)) {
                                    if ($rows_get_name_action['name'] == 'divide' && $rows_get_name_action['category'] == 'Leads') {
                                        //echo $action_id;
                                        $result_access_override = $rows_get_action['access_override'];
                                        $asset = true;
                                        break;
                                    }
                                }
                            }
                        }
                    } else {
                        break;
                    }
                }
            }
        }
    }
}



$module_menu = array();

// This will add the new option
if (ACLController::checkAccess('Leads', 'edit', true)) {
    $module_menu[] = array("index.php?module=Leads&action=EditView&return_module=Leads&return_action=DetailView", $mod_strings['LNK_NEW_LEAD'], "Create", 'Leads');
}
if (ACLController::checkAccess('Leads', 'edit', true)) {
    $module_menu[] = array("index.php?module=Leads&action=ImportVCard", $mod_strings['LNK_IMPORT_VCARD'], "Create_Lead_Vcard", 'Leads');
}
if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[] = array("index.php?module=Leads&action=index&return_module=Leads&return_action=DetailView", $mod_strings['LNK_LEAD_LIST'], "List", 'Leads');
}
if (ACLController::checkAccess('Leads', 'import', true)) {
    $module_menu[] = array("index.php?module=Import&action=Step1&import_module=Leads&return_module=Leads&return_action=index", $mod_strings['LNK_IMPORT_LEADS'], "Import", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[] = array("index.php?module=Leads&action=allotted&return_module=Leads&return_action=DetailView", $mod_strings['LNK_ALLOTTED_CUSTOMERS_LIST'], "List", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[] = array("index.php?module=Leads&action=unaeffect&return_module=Leads&return_action=DetailView", $mod_strings['LNK_UNAFFECTED_CUSTOMERS_LIST'], "List", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[] = array("index.php?module=Leads&action=interested&return_module=Leads&return_action=DetailView", $mod_strings['LNK_INTERESTED_CUSTOMERS_LIST'], "List", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true) && ($user->is_admin || $asset == true)) {
    if ($user->is_admin){
        $module_menu[] = array("index.php?module=Leads&action=divide_leads&return_module=Leads&return_action=DetailView&access_override=90", $mod_strings['LNK_DIVIDE'], "List", 'Leads');
    }
    else {
        $module_menu[] = array("index.php?module=Leads&action=divide_leads&return_module=Leads&return_action=DetailView&access_override={$result_access_override}", $mod_strings['LNK_DIVIDE'], "List", 'Leads');
    }
}

if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[] = array("index.php?module=Leads&action=report_campaign&return_module=Leads&return_action=DetailView", $mod_strings['LBL_REPORT_CAMPAIGN'], "List", 'Leads');
}

?>