<?php


// start a session 
session_start();


/* register session variables */ 

// for login
if (!isset($ses_loggedin)){
    $ses_loggedin = "no";
    session_register("ses_loggedin");
}

// for logout
$ses_loggedout = "no";
session_register("ses_loggedout");

// for level of user
if (!isset($ses_user_level)){
    $ses_user_level = "none";
    session_register("ses_user_level");
}

// user is active
if (!isset($ses_user_active)){
    $ses_user_active = "none";
    session_register("ses_user_active");
}


// user name
if (!isset($ses_username)){
    $ses_username = "none";
    session_register("ses_username");
}


// redirect to home page
header ("Location: home.php");

?>