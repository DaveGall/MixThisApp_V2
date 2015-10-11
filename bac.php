<?php
/**
 * Created by PhpStorm.
 * User: davegall
 * Date: 9/30/15
 * Time: 1:17 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet"/>
    <script src="js/main.js" type="javascript"></script>
    <title>BAC Calculator Page</title>
</head>
<body>
<header>
    <ul class="nav nav-tabs">
        <li role="presentation"><a href="index.php">Home</a> </li>
        <li role="presentation" class="active"><a href="bac.php">BAC</a> </li>
        <li role="presentation"><a href="search.php">Search</a> </li>
    </ul>
</header>

<div class="container-fluid bacPage">
    <h1 class="title">Mix This</h1>
    <p class="lightText">Don't get yourself behind the wheel if you are to impaired to drive.
        Fill out this little questionnaire to see if
        you are okay to drive yourself and your friends home.
        If you are over the limit in your state then take a cab.</p>
    <h2 class="smallTitle">BAC Calculator</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <form class="formMargin">
                <label for="weight">Weight</label>
                <input id="weight" type="number" placeholder="weight"/>
                <label for="gender">Gender</label>
                <input id="gender" type="text" placeholder="M/F"/>
                <label for="liqueur">1.5 oz Shots</label>
                <input id="liqueur" type="number" placeholder="1"/>
                <label for="beer">12 oz. Beers</label>
                <input id="beer" type="number" placeholder="1"/>
                <label for="wine">5 oz. Glasses of Wine</label>
                <input id="wine" type="number" placeholder="1"/>
                <label for="hours">Hours Drinking</label>
                <input id="hours" type="number" placeholder="1"/>
                <button type="button" id="calcBAC" onclick="calculate()">Submit</button>
            </form>
            <hr>
        </div>
        <div class="col-md-6">
            <h3 class="niceFont">Your BAC is........</h3>
            <p id="bacAnswer"></p>
        <!--</div>
        <div class="col-md-4">-->
            <p class="lightText">Remember that at no time is it recommended that you drink and drive. If you plan on going out drinking with friends or family make sure you plan ahead of time how you are going to get around and especially how you are going to get home. If you can't find a designated driver then make sure you have some phone numbers of cab companies and the hours they operate so that you can make sure you don't need to drive home. It is an even better idea to take a taxi, bus or have someone drop you off where you are intending to go so that there is less of a risk of you doing something you will regret for the rest of your life.</p>
        </div>

    </div>
</div>
<script>
    function calculate() {
        var weight = document.getElementById('weight').value;
        var weightGrams = Number(weight) * 454;
        var gender = document.getElementById('gender').value;
        var liqueur = document.getElementById('liqueur').value;
        var liqueurGrams = Number(liqueur) * 14;
        var beer = document.getElementById('beer').value;
        var beerGrams = Number(beer) * 14;
        var wine = document.getElementById('wine').value;
        var wineGrams = Number(wine) * 14;
        var hours = document.getElementById('hours').value;
        var hoursTimes = Number(hours) * .015;
        var total = Number(wine) * Number(hours);
        if ((gender === 'm' || gender === 'M') && (beer !== '' && liqueur !== '' && wine !== '')) {
            gender = .68;
            var answer = ((parseInt(liqueurGrams) + parseInt(beerGrams) + parseInt(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if ((gender === 'm' || gender === 'M') && (beer !== '' && liqueur !== '')) {
            gender = .68;
            var answer = ((parseInt(liqueurGrams) + parseInt(beerGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if ((gender === 'm' || gender === 'M') && (wine !== '' && liqueur !== '')) {
            gender = .68;
            var answer = ((parseInt(liqueurGrams) + parseInt(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if ((gender === 'm' || gender === 'M') && (wine !== '' && beer !== '')) {
            gender = .68;
            var answer = ((parseInt(beerGrams) + parseInt(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if (gender === 'm' || gender === 'M' && liqueur !== '') {
            gender = Number(.68);
            var answer = ((Number(liqueurGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if (gender === 'm' || gender === 'M' && beer !== '') {
            gender = Number(.68);
            var answer = ((Number(beerGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if (gender === 'm' || gender === 'M' && wine !== '') {
            gender = .68;
            var answer = ((Number(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if ((gender === 'f' || gender === 'F') && (beer !== '' && liqueur !== '' && wine !== '')) {
            gender = .55;
            var answer = ((parseInt(liqueurGrams) + parseInt(beerGrams) + parseInt(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if ((gender === 'f' || gender === 'F') && (beer !== '' && liqueur !== '')) {
            gender = .55;
            var answer = ((parseInt(liqueurGrams) + parseInt(beerGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if ((gender === 'f' || gender === 'F') && (wine !== '' && liqueur !== '')) {
            gender = .55;
            var answer = ((parseInt(liqueurGrams) + parseInt(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if ((gender === 'f' || gender === 'F') && (wine !== '' && beer !== '')) {
            gender = .55;
            var answer = ((parseInt(beerGrams) + parseInt(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if (gender === 'f' || gender === 'F' && liqueur !== '') {
            gender = .55;
            var answer = ((parseInt(liqueurGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if (gender === 'f' || gender === 'F' && beer !== '') {
            gender = .55;
            var answer = ((parseInt(beerGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else if (gender === 'f' || gender === 'F' && wine !== '') {
            gender = .55;
            var answer = ((parseInt(wineGrams)) / (Number(weightGrams) * Number(gender)) * 100) - (Number(hoursTimes));
            return document.getElementById('bacAnswer').innerHTML = parseFloat(answer).toFixed(2);
        } else {
            alert("Please enter one of these values into the gender portion: m, M, f or F. Thank you.")
        }
    }


    //(Alcohol in grams / (weight in grams * M/F))*100--- M = .68, F = .55.
</script>
</body>
</html>