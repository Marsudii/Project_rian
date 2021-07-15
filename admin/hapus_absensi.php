<?php
require 'koneksi.php';

$query = "DELETE FROM absensi WHERE id_absen = " . $_GET['id'];
$delete = mysqli_query($conn, $query);

if ($delete) {
    $_SESSION['msg'] = 'Berhasil menghapus data';
    header('location:absensi.php');
} else {
    $_SESSION['msg'] = 'Gagal Hapus Data!!!';
    header('location:absensi.php');
}
