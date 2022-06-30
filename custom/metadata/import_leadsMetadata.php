<?php

use function PHPSTORM_META\type;

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

$dictionary['import_leads'] = array(
    'table' => 'import_leads', 'fields' => array(
        array('name' => 'id', 'type' => 'varchar', 'len' => '255',),
        array('name' => 'date_updated', 'type' => 'datetime'),
        array('name' => 'user_updated', 'type' => 'varchar', 'len' => '255' ),
        array('name' => 'link_file', 'type' => 'varchar', 'len' => '255' ),
        array('name' => 'number_import_in_day', 'type' => 'varchar', 'len' => '255'),
    ), 'indices' => array(
        array('name' => 'import_leadspk', 'type' => 'primary', 'fields' => array('id'))
    )
);