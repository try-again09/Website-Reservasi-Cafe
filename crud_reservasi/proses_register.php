<?php
include 'koneksi.php'; // Pastikan file koneksi sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Validasi apakah password dan confirm_password sama
    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan konfirmasi password tidak cocok!'); window.location.href='register.php';</script>";
        exit();
    }

    // Enkripsi password sebelum disimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Periksa apakah username sudah ada
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username sudah terdaftar!'); window.location.href='register.php';</script>";
        exit();
    }

    // Simpan data ke database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registrasi gagal! Coba lagi.'); window.location.href='register.php';</script>";
        exit();
    }
}
?>
