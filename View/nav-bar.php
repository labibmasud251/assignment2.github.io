<?php
if(isset($_POST['receiver'])){
    header("Location:receiver_authorize.php");
}
if(isset($_POST['provider'])){
    header("Location:provider_authorize.php");
}
if(isset($_POST['routes'])){
    header("Location:route_authorize.php");
}
?>
<nav class="navbar navbar-inverse navbar-default">
  		<div class="container">
    		<!-- Brand and toggle get grouped for better mobile display -->
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand" href="admin_page.php">Get@Ride</a>
    		</div>

    		<!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
        			<li><a href="#" data-toggle="modal" data-target="#decideClient">Authorize</a></li>
        			<li><a href="admin_provider.php">Provider</a></li>
                    <li><a href="admin_receiver.php">Receiver</a></li>
                    <li><a href="admin_receiver.php">Payment</a></li>
      			</ul>
      			<ul class="nav navbar-nav navbar-right">
        			<li><button onclick="window.location='logout.php'" class="btn btn-default navbar-btn">Logout</button></li>
     			 </ul>
    		</div><!-- /.navbar-collapse -->
            <div class="modal fade" id="decideClient" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Choose Type of Client</h3>
                        </div>
                        <!-- button -->
                        <div class="modal-footer">
                            <form id="log-in" acion="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form">
                                <input class="btn btn-primary btn-sm" type="submit" name="receiver" value="Receiver">
                                <input class="btn btn-primary btn-sm" type="submit" name="provider" value="Provider">
                                <input class="btn btn-primary btn-sm" type="submit" name="routes" value="Routes">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
  		</div>
	</nav>