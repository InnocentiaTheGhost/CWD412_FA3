
<?php
$host = 'localhost';
$username = 'root';
$password = ''; 
$db_name = 'ctu'; 
$table_name = 'subscription'; 

$conn = new mysqli($host, $username, $password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    
    $query = "SELECT * FROM $table_name WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already subscribed.";
    } else {
       
        $query = "INSERT INTO $table_name (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        echo "Subscription successful!";
    }
} else {
    echo "Error subscribing.";
}


$conn->close();
?>















