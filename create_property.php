<?php

$conn = new mysqli('localhost', 'root', '', 'erp');

$name = $_POST["name"];
$price = $_POST["price"];
$location = $_POST["location"];
$type = $_POST["type"];
$size = $_POST["size"];
$status = $_POST["status"];
$owner_id = !empty($_POST["owner_id"]) ? $_POST["owner_id"] : 'NULL';

$results = $conn->query("INSERT INTO properties (name, price, location,type,size,status,owner_id) VALUES ('$name', '$price', '$location', '$type', '$size', '$status', $owner_id)");

echo $results == 1 ? 'Property created successfully!' : 'Property creation failed!';


?>