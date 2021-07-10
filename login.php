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
	     <form class="form-signin" action="login-process.php" method="post">
	     	<div class="form-group">
	    	    <h2 class="form-signin-heading text-center">Please Login</h2>
		    </div>
	        <div class="form-group">
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
	  		</div>
	        <div class="form-group">
		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		    </div>
		    <div class="form-group">
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
		    </div>
			<div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" onclick="document.location='index.php'">Main Page</button>
		    </div>
			<div>
			  <a href="forgot.php">Forgot password?</a>
			  <p>New <?php
			   session_start();
			   $role = $_SESSION['role'];
			   echo $role;
			   ?>? Please <a href="<?php
			   $role = $_SESSION['role'];
				
				if($role == "member"){
					echo htmlspecialchars("member_register.php");
				} else if($role == "staff"){
					echo htmlspecialchars("staff_register.php");
				}

			   ?>">register.</a></p>
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
