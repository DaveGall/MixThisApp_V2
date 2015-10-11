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


/*$user="root";//Sets a variable for the name of the user
$pass="root";//Sets a variable for the password of that user
$dbh = new PDO('mysql:host=localhost;dbname=mix_this;port=8888', $user, $pass);//Sets a variable for the address to the specific database, port, username and password to allow access.
if ($_SERVER['REQUEST_METHOD']=='POST') {//This checks to see if anything was submitted
    $email=$_POST['email']; //Sets a variable to grab the data entered into the input with the name email
    $uName=$_POST['userName'];//Sets a variable to grab the data entered into the input with the name firstname
    $stmt=$dbh->prepare("INSERT INTO users (email, username) VALUES (:email, :username);");//Creates a variable that will insert the fruit name and fruit color values into their respective columns
    $stmt->bindParam(':email', $email);//This passes the entered value for $fruitname into the fruitname column of the database
    $stmt->bindParam(':username', $uName);//Places the entered value from $color into its place in the database.
    $stmt->execute();//Executes the whole statement the data transfer process.

}*/
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" datatype="jsonp"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
    <title>Search Page</title>
</head>
<body>

<header>
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="index.php">Home</a> </li>
        <li role="presentation"><a href="bac.php">BAC</a> </li>
        <li role="presentation" class="active"><a href="search.php">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">
    <h1 class="title">Mix This</h1>
    <div class="row"><!--Start the first row-->
        <div class="col-md-4"><!--Form div/column-->
            <form>
                <div>
                    <h4 class="searchTitle">Search by drink</h4>
                    <hr>
                    <label for="drink">Drink</label>
                    <select id="drink" onchange="myFunction()">
                        <option value="Pomegranate Martini" id="pomegranateMartini">Pomegranate Martini</option>
                        <option value="Blue Lagoon" id="blueLagoon">Blue Lagoon</option>
                        <option value="Woo Woo" id="wooWoo">Woo Woo</option>
                        <option value="Malibu Paradise">Malibu Paradise</option>
                        <option value="Bermuda Mai Tai">Bermuda Mai Tai</option>
                        <option value="Cabo Wabo">Cabo Wabo</option>
                        <option value="Cosmopolitan">Cosmopolitan</option>
                        <option value="Mojito">Mojito</option>
                        <option value="Vodka and Coke">Vodka and Coke</option>
                        <option value="Fox Poison">Fox Poison</option>
                        <option value="Seventeen Twist">17 Twist</option>
                    </select>

                </div>
            </form>

        </div><!--End the form column/div-->

        <div class="col-md-4">
            <form>
                <h4 class="searchTitle">Search by ingredients</h4>
                <hr>
                <label for="ingredients">Ingredients</label>
                <select id="ingredients" onchange="ingredientsFunction()">
                    <option value="vodka">Vodka</option>
                    <option value="raspberry Vodka">Raspberry Vodka</option>
                    <option value="peach Schnapps">Peach Schnapps</option>
                    <option value="blue Curacao">Blue Curacao</option>
                    <option value="rum">Rum</option>
                    <option value="light Rum">Light Rum</option>
                    <option value="dark Rum">Dark Rum</option>
                    <option value="orange Liqueur">Orange Liqueur</option>
                    <option value="tequila">Tequila</option>
                    <option value="grenadine">Grenadine</option>
                    <option value="lime Juice">Lime Juice</option>
                    <option value="lemonade">Lemonade</option>
                    <option value="cranberry Juice">Cranberry Juice</option>
                    <option value="pineapple Juice">Pineapple Juice</option>
                    <option value="pomegranate">Pomegranate Juice</option>
                    <option value="coke">Coke</option>
                    <option value="citrus Soda">Citrus Soda</option>
                    <option value="sprite">Sprite</option>
                    <option value="club Soda">Club Soda</option>
                    <option value="sweet and SourMix">Sweet and Sour Mix</option>
                </select>
                <!-- <button id="submitButton" value="Submit" onclick="searchIngredients()">Submit</button>-->
            </form>

        </div>
        <div class="col-md-4 results">
            <h3>Results</h3>
            <h3 id="drinkDisplay"></h3>
            <h4 id="drinkTitle"></h4>
        </div>
        <script>

            function myFunction(){
                var item = document.getElementById("drink").value;

                $.getJSON('data.json', function(){
                    var output= "";
                    $.each(item, function(val){
                        if(item === val) {
                            output += "<h4><b>" + val.drink + "</b></h4><hr>";
                            output += "Ingredients: " + "<ul><li>" + val.ingredients.in1 + "</li><li>" + val.ingredients.in2 + "</li><li>" + val.ingredients.in3 + "</li><li>" + val.ingredients.in4 + "</li><li>" + val.ingredients.in5 + "</li><li>" + val.ingredients.in6 + "</li></ul>";
                            output += "Instructions: " + val.instructions + "<hr>";

                        }
                        document.getElementById('placeholder').innerHTML = output;
                    });

                });

                document.getElementById('drinkDisplay').innerHTML = item;
                console.log("Inside Function: "+item);

            }















            /*function myFunction(){
             var item = document.getElementById("drink").value;
             document.getElementById('drinkDisplay').innerHTML = item;
             console.log("Inside Function: "+item);

             }

             function ingredientsFunction(){
             var item = document.getElementById("ingredients").value;
             document.getElementById('drinkTitle').innerHTML = item;
             console.log("Inside Function: "+item);
             }


             $.getJSON('data.json', function(data){
             var output= "";
             $.each(data, function(key, val){
             output+= "<h4><b>"+val[1].drink+"</b></h4><hr>";
             output+="Ingredients: "+"<ul><li>"+val[1].ingredients.in1+"</li><li>"+val[1].ingredients.in2+"</li><li>"+val[1].ingredients.in3+"</li><li>"+val[1].ingredients.in4+"</li><li>"+val[1].ingredients.in5+"</li><li>"+val[1].ingredients.in6+"</li></ul>";
             output+="Instructions: "+val[1].instructions+"<hr>";
             });
             document.getElementById('placeholder').innerHTML = output;
             //$('#placeholder').html(output);
             });

             $.getJSON('data.json', function(data){
             console.log(data);


             });*/

        </script>
    </div><!--End the first row-->
    <hr>
    <div id="placeholder"></div>
    <div class="row userRow"><!--Start second row-->
        <?php
        /*function userData(){//function to catch all the data and return an array
            $uName = $_POST['userName'];//Grabs the data from the input for username
            $email = $_POST['email'];//grabs the data from the input for password

            return array("Welcome " => $uName);//Returns all the data collected in an array.
        }



        if(isset($_POST['submit'])){//This if statement will check to see if the submit button was clicked
            $info = userData();//This stores the data collected from the userData function and places it into a variable.
            echo "<div class='left'>";//Div that will begin the form results that will display for the user.
            foreach($info as $attribute => $info){//This will run through the data in the array.
                echo "<div class='userResults'><p>{$attribute}:<span style='color:#403124'><strong> {$info}</strong></span><a class='buttonRight' href='deleteuser.php?userName={$info}.'><button>Delete</button></a><a class='buttonLeft' href='updateuser.php?id={$info}'><button>Edit</button></a></p></div>";//This will output each item in the array on a separate line.
            }
            echo "</div>";//This div ends the form results display.
        }*/
        ?>
    </div><!--End second row-->

</div>
</body>
</html>
