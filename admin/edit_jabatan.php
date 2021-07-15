<?php
$title = 'Edit Data Jabatan';
require 'koneksi.php';



$query = "SELECT * FROM jabatan WHERE id_jabatan  = " . $_GET['id'];
$data = mysqli_query($conn, $query);
$edit = mysqli_fetch_assoc($data);


$query2 = "SELECT user.*, jabatan.nama_jabatan FROM jabatan RIGHT JOIN user ON user.id_jabatan = jabatan.id_jabatan WHERE user.role = 'owner' ORDER BY user.outlet_id ASC";
$data2 = mysqli_query($conn, $query2);

if (isset($_POST['btn-simpan'])) {
    $nama_jabatan = $_POST['nama_jabatan'];
    $golongan = $_POST['golongan'];
    $gaji = $_POST['gaji'];

    $query = "UPDATE jabatan SET nama_jabatan = '$nama_jabatan', golongan = '$golongan', gaji = '$gaji' WHERE id_jabatan = " . $_GET['id'];

    $update = mysqli_query($conn, $query);
    if ($update == 1) {

        $_SESSION['msg'] = 'Berhasil edit data jabatan ';
        header('location:jabatan.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
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
                    <a href="jabatan.php">Jabatan</a>
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
                        <div class="card-title"><?= $title; ?>
                            : <strong><?= $edit['nama_jabatan']; ?></strong></div>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">Nama Jabatan</label>
                                <input type="text" name="nama_jabatan" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_jabatan']; ?>" placeholder="Nama Jabatan...">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Golongan</label>
                                <input type="text" name="golongan" class="form-control form-control" id="defaultInput" value="<?= $edit['golongan']; ?>" placeholder="Golongan...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Gaji</label>
                                <input type="number" name="gaji" class="form-control form-control" id="defaultInput" value="<?= $edit['gaji']; ?>" placeholder="Gaji..." >
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
<?php require 'footer.php';
