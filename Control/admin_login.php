<?php
session_start();
if(isset($_SESSION["logged_admin"])){
	header("Location:admin_page.php");
}
else{
    if(isset($_SESSION["provider_id"])){
        header("Location:provider_profile.php");
    }
}
if(isset($_POST["submit"])){
	if(empty($_POST["username"]) || empty($_POST["password"])){
		echo '<script>alert("Enter all the fields");</script>';
    }
    else{
        include('includes/connect.php');
        include('includes/functions.php');
        $login=validateFormData($_POST['username']);
        $password=validateFormData($_POST['password']);
	    $stmt=$conn->prepare("SELECT * FROM admin WHERE username=?");
	    $stmt->execute(array($login));
	    if($result=$stmt->fetch()){
            $hashedPass=$result['password'];
	        if(password_verify($password,$hashedPass)){
                $_SESSION['logged_admin'] = $result['name'];
                header('Location:admin_page.php');
            }
            else{
                echo '<script>alert("Wrong Credentials")</script>';
            }
        }
        else{
            $stmt1=$conn->prepare("SELECT * FROM clients WHERE email=?");
            $stmt1->execute(array($login));
            if($result1=$stmt1->fetch()){
                $hashedPass=$result1["password"];
                if(password_verify($password,$hashedPass)){
                    if($result1["authorized"]==1){
                        if($result1["receiver"]==0){
                            $_SESSION["provider_id"] = $result1["id"];
                            header("Location:provider_profile.php");
                        }
                        else{
                            $_SESSION["receiver_id"] = $result1["id"];
                            header("Location:receiver_profile.php");
                        }
                    }
                    else{
                        echo "Account not Authorized Yet! Please wait for Auhthorization";
                    }
                    
                }
                else{
                    echo '<script>alert("Wrong Credentials")</script>';
                }
            }
            else{
                echo '<script>alert("Wrong Credentials")</script>';
            }
        }
        
	   $conn=null;
    }
		
}

?>