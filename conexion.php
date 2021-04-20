<?php
/*
$dbh = mysqli_connect('localhost', 'u327958295_crist', 'r3yCr1st0', 'u327958295_tiend');
if ($dbh->connect_error) {
    die('Connect Error (' . $dbh->connect_errno . ') ' . $dbh->connect_error);
}
*/

/* localhost */

$dbh = mysql_connect ("127.0.0.1", "u327958295_crist", "r3yCr1st0") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("u327958295_tiend"); 

?>