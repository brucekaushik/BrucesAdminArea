<?php

require 'includes/serverSideValidation.inc.php'; // for server side validation

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$comments = $_POST['comments'];

$full_name = validate_string($full_name);
$username = validate_string($username);
$password = validate_string($password);

if (isset($_POST['active'])){
    $active = "yes";
}else {
    $active = "no"; 
}

$dataInsert = "update AdminArea set 
full_name='$full_name',username='$username',password='$password',
active='$active',level='$level',comments='$comments' where username='$username'";

mysql_query($dataInsert, $c) or die ("some problem editing the reg user");

print "<div style='color: green; font-weight:bold;' class='centeralign'><br><br>RegUser Edited.</div>";

?>