<?php
session_start();
if(!isset($_SESSION['logged_admin'])){
    header('Location:index.php');
}
include("includes/header.php");
include("includes/nav-bar.php");
include("includes/connect.php");
$stmt=$conn->prepare("SELECT * FROM clients WHERE authorized=0 AND receiver=1");
$stmt->execute();


if(isset($_POST['authorize'])){
    $id = $_GET['id'];
    $update = $conn->prepare("UPDATE clients SET authorized=1 WHERE id=?");
    $update->execute(array($id));
    header("Location:admin_page.php");
}


?>
<div class="container-fluid">
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Option</th>
        </tr>
        <?php
        while($result=$stmt->fetch()){
            echo "<tr>";
            echo "<td>".$result['name']."</td><td>".$result['contact']."</td><td>".$result['email']."</td><td>".$result['address']."</td>";
            echo    "<td>
                        <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$result['id']."' method='post'>
                            <input type='submit' class='btn btn-primary btn-sm' name='authorize' value='Authorize'>
                        </form>
                    </td>
                </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>