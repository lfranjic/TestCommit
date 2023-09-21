<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Il Nuovo Ristorante</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
<header>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.php">Il Nuovo Ristorante</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="reservations.php">Reservations</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
</nav>
</header>
<main>
<div class="container">
    <h2 style="margin-bottom: 4rem;">Menu</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#us">Us</a></li>
        <li><a data-toggle="tab" href="#menu1">Pasta</a></li>
        <li><a data-toggle="tab" href="#menu2">Salads</a></li>
        <li><a data-toggle="tab" href="#menu3">Meat</a></li>
        <li><a data-toggle="tab" href="#menu4">Pizza</a></li>
        <li><a data-toggle="tab" href="#menu5">Desserts</a></li>
        <li><a data-toggle="tab" href="#menu6">Beverages</a></li>
      </ul>
      <div class="tab-content">
        <div id="us" class="tab-pane fade in active">
          <h3>Who we are</h3>
          <p>
            Il Nuovo Ristorante is a compilation of lively dining experiences. We celebrate the best of Italian American dishes with welcoming hospitality and service. Seasonal changes guide the menu of house-made pasta, antipasti, pizzas and more.
            Seasonal changes, outstanding ingredients and a made-from-scratch philosophy guide by our head chef comes a menu of house-made focaccia and pasta, antipastis, made-to-order wood-fired pizzas, and piatti. The chef curated dinner and dessert menus, pair with the well balanced wine and beverage program.
          </p>
          <img src="pizza_chef.png" alt="bolognese" style="width: 50%;">
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Pasta</h3>
            <div class="tab-content">
                <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>Pasta bolognese</div>
                    <img src="bolognese.jpg" alt="bolognese" style="width: 75%;">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div>Pasta milanese</div>
                  <img src="milanese.jpg" alt="milanese" style="width: 75%;">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>Ravioli</div>
                    <img src="ravioli.jpg" alt="ravioli" style="width: 75%;">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>Tortelini</div>
                    <img src="tortelini.jpg" alt="tortelini" style="width: 75%;">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>Lasagna</div>
                    <img src="lasagna.jpg" alt="lasagna" style="width: 75%;">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div>Pasta napolitana</div>
                    <img src="napolitana.jpg" alt="napolitana" style="width: 75%;">
                </div>
              </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Salads</h3>
            <div class="tab-content">
                <div class="row">
                <div class="col-sm-6">
                    <div>Mozzarella salad</div>
                    <img src="mozzarella_salad.jpg" alt="mozzarella_salad" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Chicken salad</div>
                    <img src="chicken_salad.jpg" alt="chicken_salad" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Greek salad</div>
                    <img src="greek_salad.jpg" alt="greek_salad" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Mixed salad</div>
                    <img src="mixed_salad.jpg" alt="mixed_salad" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Risotto salad</div>
                    <img src="risotto_salad.jpg" alt="risotto_salad" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Caesar salad</div>
                    <img src="caesar_salad.jpg" alt="caesar_salad" style="width: 75%;">
                </div>
                </div>
              </div>
            </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Meat</h3>
            <div class="tab-content">
                <div class="row">
                <div class="col-sm-6">
                    <div>Squid</div>
                    <img src="squid.jpg" alt="squid" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Prawn</div>
                    <img src="prawn.jpg" alt="prawn" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Ribs</div>
                    <img src="ribs.jpg" alt="ribs" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Chicken alfredo</div>
                    <img src="chicken_alfredo.jpg" alt="chicken_alfredo" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Curry chicken</div>
                    <img src="curry_chicken.jpg" alt="curry_chicken" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Salmon</div>
                    <img src="salmon.jpg" alt="salmon" style="width: 75%;">
                </div>
                </div>
              </div>
        </div>
        <div id="menu4" class="tab-pane fade">
            <h3>Pizza</h3>
            <div class="tab-content">
                <div class="row">
                <div class="col-sm-6">
                    <div>Pizza Italiana</div>
                    <img src="pizza_italiana.jpg" alt="pizza_italiana" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Pizza Americana</div>
                    <img src="american_pizza.jpg" alt="american_pizza" style="width: 68%;">
                </div>
                <div class="col-sm-6">
                    <div>Vegan pizza</div>
                    <img src="vegan_pizza.jpg" alt="vegan_pizza" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Vegetarian pizza</div>
                    <img src="vegetarian_pizza.jpg" alt="vegetarian_pizza" style="width: 67%;">
                </div>
                <div class="col-sm-6">
                    <div>Calzone</div>
                    <img src="calzone.jpg" alt="calzone" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Seafood pizza</div>
                    <img src="seafood_pizza.jpg" alt="seafood_pizza" style="width: 75%;">
                </div>
                </div>
              </div>
          </div>
        <div id="menu5" class="tab-pane fade">
            <h3>Desserts</h3>
            <div class="tab-content">
                <div class="row">
                <div class="col-sm-6">
                    <div>Banana split</div>
                    <img src="banana_split.jpg" alt="banana_split" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Dessert pizza</div>
                    <img src="dessert_pizza.jpg" alt="dessert_pizza" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Pancakes</div>
                    <img src="pancake.jpg" alt="pancake" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Tiramisu</div>
                    <img src="tiramisu.jpg" alt="tiramisu" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Macaroons</div>
                    <img src="macaroons.jpg" alt="macaroons" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>waffles</div>
                    <img src="waffles.jpg" alt="waffles" style="width: 79%;">
                </div>
                </div>
              </div>
        </div>
        <div id="menu6" class="tab-pane fade">
            <h3>Beverages</h3>
            <div class="tab-content">
                <div class="row">
                <div class="col-sm-6">
                    <div>Coffee</div>
                    <img src="coffee.jpg" alt="coffee" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Sparkling water</div>
                    <img src="sparkling_water.jpg" alt="sparkling_water" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Red wine</div>
                    <img src="red_wine.jpg" alt="red_wine" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>White wine</div>
                    <img src="white_wine.jpg" alt="white_wine" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Tea</div>
                    <img src="tea.jpg" alt="tea" style="width: 75%;">
                </div>
                <div class="col-sm-6">
                    <div>Coca Cola</div>
                    <img src="coca_cola.jpg" alt="coca_cola" style="width: 69%;">
                </div>
                </div>
              </div>
        </div>
      </div>
    </div>
</main>
<footer>
    <div class="footer">
        <p>cc L.F.</p>
    </div>
</footer>
</body>
</html>