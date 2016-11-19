<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Online</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link href="mangiabene.css" rel="stylesheet">
        <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <div>
            <?php include_once("nav.php");?>
         </div>
          <h2 class = "orderTitle">Order Online</h2>
    <div class = "row">
        <div class = "col-md-6">
        <form>
         <label class = "filters">Calories</label>
                <div class = "filterCalories">
                    <input type="radio" name="calories" value="500" class = "calories" onclick="ajaxFunction()"/>Under 500 Calories<br>
                    <input type="radio" name="calories" value="800" class = "calories" onclick="ajaxFunction()"/>Under 800 Calories<br>
                    <input type="radio" name="calories" value="1000" class = "calories" onclick="ajaxFunction()"/>Under 1000 Calories<br>
                    <input type="radio" name="calories" value="1500" class = "calories" onclick="ajaxFunction()" checked="checked"/>Under 1500 Calories
                </div>
        <label class = "filters">Sugar</label>
                <div class = "filterType">
                    <input type="radio" name="sugar" value="5" class = "sugar" onclick="ajaxFunction()"/>Under 5g of Sugar<br>
                    <input type="radio" name="sugar" value="10" class = "sugar" onclick="ajaxFunction()"/>Under 10g of Sugar<br>
                    <input type="radio" name="sugar" value="15" class = "sugar" onclick="ajaxFunction()"/>Under 15g of Sugar<br>
                    <input type="radio" name="sugar" value="20" class = "sugar" onclick="ajaxFunction()" checked="checked"/>Under 20g of Sugar
                </div>

        <label class = "filters">Protein</label>
                <div class = "filterType">
                    <input type="radio" name="protein" value="5" class = "protein" onclick="ajaxFunction()"/>Under 5g of protein<br>
                    <input type="radio" name="protein" value="10" class = "protein" onclick="ajaxFunction()"/>Under 10g of protein<br>
                    <input type="radio" name="protein" value="15" class = "protein" onclick="ajaxFunction()"/>Under 15g of protein<br>
                    <input type="radio" name="protein" value="20" class = "protein" onclick="ajaxFunction()" checked="checked"/>Under 20g of protein
                </div>

        <label class = "filters">Fat</label>
                <div class = "filterType">
                    <input type="radio" name="fat" value="5" class = "fat" onclick="ajaxFunction()"/>Under 5g of Fat<br>
                    <input type="radio" name="fat" value="10" class = "fat" onclick="ajaxFunction()"/>Under 10g of Fat<br>
                    <input type="radio" name="fat" value="15" class = "fat" onclick="ajaxFunction()" checked="checked"/>Under 15g of Fat
                </div>
        <label class = "filters" >Carbs</label>
                <div class = "filterType">
                     <input type="radio" name="carbs" value="20" class = "carbs" onclick="ajaxFunction()"/>Under 20g of Carbs<br>
                     <input type="radio" name="carbs" value="30" class = "carbs" onclick="ajaxFunction()"/>Under 30g of Carbs<br>
                     <input type="radio" name="carbs" value="40" class = "carbs" onclick="ajaxFunction()"/>Under 40g of Carbs<br>
                     <input type="radio" name="carbs" value="50" class = "carbs" onclick="ajaxFunction()" checked="checked"/>Under 50g of Carbs
                </div>

        <label class = "filters">Price</label>
                <div class = "filterType">
                    <input type="radio" name="price" value="5" class = "price" onclick="ajaxFunction()"/>Under $5<br>
                    <input type="radio" name="price" value="10" class = "price" onclick="ajaxFunction()"/>Under $10<br>
                    <input type="radio" name="price" value="15" class = "price" onclick="ajaxFunction()" checked="checked"/>Under $15
                </div>

        </form>
        </div>
        <div id = "productsDiv" class = "col-md-6">
        </div>
</div>
        <div>
            <?php include_once("footer.php");?>
         </div>

        <script src="http://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="filter.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
