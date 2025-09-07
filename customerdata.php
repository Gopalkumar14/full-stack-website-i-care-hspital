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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ragister'])) {
    $patientname = $_POST['patentname'];
    $fathername  = $_POST['fathername'];   // <-- form me bhi name="fathername" add karo
    $mobile       = $_POST['mobail'];       // <-- match form field
    $email        = $_POST['email'];
    $password     = $_POST['pass']; // secure password
    $gender       = $_POST['gender'];
    $dob          = $_POST['date'];
    $state        = $_POST['state'];
    $district     = $_POST['district'];
    $disease      = $_POST['desess'];
    // report
$report = "";
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $report = $targetDir . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $report)) {
        echo "<script>alert('✅ data Successful!');.$report </script>";
    } else {
        echo "❌ File upload failed!";
    }
}


   

    // Insert Query (column names must be same as DB table)
    $sql = "INSERT INTO `data` (`Pateint name`, `Father name`, `Phone Number`, `Email`, `Password`, `Gender`, `Date of borth`, `state`, `Distic`, `Disess`) 
            VALUES ('$patientname', '$fathername', '$mobile', '$email', '$password', '$gender', '$dob', '$state', '$district', '$disease')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3 style='color:green;'>✅ Patient Registered Successfully!</h3>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>
