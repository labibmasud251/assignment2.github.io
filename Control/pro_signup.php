<?php
if(isset($_POST['provide'])){
    if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['pass']) && empty($_POST['contact']) && empty($_POST['address']) && empty($_POST['license']) && empty($_POST['plate'])){
        echo "<script> alert('Enter All the Fields');</script>";
    }
    else{
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $license=$_POST['license'];
        $plate=$_POST['plate'];
        
        include('includes/functions.php');
        
        $name=validateFormData($name);
        $pass=validateFormData($pass);
        $email=validateFormData($email);
        $contact=validateFormData($contact);
        $address=validateFormData($address);
        $license=validateFormData($license);
        $plate=validateFormData($plate);
        
        $hashedpass=password_hash($pass,PASSWORD_DEFAULT);
        
        include('includes/connect.php');
        
        $stmt1 = $conn->prepare("SELECT id FROM clients WHERE email=? OR contact=?");
        $stmt1->execute(array($email,$contact));
        
        if($result=$stmt1->fetch()){
            echo "User already present";
        }
        else{
            $stmt2 = $conn->prepare("INSERT INTO clients(name,contact,email,password,address,receiver) VALUES (?,?,?,?,?,?)");
            $stmt3 = $conn->prepare("INSERT INTO provider(dLicense,numPlate,client_id) VALUES(?,?,?)");
            $stmt2->execute(array($name,$contact,$email,$hashedpass,$address,0));
            $stmt3->execute(array($license,$plate,$email));
            echo "You have been signed up. We will contact you soon for verification";
        }
        
        
    }
}
?>