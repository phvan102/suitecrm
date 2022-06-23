<?php 
 //WARNING: The contents of this file are auto-generated


if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}


global $module_menu;

$module_menu = array();

// This will add the new option
if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[]=array("index.php?module=Leads&action=test&return_module=Leads&return_action=DetailView", "Test","List", 'Leads');
}
?>