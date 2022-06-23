<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.list.php');

class CustomLeadsViewtest extends ViewList
{
    public function display()
    {
        echo"hello";
        parent::display();
    }   
}