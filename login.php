<?php
include "service/database.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $data = $result->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["login"] = true;

        header('location: dashboard.php');
    }else{
        echo "Gagal Login";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>Masuk Akun</h1>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username"><br>
        <input type="password" placeholder="password" name="password"><br>
        <button type="submit" name="login">masuk</button>
    </form>
    <hr />
        <u><i>Login</i></u>
</body>
</html>