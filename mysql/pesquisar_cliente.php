<?php

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
            
    $sql = "select * from cliente where nomeCliente like '%".$_POST['pesquisa']."%' or nifCliente like '%".$_POST['pesquisa']."%';";

    $results = $conn->query($sql); 
    while ($row = $results->fetch_assoc()) {
        echo "Encontrei o cliente: " . $row['nomeCliente'] . "<br>";
    }


    $conn->close();

?>