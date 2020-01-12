<?php

//database login info
$dbuser = "username";
$dbpw = "password";
$db = "databse_Name";
//Specific to you the store owner
$storeName = "Shop Name";
$rootURL = "http://yourrooturl.com/directory"; //example https://mysite.org  or http://yourhomepage.com/store
$yourEmail = "your@email.com";  //email notifications will be sent to this email when a new order is placed


//pw to access the admin pages
$adminPW = "honeybadgerbubblegum"; 


//connect to the database
$conn = mysqli_connect("localhost", $dbuser, $dbpw, $db);
if(!$conn){
  die('Connection error check server log');
}

?>
