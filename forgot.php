<?php
	// page header - header.php
	include('includes/header.php');
	include('includes/connect.php');
?>
    <div class="container">
        <div class="row">
            <?php if(isset($_REQUEST['error'])){ ?>
            <div class="col-lg-12">
                <span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
            </div>
            <?php } ?>
        </div>
   	<div class="row">
   		<div class="col-lg-4">
   		</div>
   		<div class="col-lg-4">
	     <form class="form-signin" action="forgot-process.php" method="post">
	     	<div class="form-group">
	    	    <h2 class="form-signin-heading text-center">Forgot Password</h2>
		    </div>
	        <div class="form-group">
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
	  		</div>
	        <div class="form-group">
		        <label for="inputNewPassword" class="sr-only">New Password</label>
		        <input type="password" name="new-password" id="inputNewPassword" class="form-control" placeholder="New Password" required>
		    </div>
            <div class="form-group">
		        <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
		        <input type="password" name="confirm-password" id="inputComfirmPassword" class="form-control" placeholder="Confirm Password" required>
		    </div>
		    <div class="form-group">
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Change Password</button>
		    </div>
		    <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" onclick="document.location='login.php'">Go back</button>
		    </div>
	      </form>
		</div>
	    <div class="col-lg-4">
   		</div>
	  </div>
    </div>

<?php
	// page footer - footer.php
	include('includes/footer.php');
?>
