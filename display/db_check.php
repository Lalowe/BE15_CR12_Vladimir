<?php

require_once("conn.php");

$sql = "SELECT * FROM destinations WHERE id=$id";


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name=@$row['name'] ?: null;
$price=@$row['price'] ?: null;

mysqli_close($conn);