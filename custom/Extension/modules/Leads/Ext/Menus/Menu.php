<?php
global $module_menu;

// This will add the new option
if (ACLController::checkAccess('Leads', 'list', true)) {
    $module_menu[]=array("index.php?module=Leads&action=test&return_module=Leads&return_action=DetailView", "Test","List", 'Leads');
}
?>