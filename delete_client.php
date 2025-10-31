<?php


$conn = new mysqli('localhost', 'root', '', 'erp');

$q = "DELETE FROM clients WHERE id = " . $_GET["id"];
$results = $conn->query($q);

echo $results == 1 ? 'Client deleted successfully!' : 'Client deletion failed!';

?>