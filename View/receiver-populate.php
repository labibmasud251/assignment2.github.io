<?php
include("includes/connect.php");
$stmt = $conn->prepare("SELECT * FROM clients WHERE id=? AND receiver=1" );
$stmt->execute(array($_SESSION["receiver_id"]));
$result = $stmt->fetch();
$name = $result["name"];
$email = $result["email"];
$contact = $result["contact"];
$address = $result["address"];
?>