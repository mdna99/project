<?php
include_once("../config/config.php");
include_once("../config/cek_login.php");
include_once("../config/functions.php");
include_once("../template/header.php");
?>


<!-- Page Wrapper -->
<div id="wrapper">
    <?php
    include_once("../template/sidebar.php")
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php include_once("../template/navbar.php") ?>
            <!-- Konten -->
            <?php
                include "konten.php";
            ?>
            <!-- End of Konten -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->


<?php
include_once("../template/footer.php")
?>