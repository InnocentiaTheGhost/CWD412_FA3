<?php

$servername = "localhost";
$username = "root"; 
$password = "";    
$dbname = "ctu";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $document = $_FILES['document']['tmp_name']; // Temp file
    $documentContent = addslashes(file_get_contents($document)); 
    
    $timestamp = date('Y-m-d H:i:s');
   
    $stmt = $conn->prepare("INSERT INTO  uploads (document) VALUES (?)");
    $stmt->bind_param("s", $document);

    
    if ($stmt->execute()) {
        echo "Document added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

  
    $stmt->close();
    $conn->close();
}
?>