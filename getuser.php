<?php

session_start();
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
$user = "root";
$pass = "root";
$dbh = new PDO("mysql:host=localhost;dbname=mix_this;port=8888",$user,$pass);

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $dbh->prepare("select * from users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user_id = $stmt->fetchAll();
    if($user_id == false)
    {
        $greeting = 'Login Failed';
    }
    /*** if we do have a result, all is well ***/
    else
    {
        /*** set the session user_id variable ***/
        $_SESSION['user_id'] = $user_id;


        /*** tell the user we are logged in ***/
        $greeting = '<div><h3>Welcome back <b>'.$user_id[0]['firstname'].'!!!</b></h3></br><a href="updateuser.php"><button type="submit" class="userButton">Edit</button> </a>
    <a href="deleteuser.php?user_id='.$user_id[0]['user_id'].'""><button type="submit" name="user_id" class="userButton">Delete</button> </a></div>';
    }




}









    /*$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results = array("users" => $result);
    echo $result;
    echo $results;
    $jsonfile = json_encode($results);
    foreach ($results as $val) {
        if ($val['username'] === $userName && $val['password'] === $password) {
            echo "You are a validated user.";
        } else {
            echo "Sorry, your credentials are not valid, Please try again.";
        }
    }
}
//$result = array("users"=>$result);




//header("Content-type:application/json");*/


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

        <?php echo $greeting ?>

    <p>Where would like to go?</p>
    <a href="search.php"><button type="submit" class="userButton">Search</button> </a>
    <a href="bac.php"><button type="submit" class="userButton">BAC</button> </a>
</div><!--End container div-->
</body>
</html>
