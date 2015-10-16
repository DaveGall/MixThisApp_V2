<?php
/**
 * Created by PhpStorm.
 * User: davegall
 * Date: 9/30/15
 * Time: 3:46 PM
 */


if(isset($_SESSION['username'])){
    echo $_SESSION['username'];
    unset($_SESSION['username']);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/main.js" type="javascript"></script>
    <title>Details Page</title>
</head>
<body>

<header>
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="index.php">Home</a> </li>
        <li role="presentation"><a href="bac.php">BAC</a> </li>
        <li role="presentation"><a href="search.php">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">


    <div class="row"></div>
        <h1>Your Search Results</h1>
        <hr>

        <div class="col-md-6">
            <?php
            $user="root";//Sets a variable for the name of the user
            $pass="root";//Sets a variable for the password of that user
            $dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8888', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
            if ($_SERVER['REQUEST_METHOD']=='POST') {//This checks to see if anything was submitted
                $ing = $_POST['ingredient'];
                $stmt = $dbh->prepare("SELECT * FROM drinks WHERE Ingredient1 LIKE '%" . $ing . "%' OR ingredient2 LIKE '%" . $ing . "%' OR ingredient3 LIKE '%" . $ing . "%' OR ingredient4 LIKE '%" . $ing . "%' OR ingredient5 LIKE '%" . $ing . "%' OR ingredient6 LIKE '%" . $ing . "%' ORDER BY drink_name");
                //;//Creates a variable that will insert the fruit name and fruit color values into their respective columns
                $stmt->bindParam(':ingredient', $ing);
                //$stmt->execute();//Executes the whole statement the data transfer process.
                $stmt->execute(array('key' => $ing));
                $ing = $stmt->fetchAll();

                foreach ($ing as $x => $x_value) {
                    echo '<form action="resultsdetails.php" method="POST"> <button type="submit" name="drink_name" class="userButton" value="' . $x_value['drink_name'] .'">'.$x_value['drink_name'].'</button>   </form>';

                }
            }
            ?>
        </div>
        <div class="col-md-6 image"></div>

    <!--<script>
        $.getJSON('data.json', function(data) {
            console.log(data);
            var output = '<ul class="searchResults">';
            $.each(data, function (key, val) {

                output += '<li>';
                output += '<h3>' + val[3].drink + '</h3>';
                output += '</li>';

            });
            output += '</ul>';
            $('#placeholder').html(output);
        });
    </script>
    <script>
        function myFunction(){
            var item = document.getElementById("drink").value;
            window.open('details.html');
            console.log("Inside Function: "+item);
        }

    </script>-->

</div>
</body>
</html>