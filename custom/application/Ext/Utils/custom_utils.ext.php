<?php 
 //WARNING: The contents of this file are auto-generated


function getCallStatusLeadFromDb() {
    global $db;
        
    $query = "SELECT id, description FROM call_status_lead";

    $result = $db->query($query, false);
    
    $list = array();


    while (($row = $db->fetchByAssoc($result)) != null) {
        $list[$row['id']] = $row['description'];
    }
    
    return $list;
}

function getGroupSecurity() {
    global $db;
        
    $query = "SELECT id, name FROM securitygroups";

    $result = $db->query($query, false);

    $list = array('' => 'Select');
    while (($row = $db->fetchByAssoc($result)) != null) {
        $list[$row['id']] = $row['name'];
    }
    
    return $list;
}
?>