<?php $host = "localhost";
$user = "root";
$password = "";
$database = "travel"; // Replace with your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

            
       
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $sql = "INSERT INTO login(email, password) VALUES ('$email' ,'$password')";
        if ($conn->query($sql)) {
            echo "You've Logged in successfully . <a href='front.html'>Back to home..</a>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
        $conn->close();
    ?>
    