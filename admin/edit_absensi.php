<?php
$title = 'Edit Data Absensi';
require 'koneksi.php';


$pegawai = mysqli_query($conn, "SELECT * FROM user");

$id = $_GET['id'];
$query = "SELECT * FROM absensi WHERE id_absen = '$id'";
$queryedit = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_paket'];
    $jenis = $_POST['jenis_paket'];
    $harga = $_POST['harga'];
    $id_outlet = $_POST['outlet_id'];

    $query = "UPDATE paket_cuci SET nama_paket = '$nama', jenis_paket = '$jenis', harga = '$harga', outlet_id = '$id_outlet' WHERE id_paket = '$id'";
    $update = mysqli_query($conn, $query);
    if ($update == 1) {
        $_SESSION['msg'] = 'Berhasil mengubah data';
        header('location:paket.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header('location:paket.php');
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
                    <a href="absensi.php">Data Absensi</a>
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
                    <?php while ($edit = mysqli_fetch_assoc($queryedit)) { ?>


                        <form action="" method="POST">
                            <div class="card-body">

                            <div class="form-group">
                                <label for="defaultSelect">Nama Pegawai</label>
                                <select name="id_user" class="form-control form-control" id="defaultSelect">
                                    <?php while ($key = mysqli_fetch_array($pegawai)) { ?>
                                        <option value="<?= $key['id_user']; ?>"><?= $key['nama_user']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="largeInput">Tanggal : </label>
                                <input type="date" name="tanggal" id="tanggal" value="<?php echo $edit['tanggal']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Jam Datang : </label>
                                <input type="time" name="jam_datang" id="jam_datang" value="<?php echo $edit['jam_datang']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Jam Pulang : </label>
                                <input type="time" name="jam_pulang" id="jam_pulang" value="<?php echo $edit['jam_pulang']; ?>">
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
<?php } ?>
<?php require 'footer.php'; ?>