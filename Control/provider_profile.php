<?php
session_start();
if(!isset($_SESSION["provider_id"])){
    header("Location:index.php");    
}
include("includes/header.php");
include("includes/provide-profile-nav.php");
include("includes/provide-populate.php");
?>

<nav class="container">
    <h1>Welcome</h1><br>    
    <div class="panel panel-default">
        <div class="panel-body">
            <label>Name: </label>
            <span><?php echo $name ?></span><br>
            <label>Email: </label>
            <span><?php echo $email ?></span><br>
            <label>Contact: </label>
            <span><?php echo $contact ?></span><br>
            <label>Address: </label>
            <span><?php echo $address ?></span><br>
            <label>License Number: </label>
            <span><?php echo $license ?></span><br>
            <label>Plate Number: </label>
            <span><?php echo $plate ?></span><br>
        </div>
    </div>
</nav>

</body>
</html>