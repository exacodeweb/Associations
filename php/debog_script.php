<?php
include 'admin/db_connect.php';

$sql = "SELECT * FROM horaires";
$result = $conn->query($sql);
?>