<?php
$title = 'Tambah Data Pegawai';
require 'koneksi.php';

$outlet = mysqli_query($conn, "SELECT * FROM outlet");
if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $id_outlet = $_POST['id_outlet'];
    $query = "INSERT INTO user (nama_user, username, password, role, outlet_id) values ('$nama', '$username', '$password', '$role', '$id_outlet')";

    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {

        $_SESSION['msg'] = 'Berhasil menambahkan ' . $role . ' baru';
        header('location:pengguna.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header('location: pengguna.php');
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
                                <label for="largeInput">Nip</label>
                                <input type="text" name="nip" class="form-control form-control" id="defaultInput" placeholder="Masukan NIP...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Nama Pegawai</label>
                                <input type="text" name="nama_user" class="form-control form-control" id="defaultInput" placeholder="Nama Pegawai...">
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Jenis Kelamin</label>
                                <select name="jk" class="form-control form-control" id="defaultSelect">
                                    <option value="laki">Laki - Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Pilih Data Jabatan</label>
                                <select name="id_pegawai" class="form-control form-control" id="defaultSelect">
                                    <?php while ($key = mysqli_fetch_array($outlet)) { ?>
                                        <option value="<?= $key['id_pegawai']; ?>"><?= $key['nama_jabatan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Agama</label>
                                <input type="text" name="agama" class="form-control form-control" id="defaultInput" placeholder="Agama...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Status Kepegawaian</label>
                                <input type="text" name="sk" class="form-control form-control" id="defaultInput" placeholder="Status Kepegawaian...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Alamat</label>
                                <input type="text" name="alamat" class="form-control form-control" id="defaultInput" placeholder="Masukan Alamat...">
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
                                    <option value="kasir">Pegawai</option>
                                    <option value="owner">User</option>
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