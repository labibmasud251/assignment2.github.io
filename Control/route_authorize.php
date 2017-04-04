<?php
session_start();
if(!isset($_SESSION['logged_admin'])){
    header('Location:index.php');
}
include("includes/header.php");
include("includes/nav-bar.php");
include("includes/connect.php");
include("includes/functions.php");

if(isset($_POST["authorize"])){
    $charge = $_POST["charge"];
    $charge = validateFormData($charge);
    $stmt1=$conn->prepare("UPDATE stops SET price=? WHERE destination=? AND pro_id=?");
    $stmt1->execute(array($charge,$_GET["des"],$_GET["id"]));
    header("Location:route_authorize.php");
}

$stmt=$conn->prepare("SELECT * FROM stops INNER JOIN clients ON stops.pro_id=clients.id WHERE price=0 ORDER BY pro_id");
$stmt->execute();


?>
<div class="container-fluid">
    <table class="table table-condensed table-bordered">
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Destination</th>
            <th>Charge</th>
            <th>Option</th>
        </tr>
        <?php
        while($result=$stmt->fetch()){
            echo "<tr>";
            echo "<td>".$result['name']."</td><td>".$result['contact']."</td><td>".$result['destination']."</td>";
            echo    "<td>
                        <form id='charge' action='".htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$result["id"]."&des=".$result["destination"]."' method='post'>
                            <div class='form-group'>
                                <input name='charge' type='number' min='1' max='100' class='form-control' placeholder='in Taka'>
                            </div>
                        </form>
                    </td>
                    <td>
                        <input type='submit' class='btn btn-primary btn-sm' name='authorize' form='charge' value='Authorize'>
                    </td>
                </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>