<?php
$title = 'Selamat Datang di Aplikasi Sistem Informasi Pegawai';
require 'koneksi.php';
require 'header.php';

setlocale(LC_ALL, 'id_id');
setlocale(LC_TIME, 'id_ID.utf8');

$query = mysqli_query($conn, "SELECT COUNT(id_user) as jumlah_user FROM user");
$jumlah_user = mysqli_fetch_assoc($query);

$query = mysqli_query($conn, "SELECT COUNT(id_absen) as jumlah_absensi FROM absensi");
$jumlah_absensi = mysqli_fetch_assoc($query);

$query = mysqli_query($conn, "SELECT COUNT(id_jabatan) as jumlah_jabatan FROM jabatan");
$jumlah_jabatan = mysqli_fetch_assoc($query);

$query = mysqli_query($conn, "SELECT COUNT(id_gaji) as total_penghasilan FROM gaji");
$total_penghasilan = mysqli_fetch_assoc($query);

?>

<div class="panel-header bg-secondary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white pb-2 fw-bold"><?= $title; ?></h1>
                <h2 class="text-white op-7 mb-2">Admin Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Data Pegawai</p>
                                <h4 class="card-title"><?= $jumlah_user['jumlah_user']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Data Jabatan</p>
                                <h4 class="card-title"><?= $jumlah_jabatan['jumlah_jabatan']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="flaticon-success"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Absensi</p>
                                <h4 class="card-title"><?= $jumlah_absensi['jumlah_absensi']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="flaticon-graph"></i>
                            </div>
                        </div>
                      <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Penghasilan</p>
                                <h4 class="card-title"><?= $total_penghasilan['total_penghasilan']; ?></h4>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
<?php
require 'footer.php';
?>
