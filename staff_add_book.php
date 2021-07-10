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
	     <form class="form-signin" action="staff_add_process.php" method="post">
	     	<div class="form-group">
	    	    <h2 class="form-signin-heading text-center">Add Book</h2>
		    </div>
            <div class="form-group">
		        <label for="inputISBN" class="sr-only">Book ISBN</label>
		        <input type="text" id="inputISBN" name="ISBN" class="form-control" placeholder="ISBN" required autofocus>
	  		</div>
            <div class="form-group">
		        <label for="inputTitle" class="sr-only">Book Title</label>
		        <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Title" required autofocus>
	  		</div>
            <div class="form-group">
		        <label for="inputAuthor" class="sr-only">Author ID</label>
		        <input type="text" id="inputAuthor" name="author" class="form-control" placeholder="Author ID" required autofocus>
	  		</div>
	        <div class="form-group">
		        <label for="inputPublisher" class="sr-only">Publisher ID</label>
		        <input type="text" id="inputPublisher" name="publisher" class="form-control" placeholder="Publisher ID" required autofocus>
	  		</div>
            <div class="form-group">
		        <label for="inputCategory" class="sr-only">Book Category</label>
		        <input type="text" id="inputCategory" name="category" class="form-control" placeholder="Category" required autofocus>
	  		</div>
            <div class="form-group">
                <label   label for="inputPublishDate" class="sr-only">Publish Date</label>
		        <input type="text" id="inputPublishDate" name="publish-date" class="form-control" placeholder="Publish Date" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required autofocus>
	  		</div>  
	        <div class="form-group">
		        <label for="inputPrice" class="sr-only">Book Price</label>
		        <input type="number" name="price" id="inputPrice" class="form-control" placeholder="Price" required>
		    </div>
            <div class="form-group">
		        <label for="inputRackNum" class="sr-only">Rack Number</label>
		        <input type="text" name="rack-num" id="inputRackNum" class="form-control" placeholder="Rack Number" required>
		    </div>
            <div class="form-group">
                <label   label for="inputArrivalDate" class="sr-only">Arrival Date</label>
		        <input type="text" id="inputArrivalDate" name="arrival-date" class="form-control" placeholder="Arrival Date" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" required autofocus>
	  		</div> 
		    <div class="form-group">
		        <button name="add" value="book" class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
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
