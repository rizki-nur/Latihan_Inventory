<?php
session_start();
$conn = new mysqli("localhost", "root", "1234", "inventory_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['role'] = $user['role'];
        header("Location: secure_page.php");
    } else {
        echo "Invalid username or password";
    }
}
?>
