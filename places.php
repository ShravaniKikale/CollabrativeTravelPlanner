<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $placename = $_POST['placename'];
    $description = $_POST['description'];
    $introduction = $_POST['introduction'];
    $history = $_POST['history'];
    $places = $_POST['places'];
    $food = $_POST['food'];
    $location = $_POST['location'];

    // Handle image upload
    $targetDir = "uploads1/";
    $fileName = basename($_FILES["media"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["media"]["tmp_name"], $targetFilePath);

    // Insert data into database
    $sql = "INSERT INTO places (placename, description, introduction, history, places, food, location, image)
            VALUES ('$placename', '$description', '$introduction', '$history', '$places', '$food', '$location', '$targetFilePath')";

    if ($conn->query($sql) === TRUE) {
        echo "New place added successfully! <a href='front.php'>View page..</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
