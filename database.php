<?php
    // New sql object
    require_once 'login.php';
    $conn = new mysqli($hostname, $un, $pw, $db);
    if ($conn->connect_error) die("Fatal error");
    
    // Query search
    $query = "SELECT * FROM plu_table";
    $result = $conn->query($query);
    if (!$result) die('Fatal error');

    $rows = $result->num_rows;

    for ($i=0; $i < $rows; $i++) { 
        $result->data_seek($i);
        echo 'PLU: ' . htmlspecialchars($result->fetch_assoc()['plu']) . '<br>';
        $result->data_seek($i);
        echo 'PRODUCT: ' . htmlspecialchars($result->fetch_assoc()['product']) . '<br>';
        $result->data_seek($i);
        echo 'ALCOHOL: ' . htmlspecialchars($result->fetch_assoc()['alcohol']) . '<br>';
        $result->data_seek($i);
        echo 'PRIJS: ' . htmlspecialchars($result->fetch_assoc()['prijs']) . '<br><br>';

    }

    $result->close();
    $conn->close();


