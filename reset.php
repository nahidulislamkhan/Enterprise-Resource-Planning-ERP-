<?php




$conn = new PDO('mysql:host=localhost;', 'root', '');
$conn->exec('CREATE DATABASE IF NOT EXISTS erp');
$conn->exec('USE erp');
$conn->exec(file_get_contents('query.txt'));

echo 'Database reset successfully!';


?>