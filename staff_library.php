<?php
    include('includes/connect.php');
    // session_start();
    // $email = $_SESSION['user_data']['MEMBER_EMAIL'];
    // echo $email;
    
    include('includes/header.php');
    include('includes/staff-navbar.php');
    // include('includes/navbar.php');  

?>

<?php

function do_fetch($stid)
{
//   Fetch the results in an associative array
  print '<table border="1" class="table">';
  print '<thead class="thead-dark">';
  print '<tr>';
  print '<th scope="col">ISBN</th>';
  print  '<th scope="col">AUTHOR ID</th>';
  print  '<th scope="col">PUBLISHER ID</th>';
  print  '<th scope="col">TITLE</th>';
  print  '<th scope="col">CATEGORY</th>';
  print  '<th scope="col">PUBLISH DATE</th>';
  print  '<th scope="col">PRICE</th>';
  print  '<th scope="col">RACK NO</th>';
  print  '<th scope="col">ARRIVAL DATE</th>';
  print  '<th scope="col">BOOK STATUS</th>';
  print '</tr>';    
  print '</thead>';
  while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
     print '<tr>';
     foreach ($row as $item) {
         print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
     }
     print '</tr>';
  }
  print '</table>';
}


$query = 'select * from books';
$stid = oci_parse($conn, $query);
oci_execute($stid);
oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
// Fetch each row in an associative array
if(oci_num_rows($stid) > 0 ){
    
?>
<div class="tb-box d-flex justify-content-center">
    <?php
        do_fetch($stid);

    ?>
</div>
<?php
} else {
    echo "Table is empty!";
}

?>

<div class="button-groups">
    <button class="btn btn-lg btn-primary" onclick="document.location='staff_add_book.php'">Add book</button>
</div>


<?php 
    include('includes/footer.php');
?>