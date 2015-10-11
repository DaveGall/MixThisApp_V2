<?php

// Grab User submitted information
$username = $_POST["username"];
$password = $_POST["password"];

// Connect to the database
$user="root";//Sets a variable for the name of the user
$pass="root";//Sets a variable for the password of that user
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8888', $user, $pass);
if ($_SERVER['REQUEST_METHOD']=='POST') {//This checks to see if anything was submitted
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysql_query("SELECT firstname, lastname FROM users WHERE username = $username");




$row = mysql_fetch_array($result);

if($row["username"]==$username && $row["password"]==$password)
    echo"You are a validated user.";
else
    echo"Sorry, your credentials are not valid, Please try again.";
}
?>