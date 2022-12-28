<?php
include_once("../template/head.php");
include_once("../template/bodyA.php");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="header">
        <h1 class="text-center mt-3 text-gray-800">SISTEM PEMINJAMAN RUANGAN</h1>
        <h3 class="text-center">Selamat Datang, Admin</h3>
    </div>
    <div class="card card-primary m-5 shadow">
        <div class="card-header bg-primary">
            <h5 class="text-light">
                <i class="fas fa-info-circle"></i>&nbsp;Quick View
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="card border-left-primary">
                        <div class="card-body">
                            <h3 class="card-title font-weight-bold text-primary">3</h3>
                            <p class="card-text font-weight-bold">Request Peminjaman</p>
                            <a href="#" class="btn btn-primary">Selebihnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card border-left-success">
                        <div class="card-body">
                            <h3 class="card-title font-weight-bold text-success">5</h3>
                            <p class="card-text font-weight-bold">Jadwal</p>
                            <a href="#" class="btn btn-success">Selebihnya <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
include_once("../template/bodyAa.php");
include_once("../template/foot.php");
?>