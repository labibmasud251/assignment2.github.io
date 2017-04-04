<?php
include('admin_login.php');
if(isset($_SESSION["logged_admin"])){
    header("Location:admin_page.php");
}
else{
    if(isset($_SESSION["provider_id"])){
        header("Location:provider_profile.php");    
    }
    else{
        if(isset($_SESSION["receiver_id"])){
            header("Location:receiver_profile.php");    
        }
    }
}
include('pro_signup.php');
include('rec_signup.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Get@Ride</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">GET@RIDE</a>
            </div>

            <!-- Menu Items -->
            <div>
                <ul class="nav navbar-nav">
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-toggle="modal" data-target="#popUpWindow">LOGIN</a></li>
                </ul>
            </div>       
    </nav>
    <div class="container">
    	<div class="row">
    	    <div class="col-md-6">
    	    	<h1>Join as a Provider</h1>
    	    	<p>If you own a car and interested in helping out your fellow students or colleagues then join here</p>
    	    	<a class="btn btn-primary btn-lg" role="button" href="#" data-toggle="modal" data-target="#provideWindow">Provide</a>
    	    </div>
    	    <div class="col-md-6">
    	    	<h1>Want a Ride?</h1>
    	    	<p>Want to get a ride while commuting between Brac university and your home then Sign Up here</p>
    	    	<a class="btn btn-primary btn-lg" role="button" href="#" data-toggle="modal" data-target="#rideWindow">Get@Ride</a>
    	    </div>
    	    </div>
    	</div>
    </div>

    <div class="modal fade" id="popUpWindow" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Log In</h3>
                </div>

                <!-- body (form) -->
                <div class="modal-body">
                    <form id="log-in" acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Username/Email">
                        </div>
                        <div class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                    </form>
                </div>

                <!-- button -->
                <div class="modal-footer">
                    <input name="submit" type="submit" value="Submit" form="log-in" class="btn btn-primary btn-block"><br>
                </div>

            </div>
        </div>
    </div>
    
    <div class="modal fade" id="provideWindow" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Provider Sign Up</h3>
                </div>

                <!-- body (form) -->
                <div class="modal-body">
                    <form id="provide_signup" acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input name="contact" type="text" class="form-control" placeholder="Personal Contact Number">
                        </div>
                        <div class="form-group">
                            <input name="address" type="text" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input name="license" type="text" class="form-control" placeholder="Driver License Number">
                        </div>
                        <div class="form-group">
                            <input name="plate" type="text" class="form-control" placeholder="Car Plate">
                        </div>
                    </form>
                </div>

                <!-- button -->
                <div class="modal-footer">
                    <input name="provide" type="submit" value="Sign Up" form="provide_signup" class="btn btn-primary btn-block"><br>
                </div>

            </div>
        </div>
    </div>
    
    <div class="modal fade" id="rideWindow" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Sign Up</h3>
                </div>

                <!-- body (form) -->
                <div class="modal-body">
                    <form id="rec_signup" acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input name="contact" type="text" class="form-control" placeholder="Personal Contact Number">
                        </div>
                        <div class="form-group">
                            <input name="address" type="text" class="form-control" placeholder="Address">
                        </div>
                    </form>
                </div>

                <!-- button -->
                <div class="modal-footer">
                    <input name="rec" type="submit" value="Sign Up" form="rec_signup" class="btn btn-primary btn-block"><br>
                </div>

            </div>
        </div>
    </div>


</body>
</html>