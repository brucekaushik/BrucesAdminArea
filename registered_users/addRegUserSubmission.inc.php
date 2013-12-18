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

// check if there is no bad input
if( $username != "bad input" && $password != "bad input" && $full_name != "bad input"){
	
    // check if the username is already available
    $usernamesQuery = "select * from AdminArea";
    $usernamesRes = mysql_query($usernamesQuery,$c);

    while($usernamesArray = mysql_fetch_array($usernamesRes, MYSQL_ASSOC)){
        
        foreach ($usernamesArray as $key => $val){
            
            if($key == "username"){
                                    
                if($val == $username){

                    $availability = "no";
                    break;

                }
                
            }
        }
        
    }
	
    // if username is not available display username taken message.
    if(isset($availability)){

        print "<div style='color: red; font-weight:bold;' class='centeralign'><br><br>Username taken. Try Again</div>";

    }
    // else add the regUser to the database 
    else{

        $dataInsert = "insert into AdminArea set 
        full_name='$full_name',username='$username',password='$password',
        active='$active',level='$level',comments='$comments'";

        mysql_query($dataInsert, $c) or die ("some problem adding the reg user");

        print "<div style='color: green; font-weight:bold;' class='centeralign'><br><br>RegUser Added.</div>";

    }
	
}
// if there is bad input
else {
	
    print "<div style='color: red; font-weight:bold;' class='centeralign'><br><br>Somethin' Fishy! Bad input.</div>";
	
}

?>