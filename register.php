<?php

// start a session
session_start();

// include database connections
require 'includes/dbConnect.inc.php';

/*
echo "Username => " . $_SESSION['username'] . "<br>";
echo "User Level =>" . $_SESSION['user_level'] . "<br>";
echo "User Active? => " . $_SESSION['user_active'] . "<br>";
echo "Logged In? => " . $_SESSION['loggedin'] . "<br>";
echo "Logged Out? => " . $_SESSION['loggedout'] . "<br>";
//*/

// if the registration request is submitted
if(isset($_GET["action"])){
	
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
        	
        	print "<div class='centeralign'><br><br><a href='index.php'>click here to go to the login page</a>.</div>";
	
    	}
	
	}
	// if there is bad input
	else {
	
		print "<div style='color: red; font-weight:bold;' class='centeralign'><br><br>Somethin' Fishy! Bad input.</div>";
	
	}
	
}

?>

<!DOCTYPE a PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>User Registration Page</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<div class="container">
	
	    <div class="formscontainer">
			
			<div style="color: red; font-weight:bold;" class="centeralign"><br><br>Register using the form below</div><br>		
	        <div style='color: grey; font-size: 13px;'>You can use only a-z A-Z 0-9 and _ in the fileds below, Any other characters added will be removed automatically, This applies for username, password, and full name fields.<br><br> Also, note that max number of characters allowed are 20 per field, you will see an error if exceeded.</div><br>
			
	        <form action="register.php?action=RegisterRequest" method="post">
	
	            <table>
	                <tr>
	                    <td>Full Name</td>
	                    <td><input type="text" name="full_name"></td>
	                </tr>
	                <tr>
	                    <td>Username</td>
	                    <td><input type="text" name="username"></td>
	                </tr>
	                <tr>
	                    <td>Password</td>
	                    <td><input type="text" name="password"></td>
	                </tr>
	                
	                <tr>
	                    <td>Comments</td>
	                    <td><textarea rows="5" cols="20" name="comments"></textarea></td>
	                </tr>
	            </table>
				
				<input type="hidden" name="active" value="yes">
	            <input type="hidden" name="level" value="reg"><br><br>
	            <center><input type="submit" value="submit" style="width: 100px"></center>
	
	        </form>
			
	    </div>
		
	</div>

</body>
</html>
