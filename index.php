<?php


// start a session 
session_start();


/* register session variables */ 

// for login
if (!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin'] = "no";
}

// for logout
$_SESSION['loggedout'] = "no";

// for level of user
if (!isset($_SESSION['user_level'])){
    $_SESSION['user_level'] = "none";
}

// user is active
if (!isset($_SESSION['user_active'])){
    $_SESSION['user_active'] = "none";
}

// user name
if (!isset($_SESSION['username'])){
    $_SESSION['username'] = "none";
}


// redirect to home page
header ("Location: home.php");

?>