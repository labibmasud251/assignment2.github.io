<?php
$servername="localhost";
$database="rb147258_getaride";
$user="root";
$pass="Rab@7274389";
$conn=new PDO("mysql:hostname=$servername;dbname=$database",$user,$pass);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>