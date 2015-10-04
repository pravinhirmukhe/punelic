<?php

include './database.php';
$result = result("SELECT DISTINCT(city_state) FROM `cities` order by city_state asc ");
echo json_encode($result);
?>