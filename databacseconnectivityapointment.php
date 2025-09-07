<?php
// Database connection
$servername = "localhost";  // XAMPP/WAMP me "localhost" hota hai
$username = "root";         // default XAMPP username
$password = "";             // default password blank hota hai
$dbname = "apoinment";       // database ka naam

$conn = new mysqli($servername, $username, $password, $dbname);

// Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Agar form submit hua hai
if (isset($_POST['sb'])) {
    $fullname   = $_POST['nam'];
    $email      = $_POST['mail'];
    $phone      = $_POST['phone'];
    $date       = $_POST['dat'];
    $department = $_POST['dep'];
    $message    = $_POST['mass'];

    // SQL Insert Query
    $sql = "INSERT INTO `apoinmentdata` (`full name`, `Email`, `Phone_Number`, `Date`, `Department`, `Massage`) 
            VALUES ('$fullname', '$email', '$phone', '$date', '$department', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3 style='color:green;'>✅ Appointment booked successfully!</h3>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
