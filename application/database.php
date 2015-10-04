<?php

session_start();
include '../config.php';

function mytest($d) {
    echo '<pre>';
    if (is_array($d)) {
        print_r($d);
    } else {
        echo $d;
    }
    echo '</pre>';
    die();
}

function getFormno() {
    $reg = result("SELECT formno as reg FROM `formgen` ");
    if (isset($reg[0]['reg'])) {
        mysql_query("UPDATE `formgen` SET `formno`='" . (int) ($reg[0]['reg'] + 1) . "'");
        return $reg[0]['reg'] + 1;
    } else {
        return 100001;
    }
}

function result($query) {
    $rs1 = mysql_query($query);
    $reg = array();
    while ($row = mysql_fetch_assoc($rs1)) {
        array_push($reg, $row);
    }
    return $reg;
}

function insert($tb, $data) {
    $sql = "INSERT INTO `" . $tb . "` ( `" . implode("`, `", array_keys($data)) . "` ) VALUES ( '" . implode("', '", array_values($data)) . "' )";
    return mysql_query($sql);
}

function imageUpload($img) {
    $updata = $_FILES[$img];
    $target_dir = "../UploadImg/ProfImage/";
    $target_file = $target_dir . basename($_FILES[$img]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$img]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            return array('e' => 1, 'msg' => "File is not an image.");
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return array('e' => 1, 'msg' => "Sorry, file already exists.");
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES[$img]["size"] > 200000) {
        return array('e' => 1, 'msg' => "Sorry, your file is too large.");
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        return array('e' => 1, 'msg' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return array('e' => 1, 'msg' => "Sorry, your file was not uploaded.");
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$img]["tmp_name"], $target_file)) {
            return array('e' => 0, 'msg' => "The file " . basename($_FILES[$img]["name"]) . " has been uploaded.", 'updata' => $updata);
        } else {
            return array('e' => 1, 'msg' => "Sorry, there was an error uploading your file.");
        }
    }
}
