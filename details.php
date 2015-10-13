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


$user="root";//Sets a variable for the name of the user
$pass="root";//Sets a variable for the password of that user
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8888', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
if ($_SERVER['REQUEST_METHOD']=='POST') {//This checks to see if anything was submitted
    $drink=$_POST['drink'];
    $stmt=$dbh->query("SELECT * FROM drinks WHERE drink_name='".$drink."'");//Creates a variable that will insert the fruit name and fruit color values into their respective columns
    $stmt->bindParam(':drink', $drink);
    $stmt->execute();//Executes the whole statement the data transfer process.
    $drink=$stmt->fetchAll();
    if($drink == false)
    {
        $yourDrink = 'Sorry could not find the drink you requested.';
    }
    /*** if we do have a result, all is well ***/
    else
    {
        /*** set the session user_id variable
        $_SESSION['user_id'] = $user_id;***/


        /*** tell the user we are logged in ***/
        $yourDrink = '<div class="results"><h3 class="drinkTitle"><b>'.$drink[0]['drink_name'].'</b></h3><hr><ul class="ingredientDisplay">
            <li>'.$drink[0]['Ingredient1'].'</li>
            <li>'.$drink[0]['ingredient2'].'</li>
            <li>'.$drink[0]['ingredient3'].'</li>
            <li>'.$drink[0]['ingredient4'].'</li>
            <li>'.$drink[0]['ingredient5'].'</li>
            <li>'.$drink[0]['ingredient6'].'</li>
        </ul><hr>
        <p class="directions">Directions:</p>
        <p class="directions">'.$drink[0]['recipe'].'</p>


        </div>';
    }

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




    <?php echo $yourDrink  ?>
    <div id="placeholder"></div>
    <h4 id="drinkTitle"></h4>

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