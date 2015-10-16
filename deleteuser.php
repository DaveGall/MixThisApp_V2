<?php
/**
 * Created by PhpStorm.
 * User: davegall
 * Date: 6/22/15
 * Time: 11:35 AM
 */

if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

$user="root";//Grabs the username of the database in a variable
$pass="root";//Grabs the password of the user and places it into a variable
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8888', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
$user_id=$_GET['user_id'];//Grabs the id of the row that has been clicked
var_dump($user_id);
$stmt=$dbh->exec("DELETE FROM users WHERE user_id = $user_id");//Deletes the record from the database using the id as the identifier.
//$stmt->bindParam(':user_id',$user_id);//This grabs the entered value for $fruitid into the id column of the database
//$stmt->execute();//Executes the process of deleting the record selected
echo 'Record deleted successfully!!';
//header('Location:getuser.php');//Returns the user to the fruits.php page.
die();//Exits the php script.