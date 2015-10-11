<?php
/**
 * Created by PhpStorm.
 * User: davegall
 * Date: 6/22/15
 * Time: 4:13 PM
 */
session_start();
$_SESSION["success"] = "<div class='success'><h2>Your update was successful</h2></div>";
$user = 'root';
$pass='root';
$dbh = new PDO("mysql:host=localhost;dbname=mix_this;port=8888",$user,$pass);
$user_id=$_SESSION['user_id'];
$stmt=$dbh->query("select * from users where user_id = :user_id");
//$stmt->bindParam(':user_id', $user_id);
//$stmt->execute();
//$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit'])){
    /*if(!filter_var($_POST['website'], FILTER_VALIDATE_URL)){
        echo "<p>Please input a valid URL.</p>";
    }else{*/
    $user_id=$_SESSION['user_id'];
    $fName=$_POST['firstName'];
    $lName=$_POST['lastName'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    echo $email.'</br>'.$fName.'</br>'.$lName.'</br>'.$user_id;
    $stmt=$dbh->prepare/*("UPDATE users SET firstname='$fName', lastname='$lName', email='$email', username='$username', password='$pass' where user_id='$user_id'");*/("update users set firstname='".$fName."', lastname='".$lName."', email='".$email."', username='".$username."', password='".$pass ."'where user_id='$user_id'");
    $stmt->execute();
    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //header('Location: getuser.php');
    die();

    /*}*/
}

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Update Client</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
</head>

<body>

<form class="col-md-6 formDisplay" action="" method="POST"><!--This will post back to the same page. post will also set the input to load into the database.-->
    <label for="firstName">First Name: </label>
    <input type="text" id="firstName" name="firstName" value='<?php echo $user_id[0]['firstname']; ?>' required><!--Fields are required so I placed required on each input-->
    <label for="lastName">Last Name</label>
    <input id="lastName" type="text" name="lastName" value="<?php echo $user_id[0]['lastname'];  ?>" required>
    <label for="username">User Name: </label>
    <input type="text" id="username" name="username" value="<?php echo $user_id[0]['username'];?>" required>
    <label for="email">Email Address: </label>
    <input type="email" id="email" name="email" value='<?php echo $user_id[0]['email']; ?>' required/>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password" value='<?php echo $user_id[0]['password']; ?>' required/>
    <input type="submit" name="submit" value="Update User" class="btn-primary button">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    (function ($){

        $('.success').fadeIn().delay(1000).fadeOut();
    })(jQuery);
</script>
</body>
</html>