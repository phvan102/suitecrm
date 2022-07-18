<?php
$html = "";
$campaigns = array('', '__Select Campaign__');
if (isset($_GET['security_group_id']) && isset($_GET['employee_id'])){
    $id_employee = $_GET['employee_id'];
    $security_id = $_GET['security_group_id'];
    $query = "SELECT COUNT(*) AS count FROM securitygroups_users WHERE securitygroup_id = '{$security_id}' AND deleted = 0 AND user_id = '{$id_employee}'";
    $result = $GLOBALS['db']->query($query);
    $count = $GLOBALS['db']->fetchByAssoc($result);
    if ($count['count'] == 1) {
        $query_user = "SELECT user_id FROM securitygroups_users WHERE securitygroup_id = '{$security_id}' AND deleted = 0";
        $result_user = $GLOBALS['db']->query($query_user);
        while ($rows = $GLOBALS['db']->fetchByAssoc($result_user)) {
            $id_user = $rows['user_id'];
            //echo $id_user;
            $query_campaigns = "SELECT * FROM campaigns WHERE assigned_user_id = '{$id_user}' AND deleted = 0 ORDER BY date_entered DESC";
            $result_campaigns = $GLOBALS['db']->query($query_campaigns);
            while ($rows = $GLOBALS['db']->fetchByAssoc($result_campaigns)) {
                $campaigns[$rows['id']] = $rows['name'];
            }
        }

        foreach($campaigns as $k => $v) {
            if ($v == '__Select Campaign__') {
                $html .= sprintf("<option value='%s' selected>%s</option>", $k, $v);
            }
            else {
                $html .= sprintf("<option value='%s'>%s</option>", $k, $v);
            }
        }
    }
}
else {
    $query = "SELECT id, name FROM campaigns WHERE deleted = 0";
    $result = $GLOBALS['db']->query($query);
    while ($rows = $GLOBALS['db']->fetchByAssoc($result)) {
        $campaigns[$rows['id']] = $rows['name'];
    }
    
    foreach($campaigns as $k => $v) {
        if ($v == '__Select Campaign__') {
            $html .= sprintf("<option value='%s' selected>%s</option>", $k, $v);
        }
        else {
            $html .= sprintf("<option value='%s'>%s</option>", $k, $v);
        }
    }
}

echo $html;