<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
</head>
<body>
    
</body>
</html>





<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM places WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>" . $row['placename'] . "</h1>";
    echo "<img src='" . $row['image'] . "' alt='Image'>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p><strong>Introduction:</strong> " . $row['introduction'] . "</p>";
    echo "<p><strong>History:</strong> " . $row['history'] . "</p>";
    echo "<p><strong>Places to Visit:</strong> " . $row['places'] . "</p>";
    echo "<p><strong>Famous Food:</strong> " . $row['food'] . "</p>";
    echo "<p><strong>Location:</strong> " . $row['location'] . "</p>";
} else {
    echo "No details found.";
}

$conn->close();
?>