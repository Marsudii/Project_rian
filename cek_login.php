<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_pegawai");

$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$row = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);

if ($cek > 0) {
    if ($data['role'] == 'admin') {
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $data['username'];
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['id_jabatan'] = $data['id_jabatan'];
        header('location:admin');
    } else if ($data['role'] == 'pegawai') {
        $_SESSION['role'] = 'pegawai';
        $_SESSION['username'] = $data['username'];
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['outlet_id'] = $data['outlet_id'];
        header('location:pegawai');
    } else if ($data['role'] == 'user') {
        $_SESSION['role'] = 'user';
        $_SESSION['username'] = $data['username'];
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['outlet_id'] = $data['outlet_id'];
        header('location:user');
    }
} else {
    $message = 'Username atau password salah!!!';
    header('location:index.php?message=' . $message);
}
