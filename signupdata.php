<?php
$servername = "localhost";
$username   = "root"; 
$password   = ""; 
$dbname     = "pateintdata";

// Database connect
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO `signupdata` (`username`, `email`, `password`) VALUES ('$user', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('✅ Signup Successful!'); window.location.href='index.php';</script>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
$conn->close();
?>
