<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$db = 'park';
$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$afm = $_POST['afm'];
$tel = $_POST['tel'];
$date = date("Y-m-d H:i:s", strtotime($_POST["date"]));
$change = $_POST['change'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "INSERT INTO visitor_card (first_name, last_name, afm_number, telephone, date, euro_charge) VALUES ('$fname', '$lname', '$afm', '$tel', '$date', '$change')";

if (mysqli_query($conn, $sql)) {
     echo "\n <br>New record created successfully";
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>