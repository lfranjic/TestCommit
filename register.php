<?php
$servername = "127.0.0.1";
$username = "admin";
$password = "lfranjicadmin";
$dbname = "skladiste";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register']))
{
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($lastName) || empty($email) || empty($password))
    {
        echo "Please enter all required fields.";
    }
    elseif (strlen($password) < 6)
    {
        echo "Password must be at least 6 characters long.";
    }
    else
    {
        $query = "SELECT * FROM korisnici WHERE ime = '$name' AND prezime = '$lastName'";
        $result = $conn->query($query);
        $insertQuery = "INSERT INTO korisnici (ime, prezime, email, lozinka) VALUES ('$name', '$lastName', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE)
        {
            //echo "Registration successful. You can now login.";
            header("Location: login.php");
        }
        else
        {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
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
                <li class="active"><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
          </div>
        </div>
    </nav>
</header>
<main style="font-size: 24px">
    <div class="container">
        <h1 style="margin-left: 20rem">Registration</h1>
        <form method="POST" class="form-horizontal" action="" name="register">
          <div class="form-group">
              <label class="control-label col-sm-2" for="name">Name:</label>
              <div class="col-sm-10">
                <input type="name" class="form-control" id="name" placeholder="Enter first name" name="name">
              </div>
          </div>  
          <div class="form-group">
              <label class="control-label col-sm-2" for="lastName">Last name:</label>
              <div class="col-sm-10">
                <input type="lastName" class="form-control" id="lastName" placeholder="Enter last name" name="lastName">
              </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10">          
              <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" style="font-size: 20px" class="btn btn-primary" name="register">Register</button>
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
