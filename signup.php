<?php
/*
session_start();
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
    $userName=$_POST['userName'];//Sets a variable to grab the data entered into the input with the name fruitcolor
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt=$dbh->prepare("INSERT INTO users (firstname, lastname, username, email, password) VALUES (:firstName, :lastName, :userName, :email, :password);");//Creates a variable that will insert the fruit name and fruit color values into their respective columns
    $stmt->bindParam(':firstName', $firstName);//This passes the entered value for $fruitname into the fruitname column of the database
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':userName', $userName);//Places the entered value from $color into its place in the database.
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();//Executes the whole statement the data transfer process.

}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Add Client</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
</head>

<body>
<div class="container-fluid">
    <div class="row main">
        <h1>Client Manager</h1>
        <h4 class="white">Add, Edit, Delete</h4>
        <p>Easily keep track of your client base with one simple application.</p>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <h3 class="indent">Add Client</h3>
        <form class="col-md-6 formDisplay" action="signup.php" method="POST"><!--This will post back to the same page. post will also set the input to load into the database.-->
            <label for="firstName">First Name: </label>
            <input type="text" id="firstName" name="firstName" placeholder="" required><!--Fields are required so I placed required on each input-->
            <label for="lastName">Last Name: </label>
            <input type="text" id="lastName" name="lastName" placeholder="" required>
            <label for="userName">User Name: </label>
            <input type="text" id="userName" name="userName" placeholder="" required>
            <label for="email">Email Address: </label>
            <input type="email" id="email" name="email" placeholder="" required/>
            <label for="password">Password </label>
            <input type="url" id="password" name="password" placeholder="" required/>
            <input type="submit" name="submit" value="Sign Up" class="btn-primary button">
        </form>

        <div class="col-md-3"></div>
    </div>
    <div class="row">

        <?php
        $stmt = $dbh->prepare('SELECT id, firstname, lastname, username, email FROM clients order by name;');//This statement selects the id, fruitname and fruitcolor that was just passed through the databse.
        $stmt->execute();//This will execute the variable above.
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);//Places all the values into this variable
        foreach ($result as $row) {//Begins the loop that will go through the associative array and grab all the values.
            echo "<div class='clientDisplay'>"."<h4 class='name'>".$row['firstname']."</h4>"."<hr>"."<p class='color'>Last Name: "."<font color='#000000'>".$row['lastname']."</font>"."</p><p class='color'>Email: "."<font color='#000000'>".$row['email']."</font>"."</p><p class='color'>UserName: "."<font color='#000000'>".$row['username']."</font>".'</p>'.'<hr>'.'<a class="buttonRight" href="deleteclient.php?id='.$row['id'].'">Delete</a>'.'<a class="buttonLeft" href="updateclient.php?id='.$row['id'].'">Edit</a>'."</div>";
        }
        ?>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    (function($){
        $('.success').fadeIn().delay(1000).fadeOut();

        $('.buttonRight').click(function(){
            return window.confirm(this.title || 'Are you sure you want to delete this client?')
        })

    })(jQuery);
</script>

</body>
</html>*/