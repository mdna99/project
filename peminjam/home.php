<?php
include_once("../config/config.php");
include_once("../config/functions.php");

$jadwal = query("SELECT * FROM peminjaman");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beranda</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white bg-success">
            <div class="container">
                <a href="" class="navbar-brand">
                    <span class="brand-text font-weight text-white">DiOR Sambenyawa</span>
                </a>
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                    <a href="../auth/logout.php" data-toggle="modal" data-target="#logout" class="btn btn-danger btn-flat">Keluar</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Jadwal</h1>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row py-4">
                        <div class="col-md-12">
                            <div class="card">
                                <form role="form" action="http://localhost/peminjaman-ruang/peminjam/pinjam" method="POST" enctype="multipart/form-data">
                                    <div class="card-header bg-success py-3">
                                        <h6 class="m-0 font-weight-bold text-light">Pinjam Ruangan</h6>
                                    </div>
                                    <div>
                                        <div class="card-body">
                                            <input type="hidden" id="pinjam_id_user" name="id_user" value="26">
                                            <div class="form-group">
                                                <label>Nama Peminjam</label>
                                                <input type="text" id="pinjam_nama_peminjam" name="nama_peminjam" readonly="" class="form-control" value="<?= "Muh Dian Nafi Aziz" ?>" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Lembaga</label>
                                                <input type="text" id="pinjam_nama_lembaga" name="nama_lembaga" readonly="" class="form-control" value="PTIPD" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Jam Mulai</label>
                                                <input type="time" id="pinjam_jam_mulai" name="jam_mulai" class="form-control verifydate" value="10:04">
                                            </div>
                                            <div class="form-group">
                                                <label>Jam Selesai</label>
                                                <input type="time" id="pinjam_jam_selesai" name="jam_berakhir" class="form-control verifydate" value="12:04">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="date" id="tanggal" name="tanggal" class="form-control verifydate" value="2022-11-21">
                                                <span id="alerttanggal" class="text-danger"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan Peminjaman</label>
                                                <input type="text" id="pinjam_keterangan" name="keterangan" class="form-control" required>
                                            </div>
                                            <div class="justify-content-end">
                                                <button type="submit" name="pinjam" class="btn btn-primary pinjam">Pinjam</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header bg-success py-3">
                                    <h6 class="m-0 font-weight-bold text-light">Jadwal Peminjaman</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="dataTable_length">
                                                        <label>Show 
                                                            <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select> entries
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="dataTable_filter" class="dataTables_filter">
                                                        <label>Search:
                                                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Nama Lembaga</th>
                                                                <th>Jam Mulai</th>
                                                                <th>Jam Berakhir</th>
                                                                <th>Tanggal</th>
                                                                <th>Keterangan Peminjaman</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbodyjadwal">
                                                            <?php $no = 1; ?>
                                                            <?php foreach ($jadwal as $q) : ?>
                                                                <?php
                                                                // atur jadwal
                                                                $nowtime = strtotime(date('H:i:s')) + strtotime(date('Y-m-d'));
                                                                $dbstart = strtotime($q->jam_mulai) + strtotime($q->tanggal);
                                                                $dbend = strtotime($q->jam_berakhir) + strtotime($q->tanggal);
                                                                $id_jadwal = $q->id_jadwal;
                                                                ?>
                                                                <?php if ($dbend < $nowtime) {
                                                                    $this->db->update('ruangan', ['status_ruangan' => 'Nganggur'], ['id_ruangan' => $q->id_ruangan]);
                                                                    $this->db->update('jadwal', ['status_jadwal' => 3], ['id_jadwal' => $id_jadwal]);
                                                                } elseif ($nowtime >= $dbstart and $nowtime <= $dbend) {
                                                                    $this->db->update('ruangan', ['status_ruangan' => 'Dipakai'], ['id_ruangan' => $q->id_ruangan]);
                                                                    $this->db->update('jadwal', ['status_jadwal' => 1], ['id_jadwal' => $id_jadwal]); ?>
                                                                    <tr>
                                                                        <td><?php echo $no++; ?></td>
                                                                        <td><?php echo $q->username; ?></td>
                                                                        <td><?php echo substr($q->jam_mulai, 0, 5); ?></td>
                                                                        <td><?php echo substr($q->jam_berakhir, 0, 5); ?></td>
                                                                        <td><?php $date = date_create($q->tanggal);
                                                                            echo date_format($date, 'd/m/Y'); ?></td>
                                                                        <td><?php echo $q->keterangan; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            switch ($q->status_jadwal) {
                                                                                case 1:
                                                                                    echo "<span class='text-success text-bold'>Sedang berlangsung...</span>";
                                                                                    break;
                                                                                case 2:
                                                                                    echo "<span class='text-primary text-bold'>Akan datang...</span>";
                                                                                    break;
                                                                                case 3:
                                                                                    echo "<span class='text-danger text-bold'>Sudah lewat, harap hapus jadwal ini..</span>";
                                                                                default:
                                                                                    # code...
                                                                                    break;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('admin/hapusjadwal/0/' . $q->id_jadwal) ?>" onclick="return confirm('Hapus jadwal?')" class="badge badge-danger" title="Batalkan jadwal">Hapus Jadwal</a>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td><?php echo $no++; ?></td>
                                                                        <td><?php echo $q->username; ?></td>
                                                                        <td><?php echo substr($q->jam_mulai, 0, 5); ?></td>
                                                                        <td><?php echo substr($q->jam_berakhir, 0, 5); ?></td>
                                                                        <td><?php $date = date_create($q->tanggal);
                                                                            echo date_format($date, 'd/m/Y'); ?></td>
                                                                        <td><?php echo $q->keterangan; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            switch ($q->status_jadwal) {
                                                                                case 1:
                                                                                    echo "<span class='text-success text-bold'>Sedang berlangsung...</span>";
                                                                                    break;
                                                                                case 2:
                                                                                    echo "<span class='text-primary text-bold'>Akan datang...</span>";
                                                                                    break;
                                                                                case 3:
                                                                                    echo "<span class='text-danger text-bold'>Sudah lewat, harap hapus jadwal ini..</span>";
                                                                                default:
                                                                                    # code...
                                                                                    break;
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo base_url('admin/hapusjadwal/0/' . $q->id_jadwal) ?>" onclick="return confirm('Hapus jadwal?')" class="badge badge-danger" title="Batalkan jadwal">Hapus Jadwal</a>
                                                                        </td>
                                                                    </tr>
                                                            <?php };
                                                            endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                                                <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                            </li>
                                                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>