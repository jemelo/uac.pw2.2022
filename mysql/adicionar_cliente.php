<?php

    $codCliente = $_POST['codCliente'];
    $nomeCliente = $_POST['nomeCliente'];
    $nifCliente = $_POST['nifCliente'];

    $servername = "localhost";
    $username = "uac";
    $password = "testes";
    $database = "Empresa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
            
    $sql = "INSERT INTO Cliente (codCliente, nomeCliente, nifCliente) 
            VALUES ('$codCliente', '$nomeCliente', '$nifCliente')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>