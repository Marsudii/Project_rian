<?php
session_start();
if ($_SESSION) {
    if ($_SESSION['role'] == 'admin') {
    } else {
        header("location:../index.php");
    }
} else {
    header('location:../index.php');
}

$conn = mysqli_connect("localhost", "root", "", "db_pegawai");

if (mysqli_connect_error()) {
    echo "Koneksi ke database gagal : " . mysqli_connect_error();
}


function tanggal_indo($tanggal, $cetak_hari = false)
{
$hari = array ( 1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
  );

$bulan = array (1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
$split 	  = explode('-', $tanggal);
$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

if ($cetak_hari) {
$num = date('N', strtotime($tanggal));
return $hari[$num] . ', ' . $tgl_indo;
}
return $tgl_indo;
}
