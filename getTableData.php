<?php
    $servername = "127.0.0.1";
    $username = "admin";
    $password = "lfranjicadmin";
    $dbname = "skladiste";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
    {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT ime, prezime, brojLjudi, datum, vrijeme FROM rezervacije ORDER BY datum ASC";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) 
    {
        while ($row = $result->fetch_assoc()) 
        {
            $data[] = $row;
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($data);
?>