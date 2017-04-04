<?php
session_start();
if(!isset($_SESSION["logged_admin"])){
	header("Location:index.php");
}
include("includes/header.php");
include("includes/nav-bar.php");
?>
    <div class="container">
        <?php echo "<h1>Welcome</h1><br><h3>".$_SESSION["logged_admin"]."</h3>" ?>
    </div>
	
</body>
</html>