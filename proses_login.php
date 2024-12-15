<?php
require 'koneksi.php'; // Pastikan file koneksi ke database sudah benar
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username']; // Simpan sesi pengguna
            header("Location: index.php"); // Arahkan ke halaman CRUD
        } else {
            echo "Password salah!";
        }
    } else {
        echo "User tidak ditemukan!";
    }
}
?>
