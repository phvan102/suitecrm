<?php
class HandleDB {
    function addRecordDbLogicHook (){
        global $app_list_strings;


        $query_1 = "SELECT COUNT(*) AS total  FROM call_status_lead";
        $result_1 = $GLOBALS['db']->query($query_1);
        $row_1 = $GLOBALS['db']->fetchByAssoc($result_1);
        $total_1 = $row_1['total'];
        if ($total_1 == 0){
            // Add foreign key for relationship_call_status_lead
            //$query = "ALTER TABLE relationship_call_status_lead 
            //ADD FOREIGN KEY (main_id) REFERENCES call_status_lead(id),
            //ADD FOREIGN KEY (description_id) REFERENCES call_status_description_lead(id);";
            //$GLOBALS['db']->query($query);

            $query_insert_call_status_lead = "INSERT INTO call_status_lead (id, name, description) VALUES ('1','NCT','{$app_list_strings['call_status_lead_dom']['NCT']}'), ('2','COT','{$app_list_strings['call_status_lead_dom']['COT']}'), ('3','INT','{$app_list_strings['call_status_lead_dom']['INT']}'), ('4','AGD','{$app_list_strings['call_status_lead_dom']['AGD']}'),('5','RFS','{$app_list_strings['call_status_lead_dom']['RFS']}');";

            $GLOBALS['db']->query($query_insert_call_status_lead);
        }

        $query_2 = "SELECT COUNT(*) AS total  FROM call_status_description_lead";
        $result_2 = $GLOBALS['db']->query($query_2);
        $row_2 = $GLOBALS['db']->fetchByAssoc($result_2);
        $total_2 = $row_2['total'];

        if ($total_2 == 0) {
            $query_insert_call_status_description_lead = "INSERT INTO call_status_description_lead (id, name, description) VALUES ('1','01_NCT_Engaged','{$app_list_strings['call_status_description_lead_dom']['01_NCT_Engaged']}'), 
                                                            ('2','02_NCT_No_response','{$app_list_strings['call_status_description_lead_dom']['02_NCT_No_response']}'),
                                                            ('3','03_NCT_Not_available','{$app_list_strings['call_status_description_lead_dom']['03_NCT_Not_available']}'),
                                                            ('4','04_NCT_Relative_call_back','{$app_list_strings['call_status_description_lead_dom']['04_NCT_Relative_call_back']}'),
                                                            ('5','05_NCT_Relative_call_new','{$app_list_strings['call_status_description_lead_dom']['05_NCT_Relative_call_new']}'),
                                                            ('6','06_NCT_Invalid_number','{$app_list_strings['call_status_description_lead_dom']['06_NCT_Invalid_number']}'),
                                                            ('7','01_COT_Not_eligible_No_Card','{$app_list_strings['call_status_description_lead_dom']['01_COT_Not_eligible_No_Card']}'),
                                                            ('8','02_COT_Not_eligible_Wrong_Info','{$app_list_strings['call_status_description_lead_dom']['02_COT_Not_eligible_Wrong_Info']}'),
                                                            ('9','03_COT_Not_interested_Complain','{$app_list_strings['call_status_description_lead_dom']['03_COT_Not_interested_Complain']}'),
                                                            ('10','04_COT_Client_busy','{$app_list_strings['call_status_description_lead_dom']['04_COT_Client_busy']}'),
                                                            ('11','01_INT_no_money_in_card','{$app_list_strings['call_status_description_lead_dom']['01_INT_no_money_in_card']}'),
                                                            ('12','02_INT_Consider_Call_back','{$app_list_strings['call_status_description_lead_dom']['02_INT_Consider_Call_back']}'),
                                                            ('13','03_INT_Client_need_a_card','{$app_list_strings['call_status_description_lead_dom']['03_INT_Client_need_a_card']}'),
                                                            ('14','04_INT_Client_interest_but_no_pick_up','{$app_list_strings['call_status_description_lead_dom']['04_INT_Client_interest_but_no_pick_up']}'),
                                                            ('15','05_INT_Client_interest_but_no_pick_up','{$app_list_strings['call_status_description_lead_dom']['05_INT_Client_interest_but_no_pick_up']}'),
                                                            ('16','01_AGD_Approved_and_paid_money','{$app_list_strings['call_status_description_lead_dom']['01_AGD_Approved_and_paid_money']}'),
                                                            ('17','02_AGD_Schedules_Application_with_disbursement','{$app_list_strings['call_status_description_lead_dom']['02_AGD_Schedules_Application_with_disbursement']}'),
                                                            ('18','03_AGD_Agreed_but_still_not_contact','{$app_list_strings['call_status_description_lead_dom']['03_AGD_Agreed_but_still_not_contact']}'),
                                                            ('19','01_RFS_Refused_negative','{$app_list_strings['call_status_description_lead_dom']['01_RFS_Refused_negative']}'),
                                                            ('20','02_RFS_Refused_High_Rate','{$app_list_strings['call_status_description_lead_dom']['02_RFS_Refused_High_Rate']}'),
                                                            ('21','03_RFS_Refused_Loan_Amount','{$app_list_strings['call_status_description_lead_dom']['03_RFS_Refused_Loan_Amount']}'),
                                                            ('22','04_RFS_Refused_No_need','{$app_list_strings['call_status_description_lead_dom']['04_RFS_Refused_No_need']}');";

            $GLOBALS['db']->query($query_insert_call_status_description_lead);
        }

        $query_3 = "SELECT COUNT(*) AS total  FROM relationship_call_status_lead";
        $result_3 = $GLOBALS['db']->query($query_3);
        $row_3 = $GLOBALS['db']->fetchByAssoc($result_3);
        $total_3 = $row_3['total'];

        if ($total_3 == 0) {
            $query_relationship_call_status = "INSERT INTO relationship_call_status_lead (id, main_id, description_id) VALUES ('1','1','1'), ('2','1','2'), ('3','1','3'),('4','1','4'),('5','1','5'),('6','1','6'),('7','2','7'),('8','2','8'),('9','2','9'),('10','2','10'),('11','3','11'),('12','3','12'),('13','3','13'),('14','3','14'),('15','3','15'),('16','4','16'),('17','4','17'),('18','4','18'),('19','5','19'),('20','5','20'),('21','5','21'),('22','5','22');";

            $GLOBALS['db']->query($query_relationship_call_status);
        }
    }

