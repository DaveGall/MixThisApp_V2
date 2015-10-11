<?php
session_start();
 /*if( isset( $_SESSION['user_id'] ) ){
     $greeting = 'Welcome back <b>'.''.'!!!</b>';
 }*/
/*if(isset($_SESSION['success'])){
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
    $stmt=$dbh->prepare("INSERT INTO users (firstname, lastname, username, email, password) VALUES (:firstName, :lastName, :userName, :email, :password);");//Creates a variable that will insert the fruit name and fruit color values into their respective columns
    $stmt->bindParam(':firstName', $firstName);//This passes the entered value for $fruitname into the fruitname column of the database
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':userName', $userName);//Places the entered value from $color into its place in the database.
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();//Executes the whole statement the data transfer process.

}*/

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
<!--<h1>Mix This Version 2</h1>-->
<div class="container-fluid bacPage">
    <h1 class="title">Mix This</h1>

    <p class="titleText">Your own personal bartender.</p>

    <div class="row">
        <div class="col-md-6">
            <div class="normalLogin">

                <h3 class="normalText">Login</h3>
                <p>OR</p>
                <a href="" data-toggle="modal" data-target="#contact_modal" class="contact-color-light"><button type="submit" value="Sign Up" class="signUp">Sign Up</button></a>
                <hr>
                <form class="form-group" action="getuser.php" method="POST">
                    <label for="username">UserName</label>
                    <input type="text" id="username" name="username"/>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"/>

                    <button id="calcBAC" type="submit" name="submit" class="submit">Submit</button>

                </form>

                <!--<h2>Logout Here</h2>
                <p><a href="logout.php">Log Out Link</p>-->

            </div>
        </div>


        <div class="col-md-6 image">

        </div>

        <div class="row">

            <?php
            /*$stmt = $dbh->prepare('SELECT * FROM users WHERE user_id IS 80;');//This statement selects the id, fruitname and fruitcolor that was just passed through the databse.
            $stmt->execute();//This will execute the variable above.
            $result = $stmt->fetchall(PDO::FETCH_ASSOC);//Places all the values into this variable
            foreach ($result as $row) {//Begins the loop that will go through the associative array and grab all the values.
                echo "<div class='clientDisplay'>"."<h4 class='name'>".$row['firstname']."</h4>"."<hr>"."<p class='color'>Last Name: "."<font color='#ffffff'>".$row['lastname']."</font>"."</p><p class='color'>Email: "."<font color='#ffffff'>".$row['email']."</font>"."</p><p class='color'>UserName: "."<font color='#ffffff'>".$row['username']."</font>".'</p>'.'<hr>'.'<a class="buttonRight" href="deleteclient.php?id='.$row['id'].'">Delete</a>'.'<a class="buttonLeft" href="updateclient.php?id='.$row['id'].'">Edit</a>'."</div>";
            }*/
            ?>

        </div>

        <!--Select * From users Where username=$username and email=$email-->


    </div>


    <div class="modal fade" id="contact_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title title" id="myModalLabel">Mix This</h1>
                    <p class="modal-text">Sign Up</p>
                </div>
                <div class="modal-body">
                    <form class="col-md-6 formDisplay" action="new_user.php" method="POST"><!--This will post back to the same page. post will also set the input to load into the database.-->
                        <label for="firstName">First Name: </label>
                        <input type="text" id="firstName" name="firstName" placeholder="" required><!--Fields are required so I placed required on each input-->
                        <label for="lastName">Last Name: </label>
                        <input type="text" id="lastName" name="lastName" placeholder="" required>
                        <label for="username">User Name: </label>
                        <input type="text" id="username" name="username" placeholder="" required>
                        <label for="email">Email Address: </label>
                        <input type="email" id="email" name="email" placeholder="" required/>
                        <label for="password">Password </label>
                        <input type="password" id="password" name="password" placeholder="" required/>
                        <input type="submit" id="modalButLeft" name="submit" value="Sign Up" class="btn-primary button">
                        <button type="button" id="modalButRight" class="btn" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">

                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
        <!--<button id="calcBAC" type="submit" name="submit" class="submit">Submit</button>-->

</div>

</body>
</html>


