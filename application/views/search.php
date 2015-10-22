


<h1 class="title">Mix This</h1>
<div class="row"><!--Start the first row-->
    <div class="col-md-4"><!--Form div/column-->
        <form action='<?php echo base_url(); ?>index.php/blog/detailsPage/' method="POST">
            <div>
                <h4 class="searchTitle">Search by drink</h4>
                <hr>
                <label for="drink">Drink</label>
                <select id="drink" name="drink">
                    <option value="">Select a Drink</option>
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
            <button type="submit" name="submit" value="Submit" class="submit userButton">Submit</button>
        </form>

    </div><!--End the form column/div-->
    <div class="col-md-4"></div><!--Spacer column between the two search forms-->

    <div class="col-md-4">
        <form action='<?php echo base_url(); ?>index.php/blog/resultsPage/' method="POST">
            <div>
                <h4 class="searchTitle">Search by ingredients</h4>
                <hr>
                <label for="ingredients">Ingredients</label>
                <select id="ingredients" name="ingredient">
                    <option value="">Select an Ingredient</option>
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
            </div>
            <button type="submit" name="submit" value="Submit" class="submit userButton">Submit</button>
        </form>

    </div>


</div><!--End the first row-->
<hr>
<div id="placeholder"></div>