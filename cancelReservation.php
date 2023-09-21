<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['name']) && isset($_SESSION['lastName'])) {

    $servername = "127.0.0.1";
    $username = "admin";
    $password = "lfranjicadmin";
    $dbname = "skladiste";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_SESSION['name'];
    $lastName = $_SESSION['lastName'];
    $date = $_POST["date"];
    $time = $_POST["time"];

    $sql = "DELETE FROM rezervacije WHERE ime = ? AND prezime = ? AND datum = ? AND vrijeme = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $lastName, $date, $time);


    if ($stmt->execute()) {
        header("Location: reservations.php");
    } else {
        echo "Error deleting reservation: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request or user not logged in.";
}
?>
