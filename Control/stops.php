<?php
session_start();
if(!isset($_SESSION["provider_id"])){
    header("Location:index.php");    
}
include("includes/header.php");
include("includes/provide-profile-nav.php");
include("includes/connect.php");

$stmt = $conn->prepare("SELECT * FROM stops WHERE pro_id=?");
$stmt->execute(array($_SESSION["provider_id"]));

if(isset($_POST["add"])){
    $add = $conn->prepare("INSERT INTO stops(destination,pro_id) VALUES(?,?)");
    $add->execute(array($_POST["stop"],$_SESSION["provider_id"]));
    header("Location:stops.php");
}

?>

<nav class="container">
    <table class="table table-condensed">
        <tr>
            <th>Stop</th>
            <th>Price</th>
            <th>Option</th>
        </tr>
        <?php
        while($result = $stmt->fetch()){
            echo "<tr>";
            echo
                "<td>".$result['destination']."</td><td>".$result['price']."</td><td><a href='stops_delete.php";
            echo "?des=".$result['destination']."&id=".$_SESSION["provider_id"]."' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <input class="form-control" type="text" name="stop">
        </div>
        <button class="btn btn-primary" type="submit" name="add">Add</button>
    </form>
</nav>

</body>
</html>