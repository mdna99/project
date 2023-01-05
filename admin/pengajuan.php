<?php
include_once("../template/head.php");
include_once("../template/bodyA.php");
$peminjaman = squery("SELECT * FROM peminjaman");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengajuan</h1>
    </div>
    <div class="card shadow">
        <div class="card-header text-center">
            <h2>Request Peminjaman</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel" class="table table-bordered">
                    <thead>
                        <tr role="row">
                            <th>No.</th>
                            <th>User</th>
                            <th>Jam Mulai</th>
                            <th>Jam Berakhir</th>
                            <th>Tanggal</th>
                            <th>Keterangan Peminjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($peminjaman as $q) : ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $q[username]; ?></td>
                                <td><?php echo substr($q[jam_mulai], 0, 5); ?></td>
                                <td><?php echo substr($q[jam_berakhir], 0, 5); ?></td>
                                <td><?php $date = date_create($q[tanggal]);
                                echo date_format($date, 'd/m /Y'); ?></td>
                                <td><?php echo $q[keterangan]; ?></td>
                                <td>
                                    <a href="<?php echo 'accrequest.php?id=' . $q[id_peminjaman] ?>" onclick="return confirm('Terima Request?')" class="badge badge-primary">Terima Request</a>
                                    <a href="<?php echo 'disaccrequest.php?id=' . $q[id_peminjaman] ?>" onclick="return confirm('Tolak Request?')" class="badge badge-danger">Tolak Request</a>
                                </td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include_once("../template/bodyAa.php");
include_once("../template/foot.php");
?>