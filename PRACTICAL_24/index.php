<?php
$conn = mysqli_connect("localhost", "root", "", "college");

if (!$conn)
    die("Connection Failed");

echo "Database Connected Successfully<br>";

$sql = "INSERT INTO student VALUES(4,'Neha','AI',88)";

if (mysqli_query($conn, $sql))
    echo "Record Inserted<br>";

$result = mysqli_query($conn, "SELECT * FROM student");

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . " ";
    echo $row['name'] . " ";
    echo $row['branch'] . " ";
    echo $row['marks'] . "<br>";
}

mysqli_close($conn);
?>