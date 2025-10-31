<?php

$conn = new mysqli('localhost', 'root', '', 'erp');

$name = $_POST["name"];
$contactInfo = $_POST["contact_info"];
$interestedProperty = !empty($_POST["interested_property"]) ? $_POST["interested_property"] : 'NULL';
$type = $_POST["type"];
$status = $_POST["status"];

$q = "INSERT INTO clients (name, contact_info, interested_property, type, status) VALUES ('$name', '$contactInfo', $interestedProperty, '$type', '$status')";
$results = $conn->query($q);

echo $results == 1 ? 'Client created successfully!' : 'Client creation failed!';


?>