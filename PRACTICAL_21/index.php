<!DOCTYPE html>
<html>

<body>
    <h2>GET Method</h2>
    <form method="get">
        <input type="text" name="name" placeholder="Enter Name">
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_GET['name']))
        echo "Welcome " . $_GET['name'];
    ?>

    <h2>POST Method</h2>
    <form method="post">
        <input type="text" name="city" placeholder="Enter City">
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['city']))
        echo "Your City: " . $_POST['city'];
    ?>
</body>

</html>