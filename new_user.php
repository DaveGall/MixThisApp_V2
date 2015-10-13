<?php
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}

$user="root";//Sets a variable for the name of the user
$pass="root";//Sets a variable for the password of that user
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8888', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
if ($_SERVER['REQUEST_METHOD']=='POST') {//This checks to see if anything was submitted
    $firstName=$_POST['firstName']; //Sets a variable to grab the data entered into the input with the name fruitname
    $lastName=$_POST['lastName'];
    $userName=$_POST['username'];//Sets a variable to grab the data entered into the input with the name fruitcolor
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt=$dbh->prepare("INSERT INTO users (firstname, lastname, username, email, password) VALUES (:firstName, :lastName, :username, :email, :password);");//Creates a variable that will insert the fruit name and fruit color values into their respective columns
    $stmt->bindParam(':firstName', $firstName);//This passes the entered value for $fruitname into the fruitname column of the database
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':username', $userName);//Places the entered value from $color into its place in the database.
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();//Executes the whole statement the data transfer process.
    $displayName=$_POST['firstName'];
    if($displayName == false)
    {
        $greeting = 'Login Failed';
    }
    /*** if we do have a result, all is well ***/
    else
    {
        /*** set the session user_id variable ***/
        $_SESSION['username'] = $displayName;

        /*** tell the user we are logged in ***/
        $greeting = '<h3>Welcome to Mix This <b>'.$displayName.'!!!</b></h3></br><a href="updateuser.php"><button type="submit" class="userButton">Edit</button> </a>
    <a href="bac.php"><button type="submit" class="userButton">Delete</button> </a>';
    }

}


?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <title>Mix This Version 2</title>
</head>
<body>
<header>
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="index.php">Home</a> </li>
        <li role="presentation"><a href="bac.php">BAC</a> </li>
        <li role="presentation"><a href="search.php">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage"><!--Start container div-->
    <h1 class="title">Mix This</h1>

        <?php {echo $greeting;} ?>

    <p>Where would like to go?</p>
    <a href="search.php"><button type="submit" class="userButton">Search</button> </a>
    <a href="bac.php"><button type="submit" class="userButton">BAC</button> </a>
</div><!--End container div-->
</body>
</html>