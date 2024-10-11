<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$db_name = 'ctu'; 
$table_name = 'comments'; 


$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    
    $query = "INSERT INTO comments (name, comment) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $name,$comment, );
    $stmt->execute();

    echo "Comment is submitted successfully!";
} else {
    echo "Error submitting comment.";
}


$conn->close();
?>


