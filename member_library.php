<?php
    include('includes/connect.php');
    include('includes/header.php');
    include('includes/member-navbar.php');
?>

<div class="container py-5">
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center">Library Books</h1>
    </div>
  </div>
  <div class="row mt-4">
    <?php 
    $query = "select * from books where book_status = 'Available'";
    $stid = oci_parse($conn,$query);
    oci_execute($stid, OCI_DEFAULT);
    oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
    if(oci_num_rows($stid) > 0){
      while(($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) != false) {
        ?>
        <div class="col-md-3 mt-3">
          <div class="card">
            <img src="assets/svg/default-book.svg" alt="default-book">
            <div class="card-body">
              <h4 class="card-title"><?php echo $row['BOOK_TITLE'];?></h4>
              <h3 class="card-title"><?php echo $row['AUTHOR_ID'];?></h3>
              <h3 class="card-title"><?php echo $row['PUBLISHER_ID'];?></h3>
              <p class="card-text">
                <?php echo $row['BOOK_CATEGORY']?>
              </p>
              <p class="card-text">
                <?php echo $row['BOOK_PUBLISH_DATE']?>
              </p>
              <p class="card-text">
                <?php echo $row['RACK_NUM']?>
              </p>
              <p class="card-text">
                <?php echo $row['ARRIVAL_DATE']?>
              </p>
          </div>
        </div>

        <?php
      }
    }

    ?>
  </div>
</div>


<?php 
    include('includes/footer.php');
?>  