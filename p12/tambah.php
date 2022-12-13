<?php

include_once("functions.php");
// $conn = mysqli_connect('localhost','root','root','latihan');

// include_once("functions.php");
if(isset($_POST["submit"]) ) {
    

    // cek apakah data berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href= 'index.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href= 'index.php';
            </script>
            ";
    }
}

// var_dump($hasil);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tambah Mahasiswa</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-success"> 
<!-- 
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                Nested Row within Card Body
                <div class="row justify-content-md-center">
                    <div class="col-lg-10">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tambah data mahasiswa!</h1>
                            </div>
                            <form class="user" action="" method="p ost">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama" id="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nim" id="nim" placeholder="NIM">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="jurusan" id="jurusan" placeholder="Jurusan">
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
                                    Tambah!
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="nama"
            id="nama" placeholder="Nama Lengkap">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="nim"
            id="nim" placeholder="NIM" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="jurusan"
            id="jurusan" placeholder="Jurusan">
        </div>
        <button type="submit" name="submit" class="btn btn-success btn-user btn-block">
            Tambah!
        </button>
    </form>

<!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>
</html>