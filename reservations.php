<?php
    session_start();
    $name = $_SESSION['name'];
    $lastName = $_SESSION['lastName'];

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
    {
        //User is logged in.
    }
    else
    {
      header("Location: login.php");
      exit;
    }
    if (isset($_POST['submit']))
    {
        
        $numOfPeople = $_POST['numOfPeople'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        
        $servername = "127.0.0.1";
        $username = "admin";
        $password = "lfranjicadmin";
        $dbname = "skladiste";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO rezervacije (ime, prezime, brojLjudi, datum, vrijeme)
                VALUES ('$name', '$lastName', '$numOfPeople', '$date', '$time')";
        
        if ($conn->query($sql) === TRUE)
        {
            header("Location: index.php");
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }
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
                <li><a href="index.php">Home</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li class="active"><a href="reservations.php">Reservations</a></li>
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
<main style="font-size: 25px">
    <div class="container">
        <h2>Reservation form</h2>
        <form method ="post">
          <div class="form-group">
          <input type="hidden" name="loggedInName" value="<?php echo $name; ?>" id="sessionName">
          <input type="hidden" name="loggedInLastName" value="<?php echo $lastName; ?>" id="sessionName">
          <br>
            <label for="numOfPeopleSelect">Select number of people:</label>
            <select class="form-control" id="numOfPeopleSelect" name="numOfPeople">
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>6+</option>
            </select>
            <label for="dateSelect">Select a date for your reservation:</label>
              <input type="date" name="date" id="dateSelect" required min="<?php echo date('Y-m-d'); ?>" max="2200-12-31">
              <br>
            <label for="timeSelect">Select a time for your reservation:</label>
              <input type="time" name="time" required step="1800" id="timeSelect">
              <br>
              <button style="margin-left: 22.35rem;" type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        <button style="margin-left: 18.5rem;" id="getTableData" name="showReservations" class="btn btn-secondary">Show Reservations</button>
        <br>
        <div id="tableContainer">

        </div>
        <br>
        <div class="form-group">
          <form action="cancelReservation.php" method="post" class="cancel-reservation">
          <h2 style="margin-left: -8.5rem">Select the reservation information to cancel it.</h2>
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" required>
          <br>
          <label for="time">Time:</label>
          <input type="time" id="time" name="time" required>
          <br>
          <button type="submit" class="btn btn-danger">Cancel reservation</button>
      </form>
      </div>
    </div>
</main>
<footer>
    <p>cc L.F.</p>
</footer>
</body>
</html>
