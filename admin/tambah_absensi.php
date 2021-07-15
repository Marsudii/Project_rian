<?php
$title = 'Tambah Data Absen';
require 'koneksi.php';

$query = "SELECT * FROM user";
$data = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $id_user = $_POST['id_user'];
    $tanggal = $_POST['tanggal'];
    $jam_datang = $_POST['jam_datang'];
    $jam_pulang = $_POST['jam_pulang'];

    $query = "INSERT INTO absensi (id_user, tanggal, jam_datang, jam_pulang) values ('$id_user', '$tanggal', '$jam_datang', '$jam_pulang')";
    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {
        $_SESSION['msg'] = 'Berhasil tambah data absensi';
        header('location:absensi.php');
    } else {
        $_SESSION['msg'] = 'Gagal menambahkan data absensi';
        header('location: absensi.php');
    }
}

require 'header.php'
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
                    <a href="absensi.php">Absensi</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= $title; ?></a>
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
                                <label for="defaultSelect">Pilih Pegawai</label>
                                <select name="id_user" class="form-control form-control" id="defaultSelect">
                                    <?php while ($key = mysqli_fetch_array($data)) { ?>
                                        <option value="<?= $key['id_user']; ?>"><?= $key['nama_user']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Tanggal : </label>
                                <input type="date" name="tanggal" id="tanggal" value="" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Jam Datang : </label>
                                <input type="time" name="jam_datang" id="jam_datang" placeholder="HH:ii (Format 24 Jam)">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Jam Pulang : </label>
                                <input type="time" name="jam_pulang" id="jam_pulang" placeholder="HH:ii (Format24 Jam)">
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
<?php require 'footer.php'; ?>