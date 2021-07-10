<?php
	// page header - header.php
	include('includes/header.php');
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
	     <form class="form-signin" action="register-process.php" method="post">
	     	<div class="form-group">
	    	    <h2 class="form-signin-heading text-center">Please Register</h2>
		    </div>
            <div class="form-group">
		        <label for="inputName" class="sr-only">Full Name</label>
		        <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
	  		</div>
            <div class="form-group">
		        <label for="inputAddress" class="sr-only">Address</label>
		        <input type="text" id="inputAddress" name="address" class="form-control" placeholder="Address" required autofocus>
	  		</div>
	        <div class="form-group">
		        <label for="inputPhone" class="sr-only">Phone Number</label>
		        <input type="text" id="inputPhone" name="phone" class="form-control" placeholder="Phone Number" required autofocus>
	  		</div>
            <div class="form-group">
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
	  		</div>
            <div class="form-group">
		        <label for="inputUsername" class="sr-only">Username</label>
		        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
	  		</div>  
	        <div class="form-group">
		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		    </div>
            <div class="form-group">
		        <label for="inputConfirmPassword" class="sr-only">Confirm Password</label>
		        <input type="password" name="confirmPassword" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required>
		    </div>
            <div class="form-group form-check form-check-inline">
                <input type="checkbox" name="agreement" class="form-check-input" required>
                <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree <a href="#">term, conditions, and policy </a>(*) </label>
            </div>
		    <div class="form-group">
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
		    </div>
			<div>
			  <p>Already a member? Please <a href="login.php">login.</a></p>
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
