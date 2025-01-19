<?php
// Start session
session_start();

// Database connection details
$host = "localhost";
$dbname = "your_database_name";
$username = "your_database_username";
$password = "your_database_password";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $inputUsername = trim($_POST['username']);
    $inputPassword = trim($_POST['password']);

    // Prepare SQL query to fetch password for the given username
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->store_result();

    // Check if username exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbPassword);
        $stmt->fetch();

        // Verify the entered password with the one in the database
        if (password_verify($inputPassword, $dbPassword)) {
            // Correct password, redirect to welcome page
            $_SESSION['username'] = $inputUsername; // Store username in session
            header("Location: welcome.php");
            exit();
        } else {
            // Wrong password
            echo "Wrong password.";
        }
    } else {
        echo "Username does not exist.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
