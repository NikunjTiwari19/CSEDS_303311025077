<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "college");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS students(
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
branch VARCHAR(30)
)");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $branch = $_POST['branch'];

    $stmt = mysqli_prepare($conn, "INSERT INTO students(name,branch) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt, "ss", $name, $branch);
    mysqli_stmt_execute($stmt);
}

echo "<h2>Student Management System</h2>";

$result = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . " " . $row['name'] . " " . $row['branch'] . "<br>";
}

echo '<br><a href="index.php">Home</a>';
?>