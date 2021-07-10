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
  print '<th scope="col">STAFF ID</th>';
  print  '<th scope="col">MANAGER ID</th>';
  print  '<th scope="col">NAME</th>';
  print  '<th scope="col">ADDRESS</th>';
  print  '<th scope="col">EMAIL</th>';
  print  '<th scope="col">PHONE</th>';
  print  '<th scope="col">JOB</th>';
  print  '<th scope="col">SALARY</th>';
  print  '<th scope="col">HIRE DATE</th>';
  print  '<th scope="col">COMMISION</th>';
  print  '<th scope="col">USERNAME</th>';
  print  '<th scope="col">PASSWORD</th>';
  print  '<th scope="col">REGISTER DATE</th>';
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


$query = 'select * from staff';
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

<?php 
    include('includes/footer.php');
?>