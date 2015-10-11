<?php
/**
 * Created by PhpStorm.
 * User: davegall
 * Date: 9/30/15
 * Time: 4:16 PM
 */
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



    <div class="results">
        <h4 class="drinkTitle">Blue Lagoon</h4>
        <ul class="ingredientDisplay">
            <li>Vodka</li>
            <li>Blue Curacao</li>
            <li>Lime Juice</li>
        </ul>
        <p class="directions">This section will display the instructions for making the selected drink.</p>
    </div>

    <div id="placeholder"></div>
    <h4 id="drinkTitle"></h4>

    <script>
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

    </script>

</div>
</body>
</html>