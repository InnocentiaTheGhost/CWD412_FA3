<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$db_name = 'ctu'; 
$table_name = 'question'; 


$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $question = $_POST["question"];

    
    $query = "INSERT INTO $table_name (name, question) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name, $question);
    $stmt->execute();

    echo "Question submitted successfully!";
} else {
    echo "Error submitting question.";
}


$conn->close();
?>