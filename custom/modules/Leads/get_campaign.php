<?php
$query = "SELECT id, name FROM campaigns";
$result = $GLOBALS['db']->query($query);
$campaigns = array('', '__Select Campaign__');
$html = "";
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

echo $html;