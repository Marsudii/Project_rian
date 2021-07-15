<?php
$title = 'Tambah Data Pegawai';
require 'koneksi.php';

$jabatan = mysqli_query($conn, "SELECT * FROM jabatan");

if (isset($_POST['btn-simpan'])) {
    
    $nama     = $_POST['nama_user'];
    $nip    = $_POST['nip'];
    $agama    = $_POST['agama'];
    $jk         = $_POST['jk'];
    $sk         = $_POST['sk'];
    $alamat         = $_POST['alamat'];
    $pendidikan         = $_POST['pendidikan'];
    $username       = $_POST['username'];
    $password       = md5($_POST['password']);
    $role           = $_POST['role'];
    $id_jabatan     = $_POST['id_jabatan'];
    
    $query = "INSERT INTO user (nama_user, nip, agama, jk, sk, alamat, pendidikan, username, password, role, id_jabatan) values ('$nama', '$nip', '$agama', '$jk', '$sk', '$alamat', '$pendidikan', '$username', '$password', '$role', '$id_jabatan')";

    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {

        $_SESSION['msg'] = 'Berhasil menambahkan ' . $role . ' baru';
        header('location:pegawai.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header('location: pegawai.php');
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
                    <a href="pegawai.php">Data Pegawai</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Data Pegawai</a>
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
                                <label for="largeInput">NIP</label>
                                <input type="text" name="nip" class="form-control form-control" id="defaultInput" placeholder="Username...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Nama Pegawai</label>
                                <input type="text" name="nama_user" class="form-control form-control" id="defaultInput" placeholder="Nama Pegawai...">
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Jenis Kelamin</label>
                                <br>
                                <input type="radio" name="jk" value="L">Laki - Laki </input>
                                <br>
                                <br>
                                <input type="radio" name="jk" value="P"> Perempuan </input>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Pendidikan</label>
                                <select name="pendidikan" class="form-control form-control" id="defaultSelect">
                                    <option value="SMK">SMK</option>
                                    <option value="SMK">SMA</option>
                                    <option value="Diploma 1">Diploma 1</option>
                                    <option value="Diploma 1">Diploma 2</option>
                                    <option value="Diploma 1">Diploma 3</option>
                                    <option value="Diploma 1">Diploma 4</option>
                                    <option value="Strata 1">Strata 1</option>
                                    <option value="Strata 2">Strata 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Status Kepegawaian</label>
                                <select name="sk" class="form-control form-control" id="defaultSelect">
                                    <option value="Tetap">Tetap</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Pensiun">Pensiun</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Agama</label>
                                <select name="agama" class="form-control form-control" id="defaultSelect">
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Alamat</label>
                                <textarea class="form-control" rows="5" name="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Pilih Data Jabatan</label>
                                <select name="id_jabatan" class="form-control form-control" id="defaultSelect">
                                    <?php while ($key = mysqli_fetch_array($jabatan)) { ?>
                                        <option value="<?= $key['id_jabatan']; ?>"><?= $key['nama_jabatan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                          
                            <div class="form-group">
                                <label for="largeInput">Username</label>
                                
                                <input type="text" name="username" class="form-control form-control" id="defaultInput" placeholder="Username...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Password</label>
                                <input type="text" name="password" class="form-control form-control" id="defaultInput" placeholder="Password...">
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Hak Akses</label>
                                <select name="role" class="form-control form-control" id="defaultSelect">
                                    <option value="admin">Admin</option>
                                    <option value="pegawai">Pegawai</option>
                                    <option value="user">User</option>
                                </select>
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