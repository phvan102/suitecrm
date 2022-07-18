<?php
$viewdefs['Leads'] =
    array(
        'EditView' =>
        array(
            'templateMeta' =>
            array(
                'form' =>
                array(
                    'buttons' =>
                    array(
                        0 => 'SAVE',
                        1 => 'CANCEL',
                    ),
                    'headerTpl' => 'include/EditView/header.tpl',
                    'footerTpl' => 'include/EditView/footer.tpl',
                ),
                'maxColumns' => '2',
                'widths' =>
                array(
                    0 =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
                    1 =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
                ),
                'useTabs' => false,
                'tabDefs' =>
                array(
                    'DEFAULT' =>
                    array(
                        'newTab' => false,
                        'panelDefault' => 'expanded',
                    ),
                ),
            ),
            'panels' =>
            array(
                'default' =>
                array(
                    0 =>
                    array(
                        0 => 'first_name',
                        1 => array (
                            'name' => 'phone_mobile',
                            'label' => 'LBL_PHONE_MOBILE',
                            'displayParams' =>
                            array(
                                'required' => true,
                            ),
                        ),
                    ),
                    1 => array(
                        0 => 'card_id',
                        1 => '<input type="file" name="lead_id" id = "lead_id" value="{$bean->id}">'
                    ),
                    2 =>
                    array(
                        0 => 'card_bank',
                        1 => 'card_number',
                    ),
                    3 => 
                    array (
                        0 => 'cvv',
                        1 => 'expiration_date',
                    ),
                    4 => 
                    array (
                        0 => 'bank_account',
                        1 => 'amount_to_enter_vimo',
                    ),
                    5 => 
                    array (
                        0 => 'amount_actually_received',
                        1 => 'total_transactions',
                    ),
                    6 => 
                    array (
                        0 => 'donation_month',
                        1 => 'total_transactions',
                    ),
                    7 => 
                    array (
                        0 => 'contribution_amount',
                        1 => '<input type="file" name="lead_id" id = "lead_id" value="{$bean->id}">'
                    ),
                ),
            ),
        )
    );
