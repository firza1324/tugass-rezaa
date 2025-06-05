<?php
include "service/database.php";

if (isset($_POST['daftar'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Username dan password tidak boleh kosong.";
        exit;
    }

    
    $cek = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $cek->bind_param("s", $username);
    $cek->execute();
    $cek->store_result(); 
    if ($cek->num_rows > 0) {
        echo "Username sudah terdaftar. Gunakan username lain.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Gagal daftar: " ;
    }

    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>daftar</title>
</head>
<body>
    <h1>Selamat Datang</h1>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"><br>
        <input type="password" placeholder="password" name="password"><br>
        <button type="submit" name="daftar">Daftar</button>
    </form>
    <hr />
        <h1>Daftar Akunmu</h1>
</body>
</html>