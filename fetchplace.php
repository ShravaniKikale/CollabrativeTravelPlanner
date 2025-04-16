<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="admin.html">Home</a>
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

$sql = "SELECT * FROM places";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card1">';
            echo '<img src="' . $row['image'] . '" alt="Card Image" class="card1-img">';
            echo '<div class="card1-content">';
            echo '<h2 class="card1-heading">' . $row['placename'] . '</h2>';
            echo '<p class="card1-text">' . $row['description'] . '</p>';
            echo '<a href="place_details.php?id=' . $row['id'] . '"><button id="card1-button">View</button></a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No places found.";
    }

    $conn->close();
    ?>