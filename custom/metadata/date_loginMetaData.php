<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

$dictionary['date_login'] = array(
    'table' => 'date_login', 'fields' => array(
        array('name' => 'id', 'type' => 'varchar', 'len' => '255',),
        array('name' => 'date_now', 'type' => 'varchar', 'len' => '255'),
    ), 'indices' => array(
        array('name' => 'date_loginpk', 'type' => 'primary', 'fields' => array('id'))
    )
);