<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn)
    die("Database Connection Failed");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users(
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
password VARCHAR(255)
)");

if (isset($_POST['register'])) {
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO users(username,password) VALUES(?,?)");
    mysqli_stmt_bind_param($stmt, "ss", $u, $p);
    mysqli_stmt_execute($stmt);
    echo "Registered Successfully<br>";
}

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $u);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($p, $row['password'])) {
        session_regenerate_id(true);
        $_SESSION['user'] = $u;
        setcookie("user", $u, time() + 3600, "/");
    } else {
        echo "Invalid Login<br>";
    }
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    setcookie("user", "", time() - 3600, "/");
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['user'])) {
    echo "Welcome " . $_SESSION['user'] . "<br>";
    echo '<a href="?logout=1">Logout</a><hr>';
    echo '<h3>Add Student</h3>
    <form method="post" action="student.php">
    <input name="name" placeholder="Student Name" required>
    <input name="branch" placeholder="Branch" required>
    <button>Add Student</button></form>';
} else {
    ?>
    <h2>Register</h2>
    <form method="post">
        <input name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="register">Register</button>
    </form>

    <h2>Login</h2>
    <form method="post">
        <input name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>
<?php } ?>