    function removeRecordCallStatus () {
        $query_1 = "SELECT COUNT(*) AS total  FROM call_status_lead";
        $result_1 = $GLOBALS['db']->query($query_1);
        $row_1 = $GLOBALS['db']->fetchByAssoc($result_1);
        $total_1 = $row_1['total'];

        if ($total_1 != 0) {
            $query_11 = "DELETE FROM call_status_lead";
            $GLOBALS['db']->query($query_11);
        }

        $query_2 = "SELECT COUNT(*) AS total  FROM call_status_description_lead";
        $result_2 = $GLOBALS['db']->query($query_2);
        $row_2 = $GLOBALS['db']->fetchByAssoc($result_2);
        $total_2 = $row_2['total'];

        if ($total_2 != 0) {
            $query_22 = "DELETE FROM call_status_description_lead";
            $GLOBALS['db']->query($query_22);
        }

        $query_3 = "SELECT COUNT(*) AS total  FROM relationship_call_status_lead";
        $result_3 = $GLOBALS['db']->query($query_3);
        $row_3 = $GLOBALS['db']->fetchByAssoc($result_3);
        $total_3 = $row_3['total'];

        if ($total_3 != 0) {
            $query_33 = "DELETE FROM call_status_description_lead";
            $GLOBALS['db']->query($query_33);
        }
    }
}
?>