<?php
session_start();

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'])
{
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $userReview = $_POST["user_review"];

    if (empty($userReview))
    {
        echo "Please enter your review.";
    }
    else
    {
        $servername = "127.0.0.1";
        $username = "admin";
        $password = "lfranjicadmin";
        $dbname = "skladiste";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO recenzije (recenzija) VALUES ('$userReview')";

        if ($conn->query($sql) === TRUE)
        {
            //echo "Review posted successfully!";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
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
                <li class="active"><a href="reviews.php">Reviews</a></li>
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
<main>
    <div class="container">
        <h2>Reviews</h2>
        <div class="panel-group">
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

            $sql = "SELECT recenzija FROM recenzije";
            $result = $conn->query($sql);

            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    echo '<div class="panel panel-default">';
                    echo '<div class="panel-body">' . $row["recenzija"] . '</div>';
                    echo '</div>';
                }
            }
            else
            {
                echo "No reviews available.";
            }

            $conn->close();
            ?>
        </div>
        <h3>Post Your Review</h3>
        <form method="POST">
            <div class="form-group">
                <textarea class="form-control" name="user_review" rows="4" placeholder="Write your review here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>
</main>
<footer>
    <p>cc L.F.</p>
</footer>
</body>
</html>