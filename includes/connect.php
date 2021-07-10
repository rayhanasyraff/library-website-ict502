<?php
// Create connection to Oracle
$conn = oci_connect("library255", "system", "localhost:1521/xe");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
// else {
//    print "Connected to Oracle!";
// }
// Close the Oracle connection
// oci_close($conn);
// $query = 'select * from member';
// $stid = oci_parse($conn, $query);
// $r = oci_execute($stid);

// // Fetch each row in an associative array
// print '<table border="1">';
// while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
//    print '<tr>';
//    foreach ($row as $item) {
//        print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
//    }
//    print '</tr>';
// }
// print '</table>';
?>