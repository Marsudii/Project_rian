<?php
$title = 'Data Pegawai';
require 'koneksi.php';


$query = 'SELECT * FROM user INNER JOIN jabatan ON nama_jabatan=jabatan ORDER BY role desc';
$data = mysqli_query($conn, $query);




require 'header.php';
?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            </div>
        </div>
        <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') { ?>
            <div class="alert alert-success" role="alert" id="msg">
                <?= $_SESSION['msg']; ?>
            </div>
        <?php }
        $_SESSION['msg'] = ''; ?>
    </div>
</div>
<div class="page-inner mt--5">

    <diva class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="tambah_pegawai.php" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Pegawai
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 7%;">NO</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Foto</th>
                                    <th>Nama Jabatan</th>
                                    <th>Pendidikan</th>
                                    <th>Status Kepegawaian</th>
                                    <th>Alamat</th>
                                    <th>Username</th>
                                    <th>Hak Akses</th>
                                    <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($user = mysqli_fetch_assoc($data)) {
                                ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $user['nip']; ?></td>
                                            <td><?= $user['nama_user']; ?></td>
                                            <td><?= $user['jk']; ?></td>
                                            <td><?= $user['agama']; ?></td>
                                            <td><?= $user['foto']; ?></td>
                                            <td><?= $user['nama_jabatan']; ?></td>
                                            <td><?= $user['pendidikan']; ?></td>
                                            <td><?= $user['sk']; ?></td>
                                            <td><?= $user['alamat']; ?></td>
                                            <td><?= $user['username']; ?></td>
                                            <td><?= $user['role']; ?></td>
                                            <!-- <td><?php if ($user['jenis_kelamin'] == 'L') {
                                                            echo "Laki-laki";
                                                        } else {
                                                            echo "Perempuan"; 
                                                        } ?>
                                            </td> -->
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="edit_pengguna.php?id=<?= $user['id_user']; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="hapus_pengguna.php?id=<?= $user['id_user']; ?>" onclick="return confirm('Yakin hapus data?');" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
<?php
require 'footer.php';
?>