<?php
	// page header - header.php
	include('includes/header.php');
?>
    <div class="box-container">
        <form action="index-process.php" method="post" class="d-flex flex-row justify-content-center">
            <div class="box d-flex flex-column">
                <div class="icons align-self-center">
                    <i class="material-icons">person</i>
                </div>
                <button name="role" value="member" class="button" type="submit">Member</button>
            </div>
            <div class="box d-flex flex-column">
                <div class="icons align-self-center">
                    <i class="material-icons">person</i>
                </div>
                <button name="role" value="staff" class="button" type="submit">Staff</button>
            </div>
        </form>        
    </div>       


<?php
	// page footer - footer.php
	include('includes/footer.php');
?>
