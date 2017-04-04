<?php
session_start();
if(!isset($_SESSION["provider_id"])){
    header("Location:index.php");    
}
include("includes/header.php");
include("includes/provide-profile-nav.php");
include("includes/connect.php");
$list = $conn->prepare("SELECT * FROM schedule WHERE id=?");
$list->execute(array($_SESSION["provider_id"]));

?>

<nav class="container">
    
    <table class="table table-condensed">
        <tr>
            <th>Day</th>
            <th>Departure</th>
            <th>Option</th>
        </tr>
        <?php
        while($result = $list->fetch()){
            echo "<tr>";
            echo "<td>".$result["day"]."</td><td>".$result["departure"]."</td><td><a href='routine_delete.php' class='btn btn-danger' role='button'><span class='glyphicon glyphicon-remove'></span></a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    
    <form action="routine_update.php" method="post">
        <div class="form-group">
            <label>Day:</label>
            <input class="form-control" type="text" name="day" placeholder="ALL CAPITAL LETTERS e.g. SUNDAY">
        </div>
        <div class="form-group">
            <label>Time Of Departure</label>
            <input class="form-control" type="text" name="departure" placeholder="Hour:Minutes AM/PM">
        </div>
        <button class="btn btn-primary" type="submit" name="add">Add</button>
    </form>
</nav>

</body>
</html>