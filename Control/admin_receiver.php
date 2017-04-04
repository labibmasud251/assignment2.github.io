<?php
session_start();
if(!isset($_SESSION['logged_admin'])){
    header('Location:index.php');
}
include("includes/header.php");
include("includes/nav-bar.php");
include("includes/connect.php");
$stmt=$conn->prepare("SELECT * FROM clients WHERE authorized=1");
$stmt->execute();
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
            echo '<td><a href="receiver_edit.php?id='.$result['id'].'" type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a></td>';
        }
        ?>
    </table>
</div>

</body>
</html>