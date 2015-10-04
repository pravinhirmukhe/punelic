<?php

include './database.php';
error_reporting();
if (!empty($_POST)) {
//    mytest($_POST);
    $r = imageUpload('img_file');
    if (!$r['e']) {
        $data = array(
            'added_by' => 'Self',
            'form_no' => getFormno(),
            'fname' => $_POST['txt_Fname'],
            'mname' => $_POST['txt_Mname'],
            'lname' => $_POST['txt_Lname'],
            'agent_code' => $_POST['txt_AgentCode'],
            'club_membership' => $_POST['txt_ClubMembership'],
            'branch' => $_POST['txt_Branch'],
            'division' => $_POST['txt_Division'],
            'contact_no' => $_POST['txt_ContactNo'],
            'email' => $_POST['txt_Email'],
            'office_add' => $_POST['txt_OfficeAddress'],
            'resi_add' => $_POST['txt_ResiAddress'],
            'city' => $_POST['txt_City'],
            'state' => $_POST['txt_State'],
            'pincode' => $_POST['txt_Pincode'],
            'agency_since' => $_POST['txt_AgencySince'],
            'oth_busi' => $_POST['txt_OtherBusiness'],
            'date_reg' => date('Y-m-d h:i:s'),
            'photo' => json_encode($r['updata']),
            'type' => $_POST['txt_Type']
        );
        $x = false;
        if (insert('Agent_tbl', $data)) {
            $id = mysql_insert_id();
            foreach ($_POST['txt_Area'] as $area) {
                $da = array(
                    'prof_id' => $id,
                    'area' => $area,
                    'create_date' => date('Y-m-d h:i:s'),
                    'status' => 'Active'
                );
                $x = insert('area', $da);
            }
        }
        if ($x) {
            $_SESSION['resmsg'] = array('e' => 0, 'msg' => "Agent or DO Registration Successfully.");
            header("Location: ../online_register.php");
        } else {
            $_SESSION['resmsg'] = array('e' => 1, 'msg' => "Agent or DO Registration Failed.");
            header("Location: ../online_register.php");
        }
    } else {
        $_SESSION['resmsg'] = array('e' => 0, 'msg' => $r['msg']);
        header("Location: ../online_register.php");
    }
} else {
    header("Location: ../online_register.php");
}
?>