<?php


$conn = new mysqli('localhost', 'root', '', 'erp');

$q = "DELETE FROM properties WHERE id = " . $_GET["id"];
$results = $conn->query($q);

echo $results == 1 ? 'Property deleted successfully!' : 'Property deletion failed!';

?>