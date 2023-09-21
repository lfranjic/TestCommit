<?php
session_start();
$servername = "127.0.0.1";
$username = "admin";
$password = "lfranjicadmin";
$dbname = "skladiste";

$_SESSION['loggedin'] = false;
$_SESSION['email'] = '';
$_SESSION['name'] = '';
$_SESSION['lastName'] = '';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password))
    {
        echo "Please enter both email and password.";
    } 
    else 
    {
        $query = "SELECT * FROM korisnici WHERE email='$email' AND lozinka='$password'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) 
        {
            echo "Login successful. Welcome!";
            $row = $result->fetch_assoc();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['ime'];
            $_SESSION['lastName'] = $row['prezime'];
            header("Location: reservations.php");
        } 
        else 
        {
            echo "Invalid email or password.";
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Il Nuovo Ristorante</title>
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
                <li><a href="index.php">Home</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="reservations.php">Reservations</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="register.php">Register</a></li>';
                    echo '<li><a href="login.php">Login</a></li>';
                }
            ?>
            </ul>
          </div>
        </div>
    </nav>
</header>
<main style="font-size: 24px">
    <div class="container">
        <h1 style="margin-left: 32.5rem">Login</h1>
        <form method="POST" action="" class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email" name="email">E-mail:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Enter e-mail" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10">          
              <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label><input type="checkbox" style="margin-top: 11px" name="remember">Remember me</label>
              </div>
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" style="font-size: 20px" class="btn btn-primary" name="login">Login</button>
            </div>
          </div>
        </form>
      </div>
</main>
<footer>
    <p>cc L.F.</p>
</footer>
</body>
</html>
