<?php
$title = 'Edit Data Pengguna';
require 'koneksi.php';

$role = [
    'admin',
    'pegawai',
    'user'
];
$pendidikan = [
    'SMK',
    'SMA',
    'Diploma 1',
    'Diploma 2',
    'Diploma 3',
    'Diploma 4',
    'Strata 1',
    'Strata 2'
];

$sk = [
    'Tetap',
    'Kontrak',
    'Magang',
    'Freelance',
    'Pensiun'
];
$agama = [
    'Islam',
    'Kristen',
    'Hindu',
    'Budhaa',
    'Lainnya'
];

$jabatan = mysqli_query($conn, "SELECT * FROM jabatan");

$id_user = $_GET['id'];
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$queryedit = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $nip = $_POST['nip'];
    $jk = $_POST['jk'];
    $pendidikan = $_POST['pendidikan'];
    $sk = $_POST['sk'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $id_jabatan = $_POST['id_jabatan'];

    

    $role = $_POST['role'];
    if ($_POST['password'] != null || $_POST['password'] == '') {
        $password = md5($_POST['password']);
        $query = "UPDATE user SET nama_user = '$nama', username = '$username', nip = '$nip', jk = '$jk', pendidikan = '$pendidikan', sk = '$sk', alamat = '$alamat', agama = '$agama', id_jabatan = '$id_jabatan', role = '$role', password = '$password' WHERE id_user = '$id_user'";
    } else {
        $query = "UPDATE user SET nama_user = '$nama', username = '$username', nip = '$nip', jk = '$jk', pendidikan = '$pendidikan', sk = '$sk', alamat = '$alamat', role = '$role' WHERE id_user = '$id_user'";
    }

    $update = mysqli_query($conn, $query);
    if ($update == 1) {
        $_SESSION['msg'] = 'Berhasil Update Data ' . $role;
        header('location:pegawai.php');
    } else {
        echo "<div class='alert alert-danger>Gagal Update Data!!!</div>";
        $_SESSION['msg'] = 'Gagal mengupdate data ' . $role . '!!!';
        header('location:pegawai.php');
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
                    <a href="pengguna.php">Pengguna</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pengguna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title; ?></div>
                    </div>
                    <?php while ($edit = mysqli_fetch_assoc($queryedit)) {
                    ?>
                        <form action="" method="POST">
                            <div class="card-body">
                            <div class="form-group">
                                    <label for="largeInput">NIP</label>
                                    <input type="text" name="nip" class="form-control form-control" id="defaultInput" value="<?php echo $edit['nip']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Nama Pegawai</label>
                                    <input type="text" name="nama_user" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_user']; ?>" placeholder="Nama...">
                                </div>
                                <div class="form-group">
                                <label for="defaultSelect">Pilih Jabatan</label>
                                <select name="id_jabatan" class="form-control form-control" id="defaultSelect">
                                    <?php while ($key = mysqli_fetch_array($jabatan)) { ?>
                                        <option value="<?= $key['id_jabatan']; ?>"><?= $key['nama_jabatan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                                <div class="form-group">
                                <label for="defaultSelect">Jenis Kelamin</label>
                                <br>
                                <input type="radio" name="jk" value="L" <?php if($edit['jk']=='L') echo 'checked' ?> > Laki - Laki
                                <br>
                                <br>
                                <input type="radio" name="jk" value="P" <?php if($edit['jk']=='P') echo 'checked' ?> >Peremepuan
    
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Agama</label>
                                <select name="agama"  class="form-control form-control" id="defaultSelect">
                                <?php foreach ($agama as $key) : ?>

                                    <?php if ($key == $edit['agama']) : ?>

                                            <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Pendidikan</label>
                                <select name="pendidikan"  class="form-control form-control" id="defaultSelect">
                                <?php foreach ($pendidikan as $key) : ?>

                                    <?php if ($key == $edit['pendidikan']) : ?>

                                            <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Status Kepegawaian</label>
                                <select name="sk"  class="form-control form-control" id="defaultSelect">
                                <?php foreach ($sk as $key) : ?>

                                    <?php if ($key == $edit['sk']) : ?>

                                            <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="largeInput">Alamat</label>
                                <textarea class="form-control" rows="5" name="alamat"><?= $edit['alamat']; ?></textarea>
                            </div>
                                <div class="form-group">
                                    <label for="largeInput">Username</label>
                                    <input type="text" name="username" class="form-control form-control" id="defaultInput" value="<?= $edit['username']; ?>" placeholder="Username...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Password</label>
                                    <input type="text" name="password" class="form-control form-control" id="defaultInput">
                                    <small>Kosongkan jika tidak melakukan perubahan password</small>
                                </div>
                                <div class="form-group">
                                    <label for="defaultSelect">Role</label>
                                    <select name="role" class="form-control form-control" id="defaultSelect">
                                        <?php foreach ($role as $key) : ?>

                                            <?php if ($key == $edit['role']) : ?>

                                                <option value="<?= $key ?>" selected><?= $key ?></option>
                                            <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                        <?php endforeach ?>
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
<?php } ?>
<?php require 'footer.php';
