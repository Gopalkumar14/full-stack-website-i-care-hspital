<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "pateintdata";  // apna DB name likho

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Insert form data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['massage'];

    $sql = "INSERT INTO `massagepatent` (`name`, `email`, `massage`) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Message Sent Successfully!";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>
