<?php 

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$comments = $_POST['comments'];

if (isset($_POST['active'])){
    $active = "yes";
}else {
    $active = "no"; 
}

$dataInsert = "delete from AdminArea where username='$username'";

mysql_query($dataInsert, $c) or die ("some problem adding the admin");

print "<div style='color: green; font-weight:bold;' class='centeralign'><br><br>Admin Deleted.</div>";

?>