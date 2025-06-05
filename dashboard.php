<?php
if(isset($_POST['logout'])){
    session_start();
    unset($_SESSION['user']);

    header('location: index.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Selamat</h1>
    <h3>Klik untuk mencoba lagi</h3>
    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">Logout</button>
    </form>
    <hr />
    <i>hii</i>
</body>
</html>