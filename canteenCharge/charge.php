<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$db = 'park';
$product = $_POST['product'];
$ID = $_POST['ID'];
$amount = $_POST['amount'];

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
$sql = "INSERT INTO canteen_products_has_visitor_card (canteen_products_idcanteen_products, visitor_card_idvisitor_card, visitor_card_euro_charge) VALUES ('$product', '$ID', '$amount')";

if (mysqli_query($conn, $sql)) {
     echo "\n <br>New record created successfully";
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT euro_charge FROM visitor_card WHERE idvisitor_card='$ID'";
$getBalance = mysqli_query($conn, $sql);
$balance = $getBalance->fetch_column();
$sql = "UPDATE visitor_card SET euro_charge = $balance - $amount WHERE idvisitor_card = $ID";
if (mysqli_query($conn, $sql)) {
     echo "\n <br>charged successfully";
} else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>