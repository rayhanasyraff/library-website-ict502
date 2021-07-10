<?php
    include('includes/connect.php');
    include('includes/header.php');
    include('includes/staff-navbar.php');

    $header = array("ID","MANAGER","NAME","ADDRESS","EMAIL","PHONE","JOB","SALARY","HIRE DATE","COMISSION","USERNAME","PASSWORD","REGISTER DATE");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
        </div>
        <div class="profile-box">
            <h2>My Profile</h2>
            <?php
            $count= 0;
            foreach($_SESSION['user_data'] as $x => $val){

            ?>
            <div class="subprofile-box">
                <h5><?php echo $header[$count]; ?></h5>
                <h4><?php if(isset($val)){
                        echo $val; } else
                        {
                            echo "None";
                        }
                    ?></h4>
            </div>
            <?php
            
            $count++;
              }  ?>
        </div>
        <div class="col-lg-4">
        </div>
    </div>

</div>




<?php 
    include('includes/footer.php');
?>