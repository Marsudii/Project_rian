<?php
$title = 'Tambah Data Jabatan';
require 'koneksi.php';

if (isset($_POST['btn-simpan'])) {
    $nama_jabatan = $_POST['nama_jabatan'];
    $golongan = $_POST['golongan'];
    $gaji = $_POST['gaji'];

    $query = "INSERT INTO jabatan (nama_jabatan, golongan, gaji) values ('$nama_jabatan', '$golongan', '$gaji')";
    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {
        $_SESSION['msg'] = 'Berhasil Menyimpan Data';
        header('location: jabatan.php');
    } else {
        $_SESSION['msg'] = 'Gagal menambahkan data baru!!!';
        header('location: jabatan.php');
    }
}

require 'header.php';
?>
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Forms</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="index.php">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="Jabatan.php">Data Jabatan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="tambah_jabatan">Tambah Jabatan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title; ?></div>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control form-control" id="defaultInput" placeholder="Nama Jabatan...">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Golongan</label>
                                <input type="text" name="golongan" class="form-control form-control" id="defaultInput" placeholder="Golongan...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Gaji</label>
                                <input type="number" name="gaji" class="form-control form-control" id="defaultInput" placeholder="Gaji..." >
                            </div>
                            <div class="card-action">
                                <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                <!-- <button class="btn btn-danger">Cancel</button> -->
                                <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger">Batal</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>