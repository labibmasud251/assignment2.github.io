<?php
session_start();
if(!isset($_SESSION["provider_id"])){
    header("Location:index.php");    
}

include("includes/connect.php");

$delete = $conn->prepare("DELETE FROM stops WHERE destination=? AND pro_id=?");
$delete->execute(array($_GET["des"],$_GET["id"]));

header("Location:stops.php");
?>