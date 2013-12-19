<?php

// start a session
session_start();

// include database connections
require 'includes/dbConnect.inc.php';


echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>

<!DOCTYPE a PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>Bruce's Admin Area</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <div class="header">
	
        <h1>Bruce's Admin Area</h1>

        <!-- top navigation -->
        <div class="topnav">
            <a href='index.php'>Home</a>  
            <a href='home.php'>Refresh</a> 
            <a href='about.php'>About</a> 
            <a href='download.php'>Download</a> 
        </div>

    </div>
    
</body>
</html>

<?php

// if the user is not logged in 
if ($_SESSION['loggedin'] == "no"){
    
    // if the user did not attempt to login (did not click the login button)
    if(!isset($_POST['login'])){
        
        // if the user has logged out before, show logout successful message
        if ($_SESSION['loggedout'] == "yes"){
            print "<br><center><div style='color: red'><b>Logout Successful, Please feel free to login again.</b></div></center>";
        }
        
        if(isset($_SESSION['app_name'])){
        	echo "<center>You will be redirected to " . $_SESSION['app_name'] . "after logging in.</center>" ;
        }
        
        // show user the login form
        require 'includes/loginForm.inc.php';
        
    }
    // if the user attempted to login (clicked the login button)
    else {
    
        // for convenience sake
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // validate username and password inputs
        require 'includes/serverSideValidation.inc.php'; // for server side validation
        $val_username = validate_string($username);
        $val_password = validate_string($password);
        
        // if the username and password are valid
        if($val_username == $username && $val_password == $password){
					
            // get the row from the database that matches the username and password. (get user's row)
            $userDetailsQuery = "select * from AdminArea where username='$username' and password='$password'";
            $userDetailsRes = mysql_query($userDetailsQuery, $c);
            $userDetailsRow = mysql_fetch_array($userDetailsRes, MYSQL_ASSOC);

            // validate: check if the row returned is empty, 
            // meaning the username and password did not match
            if(count($userDetailsRow) == 1){

                // show user the bad login form
                require 'includes/badLoginForm.inc.php';

            } else{ // if username and password match

                // set session variables
                $_SESSION['username'] = $userDetailsRow['username'];
                $_SESSION['loggedin'] = "yes";
                $_SESSION['user_level'] = $userDetailsRow['level'];
                $_SESSION['user_active'] = $userDetailsRow['active'];

                // refresh page
                printf("<script>location.href='home.php'</script>");

            }
					
        } 
        // if the username and password are not valid
        else { 
						
            // show user the bad login screen
            require 'includes/badLoginForm.inc.php';
						
        }
        
    }
    
}

// if the user is logged in
if($_SESSION['loggedin'] == "yes"){
    
    // show logout link
    print "<br><center><a href='home.php?action=logout'>Logout</a></center><br>";
    
    // check if the user is active
    if($_SESSION['user_active'] == "yes"){
    	
	    // for convenience sake
        if(@$_SESSION["action"] == "VerifyLogin"){
        	
        	$url = $_SESSION['verify_back_to'];
        	
        	// redirect the user to the application page
        	printf("<script>location.href='$url'</script>");
        	           
        }

        // check level of the logged in user, display appropriate screen
        switch ($_SESSION['user_level']){
            case "root":
                require 'admin_users/rootUserDefaultScreen.inc.php';
            	break;
            case "admin":
                require 'admin_users/adminUserDefaultScreen.inc.php';
            	break;
            case "reg":
                require 'registered_users/regUserDefaultScreen.inc.php';
            	break;
        }

    }else{ // if not active

        print "<center>You account is not active, ask your administrator or root user to activate your account</center>";

    }
    
    // check if anything is clicked after logging in
    // or if action is initiated from launching an application
    if (isset($_GET['action'])){
    	
    	// for convinience
    	$action_taken = $_GET["action"];
		
        // show options according to the action taken
        switch ($action_taken){
			
            case "addAdmin":

                require 'admin_users/addAdmin.inc.php';

            	break;
			
            case "addAdminSubmission":

                require 'admin_users/addAdminSubmission.inc.php';

            	break;
			
            case "editAdmin":

                // check if the username to be edited is selected, else ask to select
                if(!isset($_POST['editUsername'])){
                    require 'admin_users/selectAdminToEdit.inc.php';
                }else{
                    require 'admin_users/editAdmin.inc.php';	
                }

            	break;
			
            case "editAdminSubmission":

                require 'admin_users/editAdminSubmission.inc.php';

            	break;
			
            case "deleteAdmin":

                // check if the username to be deleted is selected, else ask to select
                if(!isset($_POST['editUsername'])){
                    require 'admin_users/selectAdminToDelete.inc.php';
                }else{
                    require 'admin_users/deleteAdmin.inc.php';	
                }

            	break;
			
            case "deleteAdminSubmission":

                require 'admin_users/deleteAdminSubmission.inc.php';

            	break;
			
            case "addRegUser":

                require 'registered_users/addRegUser.inc.php';		

            	break;
			
            case "addRegUserSubmission":

                require 'registered_users/addRegUserSubmission.inc.php';

            	break;
			
            case "editRegUser":

                // check if the username to be edited is selected, else ask to select
                if(!isset($_POST['editUsername'])){
                    require 'registered_users/selectRegUserToEdit.inc.php';
                }else{
                    require 'registered_users/editRegUser.inc.php';;	
                }

            	break;
			
            case "editRegUserSubmission":

                require 'registered_users/editRegUserSubmission.inc.php';

            	break;
						
            case "deleteRegUser":

                // check if the username to be edited is selected, else ask to select		
                if(!isset($_POST['editUsername'])){
                    require 'registered_users/selectRegUserToDelete.inc.php';
                }else{
                    require 'registered_users/deleteRegUser.inc.php';	
                }

            	break;
			
            case "deleteRegUserSubmission":

                require 'registered_users/deleteRegUserSubmission.inc.php';

            	break;
            
            case "BlackJack":
            
            	// redirect the user to the blackjack home page.
            	printf("<script>location.href='../BrucesBlackjack/home.php'</script>");
            	 
            	break;
            
            case "ShoppingCart":
            
            	// redirect the user to the shopping cart home page.
            	printf("<script>location.href='../BrucesShoppingCart/index2.php'</script>");
            
            	break;
            
            case "Newsletter":
            	 
            	// redirect the user to the newsletter home page.
            	printf("<script>location.href='../BrucesNewsletter/index2.php'</script>");
            	 
            	break;
            
            case "CMS":
            	 
            	// redirect the use to the cms home page
            	printf("<script>location.href='../BrucesCMS/index2.php'</script>");
            	 
            	break;
            
            case "SS":
            
            	// redirect the use to the cms home page
            	printf("<script>location.href='../BrucesSurveySystem/index2.php'</script>");
            
            	break;
        
            // logout is clicked
            case "logout":

                // set the session variables back to original values
                $_SESSION['loggedin'] = "no";
                $_SESSION['user_level'] = "none";
                $_SESSION['loggedout'] = "yes";

                // refresh page
                printf("<script>location.href='home.php'</script>");
			
            }
		
	}
    
}


// display the full database,  for seeing the output.
print "<center>";
print "<b><br style='clear:both'><br>The database is displayed below, Observe any changes as you make:</b><br>";
require 'includes/dbDisplay.inc.php';
print "</center><br>";

?>