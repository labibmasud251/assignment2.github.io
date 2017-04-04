<?php
session_start();
if(!isset($_SESSION['logged_admin'])){
    header('Location:index.php');
}
include("includes/functions.php");
include("includes/header.php");
include("includes/nav-bar.php");
include("includes/connect.php");
$id = $_GET['id'];
$pId = $_GET['pId'];
$alertMessage="";
if(isset($_POST['accept'])){
    $newName    = validateFormData($_POST['name']);
    $newAddress = validateFormData($_POST['address']);
    $newLicense = validateFormData($_POST['license']);
    $newPlate   = validateFormData($_POST['plate']);
    $newContact = validateFormData($_POST['contact']);
    $accept1=$conn->prepare("UPDATE clients SET name=?, contact=?, address=? WHERE id=?");
    $accept1->execute(array($newName,$newContact,$newAddress,$id));
    $accept2=$conn->prepare("UPDATE provider SET dLicense=?, numPlate=? WHERE pId=?");
    $accept2->execute(array($newLicense,$newPlate,$pId));
    header("Location:admin_provider.php");
}


if(isset($_POST['delete'])){
    $alertMessage   =   "<div class='alert alert-danger'>
                            <p>Are you sure you wanna remove this user?</p><br>
                            <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."?id=$id&pId=$pId' method='post'>
                                <input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Delete'>
                                <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>No</a>
                            </form>
                        </div>";
}


if(isset($_POST['confirm-delete'])){
    $delete1=$conn->prepare("DELETE FROM clients where id=?");
    $delete2=$conn->prepare("DELETE FROM provider where pId=?");
    $delete2->execute(array($pId));
    $delete1->execute(array($id));
    header("Location:admin_provider.php");
}


$stmt1=$conn->prepare("SELECT * FROM clients WHERE id=?");
$stmt1->execute(array($id));
$result1=$stmt1->fetch();
$stmt2=$conn->prepare("SELECT * FROM provider WHERE pId=?");
$stmt2->execute(array($pId));
$result2=$stmt2->fetch();
$name=$result1['name'];
$contact=$result1['contact'];
$address=$result1['address'];
$license=$result2['dLicense'];
$plate=$result2['numPlate'];

?>
<div class="container">
    <h1>Edit Info</h1>
    <?php echo $alertMessage; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $id ?>&pId=<?php echo $pId ?>" method="post" class="row">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
        </div>
        <div class="form-group">
            <label for="license">License Number</label>
            <input type="text" class="form-control" id="license" name="license" value="<?php echo $license; ?>">
        </div>
        <div class="form-group">
            <label for="plate">Plate Number</label>
            <input type="text" class="form-control" id="plate" name="plate" value="<?php echo $plate; ?>">
        </div>
        <button name="accept" type="submit" class="btn btn-success">Save</button>
        <button name="delete" type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
</body>
</html>