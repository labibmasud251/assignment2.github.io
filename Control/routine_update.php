<?php
session_start();
if(!isset($_SESSION["provider_id"])){
    header("Location:index.php");    
}

include("includes/connect.php");

if(isset($_POST["add"])){
    $insert = $conn->prepare("INSERT INTO schedule(id, day, departure) VALUES(?,?,?)");
    $insert->execute(array($_SESSION["provider_id"],$_POST["day"],$_POST["departure"]));
    header("Location:routine.php");
}
?>