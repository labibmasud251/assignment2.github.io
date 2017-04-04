<?php
include("includes/connect.php");
$stmt = $conn->prepare("SELECT * FROM clients WHERE id=? AND receiver=0" );
$stmt->execute(array($_SESSION["provider_id"]));
$result = $stmt->fetch();
$stmt1 = $conn->prepare("SELECT * FROM provider WHERE client_id=?" );
$stmt1->execute(array($result["email"]));
$result1 = $stmt1->fetch();
$name = $result["name"];
$email = $result["email"];
$contact = $result["contact"];
$address = $result["address"];
$license = $result1["dLicense"];
$plate = $result1["numPlate"];
$pId = $result1["pId"]
?>