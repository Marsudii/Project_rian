<?php
require 'koneksi.php';

$query = "DELETE FROM jabatan WHERE id_jabatan = " . $_GET['id'];
$delete = mysqli_query($conn, $query);

if ($delete == 1) {
    $_SESSION['msg'] = 'Berhasil Mengahapus Data';
    header('location:jabatan.php?');
} else {
    $_SESSION['msg'] = 'Gagal Hapus Data!!!';
    header('location:jabatan.php');
}
