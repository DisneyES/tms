<?php


$root = "../"; // root folder

include "../dbconnection.php";

$connect = new dbconnection();
$con = $connect->connectdb();
$username = $_POST['reg_username'];
$password = $_POST['reg_password'];
$email = $_POST['reg_email'];

// phpinfo();

echo "username: ".$username."<br />password: ".$password."<br />";


//query string
$sql = "INSERT INTO table_profile (userName, password, emailAddress) VALUES ('".$username."', '".$password."' ,'".$email."')";

//execute query or die
if (!mysql_query($sql,$con)){
die('Query 1 Error: ' . mysql_error());
}


// SEND email for verification
/*
$subject = "Thank you for registering at the UPLB Traffic Management System!";
$message = "test message";
$message = wordwrap($message, 70);
$from = "yo_ayco@yahoo.com";
mail($email,$subject,$message,"From: $from\n") or die('Mail Error');
*/

// REDIRECT //not working
header("Location: ".$root."?status=emailsent");

?>