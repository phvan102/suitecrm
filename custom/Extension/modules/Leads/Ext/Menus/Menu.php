<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}


global $module_menu, $mod_strings, $sugar_config, $current_user;

$user = BeanFactory::getBean('Users', $current_user->id);
$id_employee = $user->id;
$query = "SELECT COUNT(*) AS count FROM securitygroups_users WHERE securitygroup_id = '2a36ad96-1c5b-c6c2-8d5d-62c29d9e1607' AND deleted = 0 AND user_id = '{$id_employee}'";
$result = $GLOBALS['db']->query($query);
$count = $GLOBALS['db']->fetchByAssoc($result);

$module_menu = array();

// This will add the new option
if (ACLController::checkAccess('Leads', 'edit', true)) {
    $module_menu[]=array("index.php?module=Leads&action=EditView&return_module=Leads&return_action=DetailView", $mod_strings['LNK_NEW_LEAD'],"Create", 'Leads');
}
if (ACLController::checkAccess('Leads', 'edit', true)) {
    $module_menu[]=array("index.php?module=Leads&action=ImportVCard", $mod_strings['LNK_IMPORT_VCARD'],"Create_Lead_Vcard", 'Leads');
}
if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[]=array("index.php?module=Leads&action=index&return_module=Leads&return_action=DetailView", $mod_strings['LNK_LEAD_LIST'],"List", 'Leads');
}
if (ACLController::checkAccess('Leads', 'import', true)) {
    $module_menu[]=array("index.php?module=Import&action=Step1&import_module=Leads&return_module=Leads&return_action=index", $mod_strings['LNK_IMPORT_LEADS'],"Import", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[]=array("index.php?module=Leads&action=allotted&return_module=Leads&return_action=DetailView", $mod_strings['LNK_ALLOTTED_CUSTOMERS_LIST'],"List", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[]=array("index.php?module=Leads&action=unaeffect&return_module=Leads&return_action=DetailView", $mod_strings['LNK_UNAFFECTED_CUSTOMERS_LIST'],"List", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[]=array("index.php?module=Leads&action=interested&return_module=Leads&return_action=DetailView", $mod_strings['LNK_INTERESTED_CUSTOMERS_LIST'],"List", 'Leads');
}

if (ACLController::checkAccess('Leads', 'list', true) && ($user->is_admin || $count['count'] == 1)) {
    $module_menu[]=array("index.php?module=Leads&action=divide_leads&return_module=Leads&return_action=DetailView", $mod_strings['LNK_DIVIDE'],"List", 'Leads');
}