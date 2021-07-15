<?php
$title = 'Data Absensi';
require 'koneksi.php';


$data = mysqli_query($conn, 'SELECT * FROM absensi JOIN user ON absensi.id_user = user.id_user ORDER BY role desc');

$hitung = mysqli_query($conn, 'SELECT * FROM absensi');







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
                        <a href="tambah_absensi.php" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Absensi 
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 7%">#</th>
                                    <th>Nama</th>
                                    <th>Hari, Tanggal</th>
                                    <th>Jam Datang</th>
                                    <th>Jam Pulang</th>
                                    <th>Jam Kerja</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($absensi = mysqli_fetch_assoc($data)) {
                                ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $absensi['nama_user']; ?></td>
                                            <td><?php
    $tanggal = $absensi['tanggal'];
    echo tanggal_indo ($tanggal, true);
?></td>
                                            <td><?php $jamdatang = $absensi['jam_datang']; echo date("H:i", strtotime($jamdatang));?></td>     
                                             <td><?php $jampulang = $absensi['jam_pulang']; echo date("H:i", strtotime($jampulang));?></td>
                                             
                                             <td><?php
                                             $mulai=$jamdatang; //jam dalam format STRING
                                             $selesai=$jampulang; //jam dalam format DATE real itme
                                             $mulai_time=(is_string($mulai)?strtotime($mulai):$mulai);// memaksa mebentuk format time untuk string
                                             $selesai_time=(is_string($selesai)?strtotime($selesai):$selesai);
                                             $detik=$selesai_time-$mulai_time; //hitung selisih dalam detik
                                             $jam=floor($detik/3600); // menghitung banyak jam
                                             $sisadetik=$detik%3600; //sisa detik
                                             $menit=floor($sisadetik/60);//menghitung banyak menit.
                                             echo $jam.":".$menit;
                                             ?> Jam
                                             </td>
                                             <td>
                                                <div class="form-button-action">
                                                    <a href="edit_absensi.php?id=<?= $absensi['id_absen']; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="hapus_absensi.php?id=<?= $absensi['id_absen']; ?>" onclick="return confirm('Yakin hapus data?');" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
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