<?php

include './database.php';
$data = json_decode(file_get_contents("php://input"), true);
$result = result("SELECT `city_id`,`city_name` FROM `cities` where `city_state`='" . $data['city_state'] . "' order by city_state asc");
echo json_encode($result);
?>