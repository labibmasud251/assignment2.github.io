<?php
session_start();
if(!isset($_SESSION["receiver_id"])){
    header("Location:index.php");    
}
include("includes/header.php");
include("includes/receiver-profile-nav.php");
include("includes/receiver-populate.php");
include("includes/functions.php");

if(isset($_POST["update"])){
    
    $nName = $_POST["name"];
    $nContact = $_POST["contact"];
    $nAddress = $_POST["address"];
    $oPassword = $_POST["old_password"];
    $nPassword = $_POST["new_password"];
    $vPassword = $_POST["verify_password"];
    
    $nName = validateFormData($nName);
    $nContact = validateFormData($nContact);
    $nAddress = validateFormData($nAddress);
    $oPassword = validateFormData($oPassword);
    $nPassword = validateFormData($nPassword);
    $vPassword = validateFormData($vPassword);
    
    $check = $conn->prepare("SELECT password FROM clients WHERE id=?");
    $check->execute(array($_SESSION["receiver_id"]));
    $details = $check->fetch();
    if(password_verify($oPassword,$details["password"])){
        if($_POST["new_password"] != null){
            if($nPassword == $vPassword){
                $newPassHash = password_hash($nPassword,PASSWORD_DEFAULT);
                $pass = $conn->prepare("UPDATE clients SET password=? WHERE id=?");
                $pass->execute(array($newPassHash,$_SESSION["receiver_id"]));
            }
        }
        $update = $conn->prepare("UPDATE clients SET name=?, contact=?, address=? WHERE id=?");
        $update->execute(array($nName, $nContact, $nAddress, $_SESSION["receiver_id"]));
        header("Location:receiver_editinfo.php");
        
    }
    else{
        echo "Wrong password";
    }
    
}
?>

<nav class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Name: </label>
            <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label>Contact: </label>
            <input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">
        </div>
        <div class="form-group">
            <label>Address: </label>
            <input class="form-control" type="text" name="address" value="<?php echo $address; ?>">
        </div>
        <div class="form-group">
            <label>Old Password: </label>
            <input class="form-control" type="password" name="old_password">
        </div>
        <div class="form-group">
            <label>New Password: </label>
            <input class="form-control" type="password" name="new_password">
        </div>
        <div class="form-group">
            <label>Verify Password: </label>
            <input class="form-control" type="password" name="verify_password">
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="provider_profile.php" class="btn btn-danger" role="button">Cancel</a>
    </form><br><br>
</nav>

</body>
</html>